<script setup>
import { computed, onMounted } from "vue";
import { useStore } from "vuex";

// Null (while wotking with Create forms)
// or Object (while wotking with Edit forms)
const category = defineModel("category");
const kitchen = defineModel("kitchen");
const dish = defineModel("dish");
const menu = defineModel("menu");

const store = useStore();

// Vuex States
const initialCategories = computed(() => store.state.categories.all);
const initialKitchens = computed(() => store.state.kitchens.all);
const initialDishes = computed(() => store.state.dishes.all);
const initialMenus = computed(() => store.state.menus.all);

// Vuex Actions
const loadAllCategories = () => store.dispatch("loadAllCategories");
const loadAllDishes = () => store.dispatch("loadAllDishes");
const loadAllKitchens = () => store.dispatch("loadAllKitchens");
const loadAllMenus = () => store.dispatch("loadAllMenus");

onMounted(() => {
  // N-select can't handle Object passed values. Label will be broken
  category.value = adaptModelValueToSelect(category);
  kitchen.value = adaptModelValueToSelect(kitchen);
  dish.value = adaptModelValueToSelect(dish);
  menu.value = adaptModelValueToSelect(menu);

  loadAllCategories();
  loadAllDishes();
  loadAllKitchens();
  loadAllMenus();
});

// watch(selected, async () => {
// ToDO: Created filtering backend func
// and request filtering from 'here'
// loadAllCategories();
// loadAllDishes();
// loadAllKitchens();
// loadAllMenus();
// });

function adaptModelValueToSelect(modelValue) {
  /*
   if question with n-select Placeholder
    not got a answere we need this check
  */
  if (modelValue.value === null) return;
  return modelValue.value.name;
}

function adaptLoadedDataToSelect(data) {
  return data.map((data) => ({
    label: data.name,
    key: data.id,
    value: data,
  }));
}
</script>

<template>
  <div
    class="w-full flex flex-col sm:flex-row justify-between items-center sm:space-x-2 space-y-3 sm:space-y-0"
  >
    <div class="w-full sm:w-6/12">
      <!-- We pass Null (while working with Recipe/Create.vue)
        becuse otherwise placeholder doesn't work -->
      <n-select
        v-model:value="category"
        :options="adaptLoadedDataToSelect(initialCategories)"
        placeholder="Выберите категорию"
      />
    </div>
    <div class="w-full sm:w-6/12">
      <n-select
        v-model:value="kitchen"
        :options="adaptLoadedDataToSelect(initialKitchens)"
        placeholder="Выберите категорию"
      />
    </div>
    <div class="w-full sm:w-6/12">
      <n-select
        v-model:value="dish"
        :options="adaptLoadedDataToSelect(initialDishes)"
        placeholder="Выберите категорию"
      />
    </div>
    <div class="w-full sm:w-6/12">
      <n-select
        v-model:value="menu"
        :options="adaptLoadedDataToSelect(initialMenus)"
        placeholder="Выберите категорию"
      />
    </div>
  </div>
</template>
