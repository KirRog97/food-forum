<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PostLayout from "@/Layouts/PostLayout.vue";

defineProps({
  posts: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <AppLayout>
    <Head title="Книга рецептов" />

    <PostLayout
      headingText="Книга рецептов"
      headingSubText="Ищите рецепты, выбирая категорию блюда, его подкатегорию, кухню или меню."
      :paginationLinks="posts.links"
      :posts="posts.data"
    />
  </AppLayout>
</template>
