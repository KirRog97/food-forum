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
    <Head title="Eда | Книга любимых рецептов" />
    <PostLayout
      headingText="Любимые рецепты"
      headingSubText="Здесь собраны все рецепты, которые понравились пользователю"
      messageEmptyCollection="Пользователь пока не дал оценки ни одному рецепту"
      :paginationLinks="posts.links"
      :posts="posts"
    />
  </AppLayout>
</template>
