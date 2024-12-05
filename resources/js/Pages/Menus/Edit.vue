<script setup>
import { Head, usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import MenuDeleteForm from "./Partials/MenuDeleteForm.vue";
import MenuEditForm from "./Partials/MenuEditForm.vue";
import PictureEditForm from "@/Components/PictureEditForm.vue";

const menu = usePage().props.menu;
</script>

<template>
  <AppLayout>
    <Head :title="`Изменение меню ${menu.name}`" />

    <Heading>Изменение меню {{ menu.name }}</Heading>

    <PictureEditForm formHeadingText="Изменение фото" :picture="menu.picture" />

    <div class="flex flex-col justify-center bg-secondary-400 p-4 rounded">
      <MenuEditForm :menu="menu" />
    </div>

    <div class="flex flex-col rounded">
      <MenuDeleteForm :menu="menu" />
    </div>
  </AppLayout>
</template>
