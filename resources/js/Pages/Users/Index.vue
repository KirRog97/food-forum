<script setup>
import MessageEmptyCollection from "@/Components/MessageEmptyCollection.vue";
import UserIndexCard from "@/Components/UserIndexCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import HeadingSub from "@/Layouts/HeadingSub.vue";
import Pagination from "@/Layouts/Pagination.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
  users: {
    type: Object,
    default: {},
  },
});
</script>
<template>
  <AppLayout>
    <Head title="Eда | Список кулинаров" />

    <Heading>Список кулинаров</Heading>
    <HeadingSub>
      Список кулинаров нашего сайта. Объединяйтесь и воплощайте свои самые
      смелые кулинарные фантазии в жизнь.
    </HeadingSub>

    <template v-if="users.data.length > 0">
      <div class="grid grid-cols-6 gap-5">
        <div
          class="col-span-6 sm:col-span-3 lg:col-span-2 rounded-lg transition shadow hover:shadow-2xl"
          v-for="user in users.data"
          :key="user.id"
        >
          <UserIndexCard :user="user"> </UserIndexCard>
        </div>
      </div>
      <Pagination :links="users.links" />
    </template>
    <template v-else>
      <MessageEmptyCollection>
        Нет зарегестрированных пользователей
      </MessageEmptyCollection>
    </template>
  </AppLayout>
</template>
