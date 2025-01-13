<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import GenericShowLayout from "@/Layouts/GenericShowLayout.vue";
import RecipeLayout from "@/Layouts/RecipeLayout.vue";
import RecipeShowPopularRequests from "@/Layouts/RecipeShowPopularRequests.vue";

defineProps({
  menu: {
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
    <Head :title="`Меню ${menu.name}`" />
    <GenericShowLayout :entity="menu">
      <template #showFooter>
        <RecipeShowPopularRequests />
      </template>
      <template #recipes>
        <RecipeLayout
          :headingText="`Рецепты из меню &quot;${menu.name}&quot;`"
          :paginationLinks="recipes.links"
          :recipes="recipes.data"
        />
      </template>
    </GenericShowLayout>
  </AppLayout>
</template>
