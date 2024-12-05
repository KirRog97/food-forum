<script setup>
import { Head, usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import CategoryDeleteForm from "./Partials/CategoryDeleteForm.vue";
import CategoryEditForm from "./Partials/CategoryEditForm.vue";
import Heading from "@/Layouts/Heading.vue";
import PictureEditForm from "@/Components/PictureEditForm.vue";

const category = usePage().props.category;
</script>

<template>
  <AppLayout>
    <Head :title="`Изменение категории ${category.name}`" />

    <Heading>Изменение категории "{{ category.name }}"</Heading>

    <div class="flex flex-col justify-center p-2 space-y-4">
      <PictureEditForm formHeadingText="Изменение фото" :picture="category.picture" />

      <div class="flex flex-col bg-secondary-700 rounded">
        <CategoryEditForm :category="category" />
      </div>

      <div class="flex flex-col">
        <CategoryDeleteForm :category="category" />
      </div>
    </div>
  </AppLayout>
</template>
