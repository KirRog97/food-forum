<script setup>
import RecipeShowTagLayout from "@/Layouts/RecipeShowTagLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
  recipe: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <div
    class="w-full flex flex-wrap justify-evenly sm:justify-center items-center"
  >
    <RecipeShowTagLayout>
      <template #content>
        <Link :href="route('recipes.index')" :data="{ recipe }">
          <span
            class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
          >
            {{ recipe.category.name }}
          </span>
        </Link>
      </template>
      <template #tooltipText>
        Рецепты из категории {{ recipe.category.name }}
      </template>
    </RecipeShowTagLayout>

    <RecipeShowTagLayout>
      <template #content>
        <Link :href="route('recipes.index')" :data="{ recipe }">
          <span
            class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
          >
            {{ recipe.kitchen.name }}
          </span>
        </Link>
      </template>
      <template #tooltipText>
        Рецепты из "{{ recipe.kitchen.name }}" кухня
      </template>
    </RecipeShowTagLayout>

    <RecipeShowTagLayout>
      <template #content>
        <Link :href="route('recipes.index')" :data="{ recipe }">
          <span
            class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
          >
            {{ recipe.dish.name }}
          </span>
        </Link>
      </template>
      <template #tooltipText> Рецепты из {{ recipe.dish.name }} </template>
    </RecipeShowTagLayout>

    <RecipeShowTagLayout>
      <template #content>
        <Link :href="route('recipes.index')" :data="{ recipe }">
          <span
            class="text-lg sm:text-xl text-primary-200 hover:text-primary-600"
          >
            {{ recipe.menu.name }}
          </span>
        </Link>
      </template>
      <template #tooltipText>
        Рецепты из категории {{ recipe.menu.name }}
      </template>
    </RecipeShowTagLayout>
  </div>
</template>
