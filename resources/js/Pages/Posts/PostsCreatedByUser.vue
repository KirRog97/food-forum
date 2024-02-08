<script setup>
import { Head, usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PostLayout from "@/Layouts/PostLayout.vue";

const posts = usePage().props.posts;
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
