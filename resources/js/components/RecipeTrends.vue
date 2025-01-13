<script setup>
import RecipeLayout from "@/Layouts/RecipeLayout.vue";
import { onMounted, ref, watch } from "vue";

const activeTab = ref(0);
const maxTabs = ref(3);
const recipes = ref([]);

onMounted(() => {
  // Load only viewable first tab
  loadPopularRecipe();
  // loadNewRecipe();
  // loadEditorRecipe();
});

watch(activeTab, async (newValue) => {
  switch (newValue) {
    case 0:
      loadPopularRecipe();
      break;

    case 1:
      loadNewRecipe();
      break;

    case 2:
      loadEditorRecipe();
      break;

    default:
      loadPopularRecipe();
      break;
  }
});

function switchTabTo(tabIndex) {
  if (activeTab.value <= maxTabs.value - 1) activeTab.value = tabIndex;
}

function loadPopularRecipe() {
  axios
    .get(`/api/recipes/favorites/top`)
    .then((res) => {
      recipes.value = res.data;
    })
    .catch((err) => {
      console.error(err);
    });
}

function loadNewRecipe() {
  axios
    .get(`/api/recipes/new`)
    .then((res) => {
      recipes.value = res.data;
    })
    .catch((err) => {
      console.error(err);
    });
}

function loadEditorRecipe() {
  axios
    .get(`/api/recipes/favorites/editor-choice`)
    .then((res) => {
      recipes.value = res.data;
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
    <RecipeLayout :recipes="recipes" />
  </div>
</template>
