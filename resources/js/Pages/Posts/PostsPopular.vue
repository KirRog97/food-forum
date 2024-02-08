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
      headingText="Популярные рецепты"
      headingSubText="Здесь собраны все популярные рецепты сайта"
      messageEmptyCollection="Пользователь пока не дал оценки ни одному рецепту"
      :paginationLinks="posts.links"
      :posts="posts"
    />
  </AppLayout>
</template>
