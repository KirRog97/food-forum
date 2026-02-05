<script setup>
import LikeButton from "@/Components/LikeButton.vue";
import RecipeIngredientsTable from "@/Components/RecipeIngredientsTable.vue";
import { Close } from "@vicons/ionicons5";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
  recipe: Object,
});

const showIngredients = ref(false);
const isLoadingRecipeIng = ref(false);
const ingredientRecipes = ref([]);

function loadIngredientRecipes() {
  isLoadingRecipeIng.value = true;

  axios
    .get(`/api/recipes/${props.recipe.id}/ingredients`)
    .then((res) => {
      ingredientRecipes.value = res.data;
      showIngredients.value = true;
      isLoadingRecipeIng.value = false;
    })
    .catch((error) => {});
}
</script>

<template>
  <div
    class="grid grid-cols-6 rounded h-64 min-w-[240px] xs:min-w-[350px] md:min-w-[450px]"
  >
    <div class="relative col-start-1 col-end-4 row-start-1 row-end-7">
      <div
        class="absolute bottom-0 w-full flex justify-center items-center bg-b-to-t-vignette overflow-hidden px-2 pt-4 pb-2 z-20"
      >
        <div class="w-auto flex justify-end select-none">
          <n-avatar
            round
            size="small"
            object-fit="cover"
            :src="recipe.user.avatar.path"
            fallback-src="/images/icons/user_avacado.svg"
          />
        </div>
        <div class="max-w-full flex flex-auto justify-center items-center px-px sm:px-1">
          <n-tooltip placement="top" trigger="hover">
            <template #trigger>
              <Link
                class="w-full text-base lg:text-lg text-white hover:text-primary-300 text-center tracking-wide font-light leading-tight"
                :href="route('users.show', { user: recipe.user_id })"
              >
                <span>
                  {{ recipe.user.username }}
                </span>
              </Link>
            </template>
            <span class="text-base">Просмотреть профиль</span>
          </n-tooltip>
        </div>
      </div>
      <div class="h-64">
        <n-image
          class="w-full h-full"
          :img-props="{ class: 'w-full h-full' }"
          object-fit="cover"
          :src="recipe.pictures.path"
          alt="Recipe picture"
        />
      </div>
    </div>

    <div
      class="col-span-3 row-span-2 flex flex-auto justify-center items-center border-t border-r border-secondary-100 overflow-x-hidden overflow-y-auto px-2 py-3"
    >
      <a
        class="text-lg xs:text-xl sm:text-2xl text-center font-medium tracking-tight leading-tight whitespace-pre-line"
        :href="`/recipes/${recipe.id}`"
      >
        <!-- max: 64 characters -->
        <!-- <span>Идейные соображения высшего порядка, а также укрепление и развит</span
            > -->
        <span>{{ recipe.title }}</span>
      </a>
    </div>

    <div
      class="col-span-3 row-span-2 flex flex-col md:flex-row flex-nowrap justify-between items-center border-r border-secondary-100 px-2 py-1 space-y-px md:space-y-0 space-x-0 md:space-x-px"
    >
      <div
        class="flex justify-center items-center text-primary-500 hover:text-primary-300 hover:bg-secondary-700 border border-secondary-100 rounded-full px-2 py-2"
      >
        <span class="text-sm sm:text-xs text-center leading-4">
          <i class="far fa-clock"></i>
          {{ recipe.TTC }} мин
        </span>
      </div>
      <div
        class="flex justify-center items-center text-primary-500 hover:text-primary-300 hover:bg-secondary-700 border border-secondary-100 rounded-full px-2 py-2"
      >
        <span class="text-sm sm:text-xs text-center leading-4">
          <i class="fas fa-chart-pie"></i>
          {{ recipe.COP }} порции
        </span>
      </div>
      <div
        class="flex justify-center items-center text-primary-500 hover:text-primary-300 hover:bg-secondary-700 border border-secondary-100 rounded-full px-2 py-2"
      >
        <span class="text-sm sm:text-xs text-center leading-4">
          <i class="fas fa-running"></i>
          {{ recipe.Kcal }} ккал
        </span>
      </div>
    </div>

    <div
      class="col-span-3 row-span-1 w-full flex justify-center items-center border-r border-secondary-100"
    >
      <n-button
        type="primary"
        class="text-base px-1 py-2"
        :loading="isLoadingRecipeIng"
        @click="loadIngredientRecipes"
        text
      >
        Ингредиенты
      </n-button>
      <n-modal v-model:show="showIngredients" display-directive="show">
        <n-card
          style="width: 600px"
          :title="`Ингредиенты репепта ${recipe.title}`"
          :bordered="true"
          size="huge"
          role="dialog"
          aria-modal="true"
        >
          <template #header-extra>
            <n-button @click="showIngredients = false">
              <n-icon size="24" :component="Close" />
            </n-button>
          </template>

          <RecipeIngredientsTable :ingredients="ingredientRecipes" />

          <template #footer>
            <div class="flex justify-center items-center">
              <n-button primary tag="a" :href="`/recipes/${recipe.id}`">
                Перейти к рецепту
              </n-button>
            </div>
          </template>
        </n-card>
      </n-modal>
    </div>

    <div class="col-span-3 row-span-1 flex flex-row flex-nowrap justify-center items-end">
      <div
        class="w-full h-full flex justify-between items-center border-t border-r border-b border-secondary-100 px-2 py-1"
      >
        <div class="w-7/12 flex justify-start items-center">
          <LikeButton :recipeId="recipe.id" :initialLikeCount="recipe.likes_count" />
        </div>
        <div class="w-5/12 flex justify-end items-center space-x-1">
          <a class="text-secondary-200 hover:text-blue-800 px-2" href="">
            <i class="fab fa-facebook-f fa-lg"></i>
          </a>
          <a class="text-secondary-200 hover:text-blue-800 px-2" href="">
            <i class="fab fa-vk fa-lg"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.bg-b-to-t-vignette {
  background: linear-gradient(
    0deg,
    rgba(0, 0, 0, 0.6) 0%,
    rgba(0, 0, 0, 0.75) 40%,
    rgba(182, 182, 182, 0.1) 95%,
    rgba(255, 251, 251, 0) 100%
  );
}
</style>
