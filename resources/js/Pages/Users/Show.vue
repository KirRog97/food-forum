<script setup>
import MessageEmptyCollection from "@/Components/MessageEmptyCollection.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import UserActivityPostCard from "@/Layouts/UserActivityPostCard.vue";
import ShowSidebar from "@/Layouts/UserShowSidebar.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
  user: {
    type: Object,
    default: {},
  },
});
</script>
<template>
  <AppLayout>
    <Head :title="`Профиль ${user.username}`" />

    <div class="grid grid-cols-12 gap-2">
      <div class="col-span-8 md:col-span-9">
        <Heading>
          <template v-if="$page.props.auth.user?.id === user.id">
            Ваша история
          </template>
          <template v-else> История {{ user.username }} </template>
        </Heading>

        <template v-if="user.posts">
          <div class="space-y-8">
            <template v-for="post in user.posts" :key="post.id">
              <UserActivityPostCard :post="post" />
            </template>
          </div>
        </template>
        <template v-else>
          <MessageEmptyCollection>
            Пользователь ещё не написал свою историю
          </MessageEmptyCollection>
        </template>
      </div>

      <div class="relative col-span-4 md:col-span-3">
        <ShowSidebar :user="user" />
      </div>
    </div>
  </AppLayout>
</template>
