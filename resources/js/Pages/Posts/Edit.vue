<script setup>
import IngredientSelection from "@/Components/IngredientSelection.vue";
import PostSelectionOptions from "@/Components/PostSelectionOptions.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";
// import PictureEditCustom from "@/Components/PictureEditCustom.vue";

const post = usePage().props.post;

const postEditForm = useForm({
  title: post.title,
  COP: post.COP,
  TTC: post.TTC,
  Kcal: post.Kcal,
  category: post.category,
  kitchen: post.kitchen,
  dish: post.dish,
  menu: post.menu,
  postPicture: post.pictures,
  description: post.description,
  ingredients: post.ingredient_posts,
  instruction: post.instruction,
  //   instructions: post.instructions,
});

// Breeze Example
const submit = () => {
  postEditForm.post(route("password.email"));
};

// ToDo: Split in to methods
// One for common data and second for password
// Password Controller - NewPasswordController
function submitPostEditForm() {
  postEditForm.post(route("posts.update"), {
    // onFinish: () => form.reset("password"),
  });
}
</script>

<template>
  <AppLayout>
    <Head title="Изменение рецепта" />

    <Heading>Изменение рецепта</Heading>

    <div class="flex flex-col justify-center bg-secondary-400 p-4 rounded">
      <form class="w-full space-y-4" @submit.prevent="submitPostEditForm">
        <div class="flex flex-row flex-wrap justify-center mb-8 lg:mb-4">
          <div
            class="w-auto flex justify-center bg-secondary-900 rounded-lg mb-2"
          >
            <span
              class="text-2xl lg:text-3xl text-primary-500 text-center font-black px-2 py-1"
            >
              Название рецепта
            </span>
          </div>
          <n-input
            class="w-full flex flex-auto text-center border-0"
            placeholder="Холодный бодрящий компот с нотками драмы и ностальгии"
            v-model:value="postEditForm.title"
            maxlength="64"
            show-count
          >
          </n-input>
        </div>

        <div
          class="flex flex-row flex-wrap justify-around items-center mb-8 lg:mb-4 space-y-4"
        >
          <div
            class="w-auto flex justify-center bg-secondary-900 rounded-lg mb-2"
          >
            <span
              class="text-xl lg:text-2xl text-primary-500 text-center font-black px-2 py-1"
            >
              Количество порций
            </span>
          </div>

          <div
            class="w-full flex flex-col md:flex-row md:flex-nowrap items-center justify-center space-x-0 md:space-x-1 space-y-1 md:space-y-0"
          >
            <n-input
              class="w-full flex flex-auto text-center border-0"
              placeholder="Введите число"
              v-model:value="postEditForm.COP"
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
              v-model:value="postEditForm.TTC"
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
              v-model:value="postEditForm.Kcal"
            >
              <template #prefix>
                <i class="fas fa-running fa-lg"></i>
              </template>
              <template #suffix>
                <span class="text-xs sm:text-base">калорий</span>
              </template>
            </n-input>
          </div>
        </div>

        <div class="flex flex-row flex-wrap justify-center mb-8 lg:mb-4">
          <div
            class="w-auto flex justify-center bg-secondary-900 rounded-lg mb-2"
          >
            <span
              class="text-2xl lg:text-3xl text-primary-500 text-center font-black px-2 py-1"
            >
              Выбор категорий
            </span>
          </div>
          <PostSelectionOptions
            v-model:category="postEditForm.category"
            v-model:kitchen="postEditForm.kitchen"
            v-model:dish="postEditForm.dish"
            v-model:menu="postEditForm.menu"
          />
        </div>

        <div class="flex flex-row flex-wrap justify-center mb-8 lg:mb-4">
          <div
            class="w-auto flex justify-center bg-secondary-900 rounded-lg mb-2"
          >
            <span
              class="text-2xl lg:text-3xl text-primary-500 text-center font-black px-2 py-1"
            >
              Выбор ингредиентов
            </span>
          </div>
          <IngredientSelection
            v-model:selectedIngredients="postEditForm.ingredients"
          />
        </div>

        <div class="flex flex-col justify-center items-center mb-4 lg:mb-2">
          <div class="flex justify-center bg-secondary-900 rounded-lg mb-2">
            <span
              class="text-2xl lg:text-3xl text-primary-500 text-center font-black px-2 py-1"
            >
              Выбор изображения
            </span>
          </div>
          <div class="flex flex-col bg-secondary-700 rounded p-4">
            <div class="flex flex-col justify-start items-center">
              <!-- <PictureEditCustom
                  :picture="postEditForm.pictures"
                ></PictureEditCustom> -->
            </div>
          </div>
        </div>

        <div class="flex flex-row flex-wrap justify-center mb-8 lg:mb-4">
          <div
            class="w-auto flex justify-center bg-secondary-900 rounded-lg mb-2"
          >
            <span
              class="text-2xl lg:text-3xl text-primary-500 text-center font-black px-2 py-1"
            >
              Описание блюда
            </span>
          </div>
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание блюда"
            type="textarea"
            v-model:value="postEditForm.description"
          >
          </n-input>
        </div>

        <div class="flex flex-row flex-wrap justify-center mb-8 lg:mb-4">
          <div
            class="w-auto flex justify-center bg-secondary-900 rounded-lg mb-2"
          >
            <span
              class="text-2xl lg:text-3xl text-primary-500 text-center font-black px-2 py-1"
            >
              Способ приготовления
            </span>
          </div>
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание блюда"
            type="textarea"
            v-model:value="postEditForm.instruction"
          >
          </n-input>
        </div>
        <div class="flex flex-row flex-wrap justify-center mb-8 lg:mb-4">
          <n-button
            primary
            type="primary"
            size="large"
            attr-type="submit"
            class="mt-4"
            :loading="postEditForm.processing"
            :disabled="postEditForm.processing"
          >
            Создать рецепт
          </n-button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
