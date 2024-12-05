<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import GenericShowLayout from "@/Layouts/GenericShowLayout.vue";
import PostLayout from "@/Layouts/PostLayout.vue";

const props = defineProps({
  kitchen: {
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
    <Head :title="`Кухня &quot;${kitchen.name}&quot;`" />
    <GenericShowLayout :entity="kitchen">
      <template #posts>
        <PostLayout
          :headingText="`Рецепты кухни &quot;${kitchen.name}&quot;`"
          :paginationLinks="posts.links"
          :posts="posts.data"
        />
      </template>
    </GenericShowLayout>
  </AppLayout>
</template>
