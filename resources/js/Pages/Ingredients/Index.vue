<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import HeadingSub from "@/Layouts/HeadingSub.vue";
import IngredientCard from "@/Components/IngredientCard.vue";
import MessageEmptyCollection from "@/Components/MessageEmptyCollection.vue";
import Pagination from "@/Layouts/Pagination.vue";

defineProps({
  ingredients: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <AppLayout>
    <Head title="Книга ингредиентов" />

    <Heading>Книга ингредиентов</Heading>
    <HeadingSub>
      Здесь вы можете ознакомиться с ингредиентами, которые будут использоваться
      в ваших рецептах.
    </HeadingSub>

    <template v-if="ingredients.data.length > 0">
      <div class="mt-8 space-y-8">
        <div v-for="ingredient in ingredients.data" :key="ingredient.id">
          <IngredientCard :ingredient="ingredient"> </IngredientCard>
        </div>
      </div>
      <Pagination :links="ingredients.links" />
    </template>
    <template v-else>
      <MessageEmptyCollection>
        Список рецептов временно пуст
      </MessageEmptyCollection>
    </template>
  </AppLayout>
</template>
