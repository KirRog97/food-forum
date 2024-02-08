<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PostLayout from "@/Layouts/PostLayout.vue";

defineProps({
  ingredient: {
    type: Object,
    default: {},
  },
  posts: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <AppLayout>
    <Head :title="`Рецепты блюд с использовованием ${ingredient.name}`" />

    <PostLayout
      headingText="Созданные рецепты"
      :headingSubText="`Рецепты блюд с использовованием ${ingredient.name}`"
      messageEmptyCollection="Этот ингредиент не используется ни в одном рецепте"
      :paginationLinks="posts.links"
      :posts="posts.data"
    />
  </AppLayout>
</template>
