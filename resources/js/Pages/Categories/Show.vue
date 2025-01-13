<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import GenericShowLayout from "@/Layouts/GenericShowLayout.vue";
import RecipeLayout from "@/Layouts/RecipeLayout.vue";

const props = defineProps({
  category: {
    type: Object,
    default: {},
  },
  recipes: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <AppLayout>
    <Head :title="`Категория ${category.name}`" />
    <GenericShowLayout :entity="category">
      <template #recipes>
        <RecipeLayout
          :headingText="`Рецепты из категории &quot;${category.name}&quot;`"
          :paginationLinks="recipes.links"
          :recipes="recipes.data"
        />
      </template>
    </GenericShowLayout>
  </AppLayout>
</template>
