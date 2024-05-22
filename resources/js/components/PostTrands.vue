<script setup>
import PostLayout from "@/Layouts/PostLayout.vue";
import { onMounted, ref, watch } from "vue";

const activeTab = ref(0);
const maxTabs = ref(3);
const posts = ref([]);

onMounted(() => {
  // Load only viewable first tab
  loadPopularPost();
  // loadNewPost();
  // loadEditorPost();
});

watch(activeTab, async (newValue) => {
  switch (newValue) {
    case 0:
      loadPopularPost();
      break;

    case 1:
      loadNewPost();
      break;

    case 2:
      loadEditorPost();
      break;

    default:
      loadPopularPost();
      break;
  }
});

function switchTabTo(tabIndex) {
  if (activeTab.value <= maxTabs.value - 1) activeTab.value = tabIndex;
}

function loadPopularPost() {
  axios
    .get(`/api/posts/favorites/top`)
    .then((res) => {
      posts.value = res.data;
    })
    .catch((err) => {
      console.error(err);
    });
}

function loadNewPost() {
  axios
    .get(`/api/posts/new`)
    .then((res) => {
      posts.value = res.data;
    })
    .catch((err) => {
      console.error(err);
    });
}

function loadEditorPost() {
  axios
    .get(`/api/posts/favorites/editor-choice`)
    .then((res) => {
      posts.value = res.data;
    })
    .catch((err) => {
      console.error(err);
    });
}
</script>
<template>
  <div class="mb-8">
    <div class="w-full flex justify-center mb-4">
      <n-button-group>
        <n-button round primary @click="switchTabTo(0)">
          Высший рейтинг
        </n-button>
        <n-button round primary @click="switchTabTo(1)"> Новые </n-button>
        <n-button round primary @click="switchTabTo(2)">
          Выбор редакции
        </n-button>
      </n-button-group>
    </div>
    <PostLayout :posts="posts" />
  </div>
</template>
