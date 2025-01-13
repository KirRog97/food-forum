<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import RecipeLayout from "@/Layouts/RecipeLayout.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
  recipes: {
    type: Object,
    default: {},
  },
});
</script>
<template>
  <AppLayout>
    <Head title="Eда | Книга созданных рецептов" />
    <RecipeLayout
      headingText="Созданные рецепты"
      headingSubText="Здесь собраны все рецепты, которые были написанны пользователем"
      messageEmptyCollection="Пользователь пока не создал ни одного рецепта"
      :paginationLinks="recipes.links"
      :recipes="recipes.data"
    />
  </AppLayout>
</template>
