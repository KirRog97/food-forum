<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  post: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <div
    class="w-full flex flex-wrap justify-evenly sm:justify-center items-center"
  >
    <div
      class="w-auto flex justify-center items-center bg-secondary-700 rounded-lg px-4 py-2 mt-1 mr-1"
    >
      <n-tooltip placement="top" trigger="hover">
        <template #trigger>
          <!-- ToDo: create separate View page -->
          <Link :href="route('posts.index')" :data="{ post }">
            <span
              class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
            >
              {{ post.category.name }}
            </span>
          </Link>
        </template>
        <span> Рецепты из категории {{ post.category.name }} </span>
      </n-tooltip>
    </div>
    <div
      class="w-auto flex justify-center items-center bg-secondary-700 rounded-lg px-4 py-2 mt-1 mr-1"
    >
      <n-tooltip placement="top" trigger="hover">
        <template #trigger>
          <!-- ToDo: create separate View page -->
          <Link :href="route('posts.index')" :data="{ post }">
            <span
              class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
            >
              {{ post.kitchen.name }}
            </span>
          </Link>
        </template>
        <span> Рецепты из {{ post.kitchen.name }} </span>
      </n-tooltip>
    </div>
    <div
      class="w-auto flex justify-center items-center bg-secondary-700 rounded-lg px-4 py-2 mt-1 mr-1"
    >
      <n-tooltip placement="top" trigger="hover">
        <template #trigger>
          <!-- ToDo: create separate View page -->
          <Link :href="route('posts.index')" :data="{ post }">
            <span
              class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
            >
              {{ post.dish.name }}
            </span>
          </Link>
        </template>
        <span> Рецепты похожие рецепты блюда {{ post.dish.name }} </span>
      </n-tooltip>
    </div>
    <div
      class="w-auto flex justify-center items-center bg-secondary-700 rounded-lg px-4 py-2 mt-1 mr-1"
    >
      <n-tooltip placement="top" trigger="hover">
        <template #trigger>
          <!-- ToDo: create separate View page -->
          <Link :href="route('posts.index')" :data="{ post }">
            <span
              class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
            >
              {{ post.menu.name }}
            </span>
          </Link>
        </template>
        <span> Рецепты из категории {{ post.menu.name }} </span>
      </n-tooltip>
    </div>
  </div>
</template>
