<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import EditUserEmailForm from "@/Pages/Users/Partials/EditUserEmailForm.vue";
import EditUserPictureForm from "@/Pages/Users/Partials/EditUserPictureForm.vue";
import EditUserUsernamelForm from "@/Pages/Users/Partials/EditUserUsernamelForm.vue";
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
      <EditUserPictureForm :user="user" />

      <div class="flex flex-col space-y-4">
        <EditUserUsernamelForm :user="user" />
        <EditUserEmailForm :user="user" />
      </div>
    </div>
  </AppLayout>
</template>
