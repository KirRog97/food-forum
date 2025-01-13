<script setup>
import RecipeSelectionSearch from "@/Components/RecipeSelectionSearch.vue";
import { computed, onBeforeMount, ref } from "vue";
import { useStore } from "vuex";

const includedIngredients = ref([]);
const excludedIngredients = ref([]);
const isIngVisible = ref(false);
const store = useStore();

// Vuex States
const categories = computed(() => store.state.categories.all);
const dishes = computed(() => store.state.dishes.all);
const ingredients = computed(() => store.state.ingredients.all);
const kitchens = computed(() => store.state.kitchens.all);
const menus = computed(() => store.state.menus.all);

// Vuex Actions
const loadAllCategories = () => store.dispatch("loadAllCategories");
const loadAllDishes = () => store.dispatch("loadAllDishes");
const loadAllIngredients = () => store.dispatch("loadAllIngredients");
const loadAllKitchens = () => store.dispatch("loadAllKitchens");
const loadAllMenus = () => store.dispatch("loadAllMenus");

const selected = computed({
  get() {
    return store.state.selected;
  },
  set(value) {
    store.commit("setSelected", value);
  },
});

onBeforeMount(() => {
  loadAllCategories();
  loadAllDishes();
  loadAllIngredients();
  loadAllKitchens();
  loadAllMenus();
});

function adaptToSelect(data) {
  return data.map((data) => ({
    label: data.name,
    value: data.id,
  }));
}

function resetIngredients() {
  includedIngredients.value = [];
  excludedIngredients.value = [];
  // return snotify.success(
  //   "Списки ингредиентов очищены",
  //   "Выбор ингредиентов",
  // );
}

// watch(selected, async () => {
// ToDO: Created filtering backend func
// and request filtering from 'here'
// loadAllCategories();
// loadAllDishes();
// loadAllIngredients();
// loadAllKitchens();
// loadAllMenus();
// });
</script>

<template>
  <div class="flex flex-auto flex-wrap mb-2 sm:mb-3">
    <div
      class="w-full flex flex-wrap sm:flex-nowrap justify-between items-center mb-3 sm:mb-2 sm:space-x-2 space-y-2 sm:space-y-0"
    >
      <div class="w-full sm:w-6/12">
        <n-select
          placeholder="Выберите категорию"
          v-model:value="selected.categories"
          :options="adaptToSelect(categories)"
          @update:value="handleUpdateValue"
        />
      </div>
      <div class="w-full sm:w-6/12">
        <n-select
          placeholder="Выберите категорию"
          v-model:value="selected.kitchens"
          :options="adaptToSelect(kitchens)"
          @update:value="handleUpdateValue"
        />
      </div>
      <div class="w-full sm:w-6/12">
        <n-select
          placeholder="Выберите категорию"
          v-model:value="selected.dishes"
          :options="adaptToSelect(dishes)"
          @update:value="handleUpdateValue"
        />
      </div>
      <div class="w-full sm:w-6/12">
        <n-select
          placeholder="Выберите категорию"
          v-model:value="selected.menus"
          :options="adaptToSelect(menus)"
          @update:value="handleUpdateValue"
        />
      </div>
    </div>

    <div
      class="w-full flex flex-wrap justify-between items-start bg-secondary-100 rounded-lg mb-3 sm:mb-2 px-2 py-3"
      v-show="isIngVisible"
    >
      <div class="w-full md:w-6/12 flex flex-wrap px-2">
        <RecipeSelectionSearch
          :ingredients="ingredients"
          :outputArray="includedIngredients"
          :isAdding="true"
        />
      </div>
      <div class="w-full md:w-6/12 flex flex-wrap px-2">
        <RecipeSelectionSearch
          :ingredients="ingredients"
          :outputArray="excludedIngredients"
          :isAdding="false"
        />
      </div>
      <div class="w-full flex justify-center mt-8 sm:mt-4">
        <button
          type="button"
          class="bg-transparent hover:bg-secondary-900 text-center text-secondary-300 hover:text-white transition rounded-lg p-2"
          @click="resetIngredients"
        >
          <i class="fas fa-undo fa-base mr-1"></i>
          <span class="text-base">Сбросить</span>
        </button>
      </div>
    </div>

    <div
      class="w-full flex flex-col sm:flex-row justify-between items-center sm:space-x-2 space-y-3 sm:space-y-0"
    >
      <div class="w-full sm:w-6/12">
        <n-button
          class="w-full"
          primary
          type="primary"
          @click="isIngVisible = !isIngVisible"
        >
          Ингредиенты
        </n-button>
      </div>
      <div class="w-full sm:w-6/12">
        <n-button class="w-full" primary> Подобрать </n-button>
      </div>
    </div>
  </div>
</template>
