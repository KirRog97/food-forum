<script setup>
import NewsBoard from "@/Components/NewsBoard.vue";
import RecipeSelection from "@/Components/RecipeSelection.vue";
import RecipeTrends from "@/Components/RecipeTrends.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import { Head } from "@inertiajs/vue3";
</script>
<template>
  <AppLayout>
    <Head title="Eда | Главная" />

    <RecipeSelection />

    <Heading>Подбор рецептов</Heading>
    <NewsBoard />

    <Heading>Топы рецептов</Heading>
    <RecipeTrends />
  </AppLayout>
</template>
