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
    <Head title="Eда | Книга любимых рецептов" />
    <RecipeLayout
      headingText="Любимые рецепты"
      headingSubText="Здесь собраны все рецепты, которые понравились пользователю"
      messageEmptyCollection="Пользователь пока не дал оценки ни одному рецепту"
      :paginationLinks="recipes.links"
      :recipes="recipes"
    />
  </AppLayout>
</template>
