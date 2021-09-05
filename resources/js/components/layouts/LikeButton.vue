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
        :class="[liked ? 'fas text-red-500' : 'far text-secondary-200']"
      ></i>
    </transition>
    <span
      class="text-base leading-tight font-light tracking-wide"
      :class="[liked ? 'text-red-500' : 'text-secondary-200']"
    >
      {{ likeCount }}
    </span>
  </button>
</template>

<script>
export default {
  data() {
    return {
      likeCount: 0,
      liked: false
    };
  },
  props: {
    post_id: {
      type: Number
    }
  },
  mounted() {
    this.$nextTick(function() {
      this.checkLikeCount();
      this.checkLikeStatus();
    });
  },
  methods: {
    checkLikeCount: function() {
      axios
        .post(`/api/favorites/${this.post_id}/count`)
        .then(res => {
          return (this.likeCount = res.data.likeCount);
        })
        .catch(err => {
          console.error(err);
        });
    },
    checkLikeStatus: function() {
      axios
        .post(`/api/favorites/${this.post_id}/status`)
        .then(res => {
          this.liked = res.data.liked;
        })
        .catch(err => {
          console.error(err);
        });
    },
    predictReaction: function() {
      // "Why?": Just to show faster reaction to user
      // Dilemma: Comfort for user or "real data" but with delay(300ms-2s)?
      // ToDo: Maby make an animation for this period of "dellay"
      this.liked = !this.liked;
      this.liked ? this.likeCount++ : this.likeCount--;

      return this.liked;
    },
    sendReaction: _.debounce(function() {
      let resultOfPrediction = this.predictReaction();

      axios
        .post(`/api/favorites/${this.post_id}/action`)
        .then(res => {
          if (res.data.reaction !== resultOfPrediction) {
            res.data.reaction ? (this.liked = true) : (this.liked = false);
            this.likeCount = this.checkLikeCount();
          }
        })
        .catch(err => {
          console.error(err);
          //  If our user is a guest
          if (err.response.status === 401) {
            // change back visual data
            this.likeCount--;
            this.liked = false;

            return this.$snotify.simple(
              "Войдите в аккаунт, чтобы поставить отметку.",
              "Понравился рецепт?",
              {
                showProgressBar: true,
                timeout: 2500
              }
            );
          }
          return this.$snotify.error(`${err}`, "sendReaction", {
            showProgressBar: false,
            timeout: 1500
          });
        });
    }, 400)
  }
};
</script>

<style lang="scss" scoped>
.widget-like {
  flex-grow: 2;
  margin: 0;
  padding: 0;
  text-align: left;

  button {
    outline: none;
    i {
      margin-right: 0.25em;
    }
  }
}
</style>
