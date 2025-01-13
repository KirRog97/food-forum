<script setup>
import MessageEmptyCollection from "@/Components/MessageEmptyCollection.vue";
import RecipeIndexCard from "@/Components/RecipeIndexCard.vue";
import Heading from "@/Layouts/Heading.vue";
import HeadingSub from "@/Layouts/HeadingSub.vue";
import Pagination from "@/Layouts/Pagination.vue";

defineProps({
  headingText: {
    type: String,
    default: "",
    required: true,
  },
  headingSubText: {
    type: String,
    default: "",
    required: true,
  },
  messageEmptyCollection: {
    type: String,
    default: "Список рецептов пуст",
  },
  paginationLinks: {
    type: Object,
    default: {},
  },
  recipes: Object,
});
</script>

<template>
  <Heading v-if="headingText">{{ headingText }}</Heading>
  <HeadingSub v-if="headingSubText">{{ headingSubText }}</HeadingSub>

  <template v-if="recipes.length > 0">
    <div
      class="grid grid-cols-[repeat(auto-fill,_minmax(450px,_1fr))] gap-6 md:gap-3"
    >
      <RecipeIndexCard v-for="recipe in recipes" :key="recipe.id" :recipe="recipe" />
    </div>
    <Pagination v-if="paginationLinks.length > 0" :links="paginationLinks" />
  </template>
  <template v-else>
    <MessageEmptyCollection>
      {{ messageEmptyCollection }}
    </MessageEmptyCollection>
  </template>
</template>
