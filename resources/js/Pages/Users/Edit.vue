<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import UserEditEmailForm from "@/Pages/Users/Partials/UserEditEmailForm.vue";
import UserEditPictureForm from "@/Pages/Users/Partials/UserEditPictureForm.vue";
import UserEditUsernameForm from "@/Pages/Users/Partials/UserEditUsernameForm.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

defineProps({
  user: {
    type: Object,
    default: {},
  },
});

const user = computed(() => usePage().props.auth.user);
</script>
<template>
  <AppLayout>
    <Head title="Eда | Редактирование профиля" />

    <Heading>Редактирование профиля</Heading>

    <div class="flex flex-col justify-center bg-secondary-100 p-2 space-y-4">
      <UserEditPictureForm :user="user" />

      <div class="flex flex-col bg-secondary-700 rounded">
        <UserEditUsernameForm :user="user" />
        <UserEditEmailForm :user="user" />
      </div>
    </div>
  </AppLayout>
</template>
