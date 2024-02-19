<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const testRequests = ref([
  { title: "Пицца", filter: "pizza" },
  { title: "Роллы", filter: "rolls" },
  { title: "Паста Карбонара", filter: "pasta" },
  { title: "Лёд", filter: "ice" },
  { title: "Вкуснейшее тесто", filter: "tasty" },
]);
</script>
<template>
  <div
    class="flex flex-row flex-wrap justify-center align-items-center space-x-2"
  >
    <n-tooltip v-for="request in testRequests" trigger="hover">
      <template #trigger>
        <Link
          class="mb-2"
          :href="route('posts.index', { filter: request.filter })"
        >
          <n-button type="primary" ghost strong class="text-sm">
            {{ request.title }}
          </n-button>
        </Link>
      </template>
      Рецепты по запросу "{{ request.title }}"
    </n-tooltip>
  </div>
</template>
