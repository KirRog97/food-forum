<script setup>
defineProps({
  recipe: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <div
    class="w-full flex flex-col sm:flex-row flex-nowrap justify-center items-center space-x-0 sm:space-x-2 space-y-2 sm:space-y-0"
  >
    <div
      class="w-2/3 sm:w-auto flex flex-nowrap justify-center items-center bg-secondary-700 rounded-lg px-4 py-2"
    >
      <span class="text-base text-primary-200 hover:text-primary-600">
        <i class="fas fa-chart-pie mr-1"></i>
        {{ recipe.COP }} порций
      </span>
    </div>
    <div
      class="w-2/3 sm:w-auto flex flex-nowrap justify-center items-center bg-secondary-700 rounded-lg px-4 py-2"
    >
      <span class="text-base text-primary-200 hover:text-primary-600">
        <i class="far fa-clock mr-1"></i>
        {{ recipe.TTC }} мин
      </span>
    </div>
    <div
      class="w-2/3 sm:w-auto flex flex-nowrap justify-center items-center bg-secondary-700 rounded-lg px-4 py-2"
    >
      <span class="text-base text-primary-200 hover:text-primary-600">
        <i class="fas fa-running mr-1"></i>
        {{ recipe.Kcal }} ккал
      </span>
    </div>
  </div>
</template>
