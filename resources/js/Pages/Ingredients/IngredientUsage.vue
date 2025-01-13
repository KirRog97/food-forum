<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import RecipeLayout from "@/Layouts/RecipeLayout.vue";

defineProps({
  ingredient: {
    type: Object,
    default: {},
  },
  recipes: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <AppLayout>
    <Head :title="`Рецепты блюд с использовованием ${ingredient.name}`" />

    <RecipeLayout
      headingText="Созданные рецепты"
      :headingSubText="`Рецепты блюд с использовованием ${ingredient.name}`"
      messageEmptyCollection="Этот ингредиент не используется ни в одном рецепте"
      :paginationLinks="recipes.links"
      :recipes="recipes.data"
    />
  </AppLayout>
</template>
