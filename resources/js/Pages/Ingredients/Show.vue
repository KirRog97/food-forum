<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import GenericShowLayout from "@/Layouts/GenericShowLayout.vue";
import RecipeLayout from "@/Layouts/RecipeLayout.vue";

defineProps({
  ingredient: {
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
    <Head :title="`Ингредиент &quot;${ingredient.name}&quot;`" />
    <GenericShowLayout :entity="ingredient">
      <template #recipes>
        <RecipeLayout
          :headingText="`Рецепты включающие в состав &quot;${ingredient.name}&quot;`"
          :paginationLinks="recipes.links"
          :recipes="recipes.data"
        />
      </template>
    </GenericShowLayout>
  </AppLayout>
</template>
