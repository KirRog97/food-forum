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
      headingText="Популярные рецепты"
      headingSubText="Здесь собраны все популярные рецепты сайта"
      messageEmptyCollection="Пользователь пока не дал оценки ни одному рецепту"
      :paginationLinks="recipes.links"
      :recipes="recipes"
    />
  </AppLayout>
</template>
