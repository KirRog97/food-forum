<script setup>
import PostShowTagLayout from "@/Layouts/PostShowTagLayout.vue";
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
    <PostShowTagLayout>
      <template #content>
        <Link :href="route('posts.index')" :data="{ post }">
          <span
            class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
          >
            {{ post.category.name }}
          </span>
        </Link>
      </template>
      <template #tooltipText>
        Рецепты из категории {{ post.category.name }}
      </template>
    </PostShowTagLayout>

    <PostShowTagLayout>
      <template #content>
        <Link :href="route('posts.index')" :data="{ post }">
          <span
            class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
          >
            {{ post.kitchen.name }}
          </span>
        </Link>
      </template>
      <template #tooltipText>
        Рецепты из "{{ post.kitchen.name }}" кухня
      </template>
    </PostShowTagLayout>

    <PostShowTagLayout>
      <template #content>
        <Link :href="route('posts.index')" :data="{ post }">
          <span
            class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
          >
            {{ post.dish.name }}
          </span>
        </Link>
      </template>
      <template #tooltipText> Рецепты из {{ post.dish.name }} </template>
    </PostShowTagLayout>

    <PostShowTagLayout>
      <template #content>
        <Link :href="route('posts.index')" :data="{ post }">
          <span
            class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
          >
            {{ post.menu.name }}
          </span>
        </Link>
      </template>
      <template #tooltipText>
        Рецепты из категории {{ post.menu.name }}
      </template>
    </PostShowTagLayout>
  </div>
</template>
