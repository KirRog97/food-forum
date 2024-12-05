<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import GenericShowLayout from "@/Layouts/GenericShowLayout.vue";
import PostLayout from "@/Layouts/PostLayout.vue";
import PostShowPopularRequests from "@/Layouts/PostShowPopularRequests.vue";

defineProps({
  menu: {
    type: Object,
    default: {},
  },
  posts: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <AppLayout>
    <Head :title="`Меню ${menu.name}`" />
    <GenericShowLayout :entity="menu">
      <template #showFooter>
        <PostShowPopularRequests />
      </template>
      <template #posts>
        <PostLayout
          :headingText="`Рецепты из меню &quot;${menu.name}&quot;`"
          :paginationLinks="posts.links"
          :posts="posts.data"
        />
      </template>
    </GenericShowLayout>
  </AppLayout>
</template>
