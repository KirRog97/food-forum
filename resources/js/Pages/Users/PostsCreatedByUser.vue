<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PostLayout from "@/Layouts/PostLayout.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
  posts: {
    type: Object,
    default: {},
  },
});
</script>
<template>
  <AppLayout>
    <Head title="Eда | Книга созданных рецептов" />
    <PostLayout
      headingText="Созданные рецепты"
      headingSubText="Здесь собраны все рецепты, которые были написанны пользователем"
      messageEmptyCollection="Пользователь пока не создал ни одного рецепта"
      :paginationLinks="posts.links"
      :posts="posts.data"
    />
  </AppLayout>
</template>
