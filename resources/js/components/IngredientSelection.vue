<script setup>
import { ref, onMounted, computed } from "vue";
import { useStore } from "vuex";

const hasError = ref(false);
const searchString = ref("");
const maxIngredientAmount = ref(360000);

const props = defineProps({
  selectedIngredients: Array,
});

const store = useStore();

// Vuex States
const ingredients = computed(() => store.state.ingredients.all);

// Vuex Actions
const loadAllIngredients = () => store.dispatch("loadAllIngredients");

onMounted(() => {
  loadAllIngredients();
});

const filteredInput = computed(() => {
  if (!searchString.value || searchString.value.length < 2) {
    return;
  }
  return ingredients.value.filter(function (searchedIngredient) {
    if (
      searchedIngredient.name
        .toLowerCase()
        .indexOf(searchString.value.trim().toLowerCase()) !== -1
    ) {
      return searchedIngredient;
    }
  });
});

function addIngredientToList(ingredientToAdd) {
  if (_.isEmpty(searchString.value)) {
    return;
    // return this.$snotify.info(
    //   "Вы не выбрали инредиент",
    //   "Выбор ингредиента"
    // );
  }

  let ingNameArray = ingredients.value.map((i) => i.name);

  let existInIngredientList = ingNameArray.includes(ingredientToAdd.name);
  let missedInselectedIngredientsList = !props.selectedIngredients
    .map((i) => i.name)
    .includes(ingredientToAdd.name);

  if (existInIngredientList && missedInselectedIngredientsList) {
    hasError.value = false;
    searchString.value = "";

    return props.selectedIngredients.push({
      id: ingredientToAdd.id,
      name: ingredientToAdd.name,
      pivot: {
        amount: 0,
      },
    });
  } else {
    hasError.value = true;
    console.error("Ингредиент уже есть в списке");

    // return this.$snotify.error(
    //   "Указанный ингредиент уже выбран или отсутствует",
    //   "Выбор ингредиента"
    // );
  }
}

function delIngredientFromList(index, item) {
  console.log(props.selectedIngredients);
  if (_.find(props.selectedIngredients, ["name", item.name])) {
    props.selectedIngredients.splice(index, 1);

    // return this.$snotify.success(
    //   "Указанный ингредиент успешно удален",
    //   "Выбор ингредиента"
    // );
  }

  console.log("Указанный для удаления ингредиент не был найден");
  // return this.$snotify.error(
  //   "Указанный для удаления ингредиент не был найден",
  //   "Выбор ингредиента"
  // );
}

function validateIngAmount(index, ingAmount) {
  if (ingAmount < 0) {
    return (props.selectedIngredients[index].pivot.amount = 0);
    // this.$snotify.error(
    //   "Отрицательные значение граммовок недопустимы",
    //   "Выбор ингредиента"
    // );
  }

  if (ingAmount > maxIngredientAmount.value) {
    return (props.selectedIngredients[index].pivot.amount =
      maxIngredientAmount.value);
    // this.$snotify.error(
    //   `Указанное количество ингредиента превышает максимально значение (${this.maxIngredientAmount} грамм)`,
    //   "Выбор ингредиента"
    // );
  }
}

function copyToSearch(item) {
  return (searchString.value = item.name);
}
</script>

<template>
  <div class="w-full flex flex-col justify-center">
    <n-input
      v-model:value="searchString"
      type="text"
      placeholder="Введите наименование ингредиента"
    >
      <template #prefix>
        <i
          class="fas fa-plus text-sm sm:text-base text-emerald-500 leading-tight"
        ></i>
      </template>
    </n-input>

    <transition-group
      class="flex flex-col rounded overflow-x-hidden overflow-y-auto divide-y-2 mt-2"
      enter-active-class="animate__animated animate__fadeIn animate__faster"
      leave-active-class="animate__animated animate__fadeOut animate__delay-75 animate__faster"
      tag="ul"
      css
    >
      <li
        v-for="item in filteredInput"
        class="w-full flex justify-start items-center bg-gray-100 hover:bg-gray-300 shadow px-3 py-2"
        :value="item"
        :key="item.id"
        @click="addIngredientToList(item)"
      >
        <i class="fas fa-plus text-base sm:text-lg text-emerald-500 mr-3"></i>
        <span class="text-base sm:text-lg text-secondary-700">
          {{ item.name }}
        </span>
      </li>
    </transition-group>

    <ul
      class="flex flex-wrap justify-between mt-4 space-y-4 sm:space-y-3"
      :class="[selectedIngredients.length > 0 ? 'mt-2' : 'hidden']"
    >
      <li
        class="w-full flex flex-nowrap justify-between bg-transparent shadow-none border-0 space-x-2"
        v-for="(ingredient, index) in selectedIngredients"
        :key="index"
      >
        <n-input
          class="w-full flex text-right items-end border-0"
          v-model:value="ingredient.pivot.amount"
          type="text"
          placeholder="Введите число"
          @change="validateIngAmount(index, ingredient.pivot.amount)"
        >
          <template #prefix>
            <div
              class="flex justify-center items-center text-xs xs:text-base sm:text-lg"
            >
              {{ ingredient.name }}
            </div>
          </template>
          <template #suffix>
            <div
              class="flex justify-center items-center tex-xs xs:text-base sm:text-lg"
            >
              грамм
            </div>
          </template>
        </n-input>

        <div class="flex bg-secondary-900 rounded">
          <button
            type="button"
            class="text-primary-500 hover:text-red-500 transition px-4 py-2"
            aria-label="Удалить ингредиент"
            @click="delIngredientFromList(index, ingredient)"
          >
            <i class="fas fa-times fa-lg"></i>
          </button>
        </div>
      </li>
    </ul>
  </div>
</template>
