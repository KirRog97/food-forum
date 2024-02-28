<script setup>
import IngredientSelection from "@/Components/IngredientSelection.vue";
import PostSelectionOptions from "@/Components/PostSelectionOptions.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";
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
        <FormSection>
          <FormHeading title="Название рецепта" />
          <n-input
            class="w-full flex flex-auto text-center border-0"
            placeholder="Холодный бодрящий компот с нотками драмы и ностальгии"
            v-model:value="postEditForm.title"
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
        </FormSection>

        <FormSection>
          <FormHeading title="Выбор категорий" />

          <PostSelectionOptions
            v-model:category="postEditForm.category"
            v-model:kitchen="postEditForm.kitchen"
            v-model:dish="postEditForm.dish"
            v-model:menu="postEditForm.menu"
          />
        </FormSection>

        <FormSection>
          <FormHeading title="Выбор ингредиентов" />
          <IngredientSelection
            v-model:selectedIngredients="postEditForm.ingredients"
          />
        </FormSection>

        <FormSection>
          <FormHeading title="Выбор изображения" />
          <div class="flex flex-col bg-secondary-700 rounded p-4">
            <div class="flex flex-col justify-start items-center">
              <!-- <PictureEditCustom
                  :picture="postEditForm.pictures"
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
            v-model:value="postEditForm.description"
          >
          </n-input>
        </FormSection>

        <FormSection>
          <FormHeading title="Способ приготовления" />
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание блюда"
            type="textarea"
            v-model:value="postEditForm.instruction"
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
            :loading="postEditForm.processing"
            :disabled="postEditForm.processing"
          >
            Сохранить изменения
          </n-button>
        </FormSection>
      </form>
    </div>
  </AppLayout>
</template>
