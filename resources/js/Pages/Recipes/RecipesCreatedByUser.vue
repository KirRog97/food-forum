<script setup>
import { Head, usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import RecipeLayout from "@/Layouts/RecipeLayout.vue";

const recipes = usePage().props.recipes;
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
