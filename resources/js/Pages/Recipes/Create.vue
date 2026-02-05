<script setup>
import IngredientSelection from "@/Components/IngredientSelection.vue";
import PictureUploadSingle from "@/Components/PictureUploadSingle.vue";
import RecipeCreateInstruction from "@/Components/RecipeCreateInstruction.vue";
import RecipeSelectionOptions from "@/Components/RecipeSelectionOptions.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";
import { Head, useForm } from "@inertiajs/vue3";
// import { Route as route } from 'vendor/tightenco/ziggy/src/js'

const recipeCreateForm = useForm({
  title: "",
  COP: "",
  TTC: "",
  Kcal: "",
  category: null,
  kitchen: null,
  dish: null,
  menu: null,
  recipePicture: [],
  description: "",
  ingredients: [],
  instructions: [{ content: "" }],
});

function submitRecipeCreateForm() {
  recipeCreateForm.post(route("recipes.store", { recipe: recipeCreateForm }), {
    // onFinish: () => recipeCreateForm.reset("password"),
  });
}
</script>

<template>
  <AppLayout>
    <Head title="Создание нового рецепта" />
    <div class="w-full mx-auto bg-secondary-100 rounded px-4 py-6">
      <form class="w-full" @submit.prevent="submitRecipeCreateForm">
        <FormSection>
          <FormHeading title="Название рецепта" />

          <n-input
            class="w-full flex flex-auto text-center border-0"
            v-model:value="recipeCreateForm.title"
            type="text"
            placeholder="Холодный бодрящий компот с нотками драмы и ностальгии"
            maxlength="64"
            show-count
          >
          </n-input>
        </FormSection>

        <FormSection>
          <FormHeading title="Основные свойства" />

          <div
            class="w-full flex flex-col md:flex-row md:flex-nowrap items-center justify-center space-x-0 md:space-x-1 space-y-1 md:space-y-0"
          >
            <n-input
              class="w-full flex flex-auto text-center border-0"
              placeholder="Введите число"
              v-model:value="recipeCreateForm.COP"
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
              v-model:value="recipeCreateForm.TTC"
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
              v-model:value="recipeCreateForm.Kcal"
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
            v-model:category="recipeCreateForm.category"
            v-model:kitchen="recipeCreateForm.kitchen"
            v-model:dish="recipeCreateForm.dish"
            v-model:menu="recipeCreateForm.menu"
          />
        </FormSection>

        <FormSection>
          <FormHeading title="Выбор ингредиентов" />
          <IngredientSelection
            v-model:selectedIngredients="recipeCreateForm.ingredients"
          />
        </FormSection>

        <div class="flex flex-row flex-wrap justify-center mb-4 lg:mb-2">
          <FormHeading title="Выбор изображения" />
          <PictureUploadSingle v-model:file="recipeCreateForm.file" />
        </div>

        <FormSection>
          <FormHeading title="Описание блюда" />
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание блюда"
            type="textarea"
            v-model:value="recipeCreateForm.description"
          >
          </n-input>
        </FormSection>

        <FormSection>
          <FormHeading title="Способ приготовления" />
          <RecipeCreateInstruction
            v-model:instructions="recipeCreateForm.instructions"
          />
        </FormSection>
        <FormSection>
          <n-button
            primary
            type="primary"
            size="large"
            attr-type="submit"
            class="mt-4"
            :loading="recipeCreateForm.processing"
            :disabled="recipeCreateForm.processing"
          >
            Создать рецепт
          </n-button>
        </FormSection>
      </form>
    </div>
  </AppLayout>
</template>
