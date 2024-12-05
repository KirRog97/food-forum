<script setup>
import { Head, usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import KitchenDeleteForm from "./Partials/KitchenDeleteForm.vue";
import KitchenEditForm from "./Partials/KitchenEditForm.vue";
import PictureEditForm from "@/Components/PictureEditForm.vue";

const kitchen = usePage().props.kitchen;
</script>

<template>
  <AppLayout>
    <Head title="Изменение кухни" />

    <Heading>Изменение кухни</Heading>

    <PictureEditForm formHeadingText="Изменение фото" :picture="kitchen.picture" />

    <div class="flex flex-col justify-center bg-secondary-400 p-4 rounded">
      <KitchenEditForm :kitchen="kitchen" />
    </div>

    <div class="flex flex-col rounded">
      <KitchenDeleteForm :kitchen="kitchen" />
    </div>
  </AppLayout>
</template>
