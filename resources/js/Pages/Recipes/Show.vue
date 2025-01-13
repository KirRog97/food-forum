<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import RecipeIngredientsTable from "@/Components/RecipeIngredientsTable.vue";
import LikeButton from "@/Components/LikeButton.vue";
import RecipeOptions from "@/Components/RecipeShowOptions.vue";
import RecipeShare from "@/Layouts/RecipeShare.vue";
import RecipeShowPopularRequests from "@/Layouts/RecipeShowPopularRequests.vue";
import RecipeShowSectionLayout from "@/Layouts/RecipeShowSectionLayout.vue";
import RecipeShowTags from "@/Layouts/RecipeShowTags.vue";
import RecipeShowInstructionCard from "@/Components/RecipeShowInstructionCard.vue";
import { computed } from "vue";

const props = defineProps({
  recipe: {
    type: Object,
    default: {},
  },
});

const sortedByOrderInstructions = computed(() => {
  return props.recipe.instructions.sort((a, b) => a.order - b.order);
});
</script>
<template>
  <AppLayout>
    <!-- ToDo: Look at this stuff! Make any similar design! -->
    <!-- https://www.deliciousmagazine.co.uk/recipes/hake-croquetas-with-aioli/ -->

    <Head :title="`Рецепт ${recipe.title}`" />

    <div class="flex flex-auto flex-wrap mx-auto">
      <div class="relative w-full bg-secondary-300">
        <div class="relative pb-2/3">
          <n-image
            class="absolute h-full w-full"
            :img-props="{ class: 'w-full h-full' }"
            object-fit="cover"
            fallback-src="/images/login_background.jpg"
            :src="recipe.pictures.path"
            alt="Recipe image"
          />
        </div>

        <div
          class="absolute bottom-0 w-full h-10 sm:h-12 flex justify-between items-center bg-gray-800 bg-opacity-85 px-4 py-2"
        >
          <LikeButton :recipeId="recipe.id" :initialLikeCount="recipe.likes_count" />

          <Link
            v-if="$page.props.auth.user?.id === recipe.user.id"
            :href="route('recipes.edit', { recipe: recipe })"
            method="GET"
            class="text-base text-primary-500 hover:text-primary-700"
          >
            <i class="far fa-edit mr-1"></i>
            <span>Редактировать</span>
          </Link>

          <a class="text-base text-primary-500 hover:text-primary-700" href="">
            <i class="far fa-bookmark mr-1"></i>
            <span>Добавить в закладки</span>
          </a>
        </div>
      </div>

      <div
        class="flex flex-auto flex-wrap justify-center bg-gray-300 px-6 py-8 mx-auto space-y-6 sm:space-y-8"
      >
        <div
          class="w-full flex flex-col md:flex-row justify-center items-start"
        >
          <RecipeShowSectionLayout>
            <template #heading>Поделиться рецептом</template>
            <template #content>
              <RecipeShare />
            </template>
          </RecipeShowSectionLayout>
          <RecipeShowSectionLayout>
            <template #heading>Популярные запросы</template>
            <template #content>
              <RecipeShowPopularRequests />
            </template>
          </RecipeShowSectionLayout>
        </div>

        <RecipeShowSectionLayout>
          <template #heading> {{ recipe.title }}</template>
        </RecipeShowSectionLayout>

        <RecipeOptions :recipe="recipe" />
        <RecipeShowTags :recipe="recipe" />

        <RecipeShowSectionLayout>
          <template #heading>Описание рецепта</template>
          <template #content>
            <p
              class="w-full text-lg text-secondary-800 leading-snug sm:leading-normal mt-4"
            >
              {{ recipe.description }}
            </p>
          </template>
        </RecipeShowSectionLayout>

        <RecipeShowSectionLayout>
          <template #heading>Используемые ингредиенты</template>
          <template #content>
            <RecipeIngredientsTable :ingredients="recipe.ingredient_recipes" />
          </template>
        </RecipeShowSectionLayout>

        <RecipeShowSectionLayout>
          <template #heading> Способ приготовления</template>
          <template #content>
            <RecipeShowInstructionCard
              v-for="instruction in sortedByOrderInstructions"
              :key="instruction.order"
              :instruction="instruction"
            />
          </template>
        </RecipeShowSectionLayout>
      </div>
    </div>
  </AppLayout>
</template>
