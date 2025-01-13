<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import GenericShowLayout from "@/Layouts/GenericShowLayout.vue";
import RecipeLayout from "@/Layouts/RecipeLayout.vue";

const props = defineProps({
  dish: {
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
    <Head :title="`Блюдо &quot;${dish.name}&quot;`" />
    <GenericShowLayout :entity="dish">
      <template #recipes>
        <RecipeLayout
          :headingText="`Рецепты блюда &quot;${dish.name}&quot;`"
          :paginationLinks="recipes.links"
          :recipes="recipes.data"
        />
      </template>
    </GenericShowLayout>
  </AppLayout>
</template>
