<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import GenericShowLayout from "@/Layouts/GenericShowLayout.vue";
import RecipeLayout from "@/Layouts/RecipeLayout.vue";

const props = defineProps({
  kitchen: {
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
    <Head :title="`Кухня &quot;${kitchen.name}&quot;`" />
    <GenericShowLayout :entity="kitchen">
      <template #recipes>
        <RecipeLayout
          :headingText="`Рецепты кухни &quot;${kitchen.name}&quot;`"
          :paginationLinks="recipes.links"
          :recipes="recipes.data"
        />
      </template>
    </GenericShowLayout>
  </AppLayout>
</template>
