<script setup>
import { computed, ref } from "vue";
// https://www.naiveui.com/en-US/os-theme/components/message#basic.vue
const searchString = ref("");

const props = defineProps({
  ingredients: {
    type: Array,
    default: [],
  },
  outputArray: {
    type: Array,
    default: [],
  },
  isAdding: {
    type: Boolean,
    default: false,
  },
});

const filteredInput = computed(() => {
  if (!searchString.value || searchString.value.length < 2) {
    return;
  }
  return props.ingredients.filter(function (item) {
    if (
      item.name
        .toLowerCase()
        .indexOf(searchString.value.trim().toLowerCase()) !== -1
    ) {
      return item;
    }
  });
});

function addToOutputArray(item) {
  if (!props.outputArray.map((el) => el.name.includes(item.name))) {
    console.log("Указанный ингредиент уже выбран или отсутствует");
    //   return this.$snotify.error(
    //     "Указанный ингредиент уже выбран или отсутствует",
    //     "Выбор ингредиента",
    //     { showProgressBar: false, timeout: 1500 }
    //   );
    return;
  }
  searchString.value = "";
  return props.outputArray.push(item);
}

function delFromOutputArray(item, index) {
  if (_.find(props.outputArray, ["id", item.id])) {
    props.outputArray.splice(index, 1);

    // return this.$snotify.success(
    //   "Указанный ингредиент успешно удален",
    //   "Выбор ингредиента",
    //   { showProgressBar: false, timeout: 1000 }
    // );
  }
  // return this.$snotify.error(
  //   "Указанный для удаления ингредиент не был найден",
  //   "Выбор ингредиента",
  //   { showProgressBar: false, timeout: 1500 }
  // );
}

function copyToSearch(item) {
  if (searchString.value == item) {
    // return this.$snotify.info(
    //   "Указанный ингредиент уже скопирован в поле ввода",
    //   "Выбор ингредиента",
    //   { showProgressBar: false, timeout: 700 }
    // );
  }
  return (searchString.value = item);
}
</script>

<template>
  <div class="w-full space-y-2">
    <label
      class="text-base sm:text-lg text-secondary-600 font-lighter"
      v-text="
        isAdding ? 'Предпочитаемые ингредиенты' : 'Исключаемые ингредиенты'
      "
    >
    </label>

    <n-input
      v-model:value="searchString"
      type="text"
      placeholder="Введите наименование ингредиента"
    >
      <template #prefix>
        <i
          class="fas fa-lg leading-tight"
          :class="[
            isAdding ? 'fa-plus text-emerald-500' : 'fa-minus text-red-500',
          ]"
        ></i>
      </template>
    </n-input>

    <ul
      class="flex flex-col justify-start items-center rounded overflow-x-hidden overflow-y-auto divide-y-2"
      v-show="filteredInput && filteredInput.length > 0"
    >
      <li
        class="w-full flex justify-start items-center bg-gray-100 hover:bg-gray-300 shadow px-3 py-2"
        v-for="(item, index) in filteredInput"
        :value="item"
        :key="index"
        @click="addToOutputArray(item)"
      >
        <i
          class="fas fa-lg leading-tight cursor-pointer mr-3"
          :class="[
            isAdding ? 'fa-plus text-emerald-500' : 'fa-minus text-red-500',
          ]"
        >
        </i>
        <span class="text-base text-left">
          {{ item.name }}
        </span>
      </li>
    </ul>

    <n-collapse-transition v-show="outputArray && outputArray.length > 0">
      <ul class="w-full flex flex-wrap justify-start items-center">
        <li
          class="flex justify-between items-center mr-2 sm:mr-3 mb-3 sm:mb-2"
          v-for="(item, index) in outputArray"
          :key="item.id"
        >
          <n-tag
            :type="isAdding ? 'success' : 'error'"
            size="large"
            @close="delFromOutputArray(item, index)"
            closable
            round
            :bordered="false"
          >
            {{ item.name }}
          </n-tag>
        </li>
      </ul>
    </n-collapse-transition>
  </div>
</template>
