<script setup>
import IngredientSelection from "@/Components/IngredientSelection.vue";
import RecipeSelectionOptions from "@/Components/RecipeSelectionOptions.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";
// import PictureEditCustom from "@/Components/PictureEditCustom.vue";

const recipe = usePage().props.recipe;

const recipeEditForm = useForm({
  title: recipe.title,
  COP: recipe.COP,
  TTC: recipe.TTC,
  Kcal: recipe.Kcal,
  category: recipe.category,
  kitchen: recipe.kitchen,
  dish: recipe.dish,
  menu: recipe.menu,
  recipePicture: recipe.pictures,
  description: recipe.description,
  ingredients: recipe.ingredient_recipes,
  instructions: recipe.instructions,
});

// Breeze Example
const submit = () => {
  recipeEditForm.post(route("password.email"));
};

// ToDo: Split in to methods
// One for common data and second for password
// Password Controller - NewPasswordController
function submitRecipeEditForm() {
  recipeEditForm.post(route("recipes.update"), {
    // onFinish: () => form.reset("password"),
  });
}
</script>

<template>
  <AppLayout>
    <Head title="Изменение рецепта" />

    <Heading>Изменение рецепта</Heading>

    <div class="flex flex-col justify-center bg-secondary-400 p-4 rounded">
      <form class="w-full space-y-4" @submit.prevent="submitRecipeEditForm">
        <FormSection>
          <FormHeading title="Название рецепта" />
          <n-input
            class="w-full flex flex-auto text-center border-0"
            placeholder="Холодный бодрящий компот с нотками драмы и ностальгии"
            v-model:value="recipeEditForm.title"
            maxlength="64"
            show-count
          >
          </n-input>
        </FormSection>

        <FormSection>
          <FormHeading title="Количество порций" />
          <div
            class="w-full flex flex-col md:flex-row md:flex-nowrap items-center justify-center space-x-0 md:space-x-1 space-y-1 md:space-y-0"
          >
            <n-input
              class="w-full flex flex-auto text-center border-0"
              placeholder="Введите число"
              v-model:value="recipeEditForm.COP"
            >
              <template #prefix>
                <i class="fas fa-chart-pie fa-lg"></i>
              </template>
              <template #suffix>
                <span class="text-xs sm:text-base">порций</span>
              </template>
            </n-input>
            <n-input
              class="w-full flex flex-auto text-center border-0"
              placeholder="Введите число"
              v-model:value="recipeEditForm.TTC"
            >
              <template #prefix>
                <i class="fas fa-clock fa-lg"></i>
              </template>
              <template #suffix>
                <span class="text-xs sm:text-base">минут</span>
              </template>
            </n-input>
            <n-input
              class="w-full flex flex-auto text-center border-0"
              placeholder="Введите число"
              v-model:value="recipeEditForm.Kcal"
            >
              <template #prefix>
                <i class="fas fa-running fa-lg"></i>
              </template>
              <template #suffix>
                <span class="text-xs sm:text-base">калорий</span>
              </template>
            </n-input>
          </div>
        </FormSection>

        <FormSection>
          <FormHeading title="Выбор категорий" />

          <RecipeSelectionOptions
            v-model:category="recipeEditForm.category"
            v-model:kitchen="recipeEditForm.kitchen"
            v-model:dish="recipeEditForm.dish"
            v-model:menu="recipeEditForm.menu"
          />
        </FormSection>

        <FormSection>
          <FormHeading title="Выбор ингредиентов" />
          <IngredientSelection
            v-model:selectedIngredients="recipeEditForm.ingredients"
          />
        </FormSection>

        <FormSection>
          <FormHeading title="Выбор изображения" />
          <div class="flex flex-col bg-secondary-700 rounded p-4">
            <div class="flex flex-col justify-start items-center">
              <!-- <PictureEditCustom
                    :picture="recipeEditForm.pictures"
                  ></PictureEditCustom> -->
            </div>
          </div>
        </FormSection>

        <FormSection>
          <FormHeading title="Описание блюда" />
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание блюда"
            type="textarea"
            v-model:value="recipeEditForm.description"
          >
          </n-input>
        </FormSection>

        <FormSection>
          <FormHeading title="Способ приготовления" />
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание блюда"
            type="textarea"
            v-model:value="recipeEditForm.instructions"
          >
          </n-input>
        </FormSection>
        <FormSection>
          <n-button
            primary
            type="primary"
            size="large"
            attr-type="submit"
            class="mt-4"
            :loading="recipeEditForm.processing"
            :disabled="recipeEditForm.processing"
          >
            Сохранить изменения
          </n-button>
        </FormSection>
      </form>
    </div>
  </AppLayout>
</template>
