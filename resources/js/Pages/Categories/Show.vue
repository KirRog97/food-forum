<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import GenericShowLayout from "@/Layouts/GenericShowLayout.vue";
import PostLayout from "@/Layouts/PostLayout.vue";

const props = defineProps({
  category: {
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
    <Head :title="`Категория ${category.name}`" />
    <GenericShowLayout :entity="category">
      <template #posts>
        <PostLayout
          :headingText="`Рецепты из категории &quot;${category.name}&quot;`"
          :paginationLinks="posts.links"
          :posts="posts.data"
        />
      </template>
    </GenericShowLayout>
  </AppLayout>
</template>
