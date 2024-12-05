<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import GenericShowLayout from "@/Layouts/GenericShowLayout.vue";
import PostLayout from "@/Layouts/PostLayout.vue";

const props = defineProps({
  dish: {
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
    <Head :title="`Блюдо &quot;${dish.name}&quot;`" />
    <GenericShowLayout :entity="dish">
      <template #posts>
        <PostLayout
          :headingText="`Рецепты блюда &quot;${dish.name}&quot;`"
          :paginationLinks="posts.links"
          :posts="posts.data"
        />
      </template>
    </GenericShowLayout>
  </AppLayout>
</template>
