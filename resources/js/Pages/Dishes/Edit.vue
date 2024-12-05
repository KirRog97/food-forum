<script setup>
import { Head, usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import DishDeleteForm from "./Partials/DishDeleteForm.vue";
import DishEditForm from "./Partials/DishEditForm.vue";
import Heading from "@/Layouts/Heading.vue";
import PictureEditForm from "@/Components/PictureEditForm.vue";

const dish = usePage().props.dish;
</script>

<template>
  <AppLayout>
    <Head title="Изменение блюда" />

    <Heading>Изменение блюда</Heading>

    <PictureEditForm formHeadingText="Изменение фото" :picture="dish.picture" />

    <div class="flex flex-col justify-center bg-secondary-400 p-4 rounded">
      <DishEditForm :dish="dish" />
    </div>

    <div class="flex flex-col rounded">
      <DishDeleteForm :dish="dish" />
    </div>
  </AppLayout>
</template>
