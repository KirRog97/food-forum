<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import RecipeLayout from "@/Layouts/RecipeLayout.vue";

defineProps({
  recipes: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <AppLayout>
    <Head title="Книга рецептов" />

    <RecipeLayout
      headingText="Книга рецептов"
      headingSubText="Ищите рецепты, выбирая категорию блюда, его подкатегорию, кухню или меню."
      :paginationLinks="recipes.links"
      :recipes="recipes.data"
    />
  </AppLayout>
</template>
