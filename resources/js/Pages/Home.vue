<script setup>
import NewsBoard from "@/Components/NewsBoard.vue";
import PostSelection from "@/Components/PostSelection.vue";
import PostTrands from "@/Components/PostTrands.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import { Head } from "@inertiajs/vue3";
</script>
<template>
  <AppLayout>
    <Head title="Eда | Главная" />

    <PostSelection />

    <Heading>Подбор рецптов</Heading>
    <NewsBoard />

    <Heading>Топы рецептов</Heading>
    <PostTrands />
  </AppLayout>
</template>
