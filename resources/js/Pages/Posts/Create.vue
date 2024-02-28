<script setup>
import IngredientSelection from "@/Components/IngredientSelection.vue";
import PictureUploadSingle from "@/Components/PictureUploadSingle.vue";
import PostCreateInstruction from "@/Components/PostCreateInstruction.vue";
import PostSelectionOptions from "@/Components/PostSelectionOptions.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";
import { Head, useForm } from "@inertiajs/vue3";
// import { Route as route } from 'vendor/tightenco/ziggy/src/js'

const postCreateForm = useForm({
  title: "",
  COP: "",
  TTC: "",
  Kcal: "",
  category: null,
  kitchen: null,
  dish: null,
  menu: null,
  postPicture: [],
  description: "",
  ingredients: [],
  instructions: [{ text: "" }],
});

function submitPostCreateForm() {
  postCreateForm.post(route("posts.store", postCreateForm), {
    // onFinish: () => postCreateForm.reset("password"),
  });
}
</script>

<template>
  <AppLayout>
    <Head title="Создание нового рецепта" />
    <div class="w-full mx-auto bg-secondary-100 rounded px-4 py-6">
      <form class="w-full" @submit.prevent="submitPostCreateForm">
        <FormSection>
          <FormHeading title="Название рецепта" />

          <n-input
            class="w-full flex flex-auto text-center border-0"
            v-model:value="postCreateForm.title"
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
              v-model:value="postCreateForm.COP"
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
              v-model:value="postCreateForm.TTC"
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
              v-model:value="postCreateForm.Kcal"
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
          <PostSelectionOptions
            v-model:category="postCreateForm.category"
            v-model:kitchen="postCreateForm.kitchen"
            v-model:dish="postCreateForm.dish"
            v-model:menu="postCreateForm.menu"
          />
        </FormSection>

        <FormSection>
          <FormHeading title="Выбор ингредиентов" />
          <IngredientSelection
            v-model:selectedIngredients="postCreateForm.ingredients"
          />
        </FormSection>

        <div class="flex flex-row flex-wrap justify-center mb-4 lg:mb-2">
          <FormHeading title="Выбор изображения" />
          <PictureUploadSingle v-model:picture="postCreateForm.postPicture" />
        </div>

        <FormSection>
          <FormHeading title="Описание блюда" />
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание блюда"
            type="textarea"
            v-model:value="postCreateForm.description"
          >
          </n-input>
        </FormSection>

        <FormSection>
          <FormHeading title="Способ приготовления" />
          <PostCreateInstruction
            v-model:instructions="postCreateForm.instructions"
          />
        </FormSection>
        <FormSection>
          <n-button
            primary
            type="primary"
            size="large"
            attr-type="submit"
            class="mt-4"
            :loading="postCreateForm.processing"
            :disabled="postCreateForm.processing"
          >
            Создать рецепт
          </n-button>
        </FormSection>
      </form>
    </div>
  </AppLayout>
</template>
