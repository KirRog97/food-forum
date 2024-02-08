<script setup>
import { usePage } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

// Change back that code before commit
// and after make the changes in Routes and
// code in VueComponents at same time

const props = defineProps({
  postId: Number,
  initialLikeCount: {
    type: Number,
    default: 0,
  },
});

const isLiked = ref(false);
const likeCount = ref(props.initialLikeCount);

onMounted(() => {
  if (usePage().props.auth?.user !== null) {
    syncLikeStatus();
  }

  //   syncLikeCount();
});

function syncLikeCount() {
  axios
    .post(`/api/favorites/${props.postId}/count`)
    .then((res) => {
      return (likeCount.value = res.data.likeCount);
    })
    .catch((err) => {
      console.error(err);
    });
}

function syncLikeStatus() {
  axios
    .post(`/api/favorites/${props.postId}/status`)
    .then((res) => {
      isLiked.value = res.data.liked;
    })
    .catch((err) => {
      console.error(err);
    });
}

function likeReactionHandler() {
  //TODO: Refactor code below
  //TODO: Split Axios and data manipulation
}

function predictReaction() {
  // "Why?": Just to show more faster reaction to user
  // Dilemma: Comfort for user or "real data" but with delay(300ms-2s)?
  // ToDo: Maby make an animation for this period of "dellay"
  isLiked.value = !isLiked.value;
  isLiked.value ? likeCount.value++ : likeCount.value--;

  return isLiked.value;
}

// ToDo: Return _debounce
function sendReaction() {
  let resultOfPrediction = predictReaction();

  axios
    .post(`/api/favorites/${props.postId}/action`)
    .then((res) => {
      if (res.data.reaction !== resultOfPrediction) {
        res.data.reaction ? (isLiked.value = true) : (isLiked.value = false);
        likeCount.value = syncLikeCount();
      }
    })
    .catch((err) => {
      console.error(err);
      //  If our user is a guest
      if (err.response.status === 401) {
        // change back visual data
        likeCount.value--;
        isLiked.value = false;

        // return this.$snotify.simple(
        //   "Войдите в аккаунт, чтобы поставить отметку.",
        //   "Понравился рецепт?",
        //   {
        //     showProgressBar: true,
        //     timeout: 2500,
        //   }
        // );
      }
      // return this.$snotify.error(`${err}`, "sendReaction", {
      //   showProgressBar: false,
      //   timeout: 1500,
      // });
    });
}
</script>

<template>
  <button
    class="w-auto flex justify-center items-center bg-transparent text-secondary-700 font-semibold rounded-lg px-2 py-1"
    @click="sendReaction()"
  >
    <transition
      enter-active-class="animate__animated animate__zoomIn animate__slow"
      leave-active-class="animate__animated animate__zoomOut animate__slow"
      appear
      css
    >
      <i
        class="fa-lg fa-heart leading-tight cursor-pointer mr-2"
        :class="[isLiked ? 'fas text-red-500' : 'far text-secondary-200']"
      ></i>
    </transition>
    <span
      class="text-base leading-tight font-light tracking-wide"
      :class="[isLiked ? 'text-red-500' : 'text-secondary-200']"
    >
      {{ likeCount }}
    </span>
  </button>
</template>
