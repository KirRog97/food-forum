<script setup>
import { ref } from "vue";

defineProps({
  recipe: Object,
});

const testComment = ref(
  "Я в шоке от вашего рецепта! Даже наш кот из дома сбежал в знак протеста против ваших гнилых рецептов. Я потеряла семью, работу, кота и шторы только из-за вашего рецепта. Хотя шторы, наверное, вина. lorem ipsum lorem ipsum"
);
</script>
<template>
  <div class="flex flex-col p-0">
    <div class="grid grid-cols-12 gap-1 mb-1">
      <div class="md:col-span-1 col-span-2 flex justify-center p-0 m-0">
        <n-avatar
          round
          :size="48"
          object-fit="cover"
          :src="recipe.user.avatar.path"
          fallback-src="/images/icons/user_avacado.svg"
        />
      </div>

      <div class="col-span-6 flex flex-col justify-start">
        <span class="text-lg text-secondary-700 tracking-wide leading-none">
          {{ recipe.user.username }}
        </span>

        <span class="text-base text-secondary-700 font-light">
          Добавлен комментарий
        </span>
      </div>

      <div class="col-span-4 md:col-span-5 flex justify-start items-end">
        <span class="text-base text-secondary-700 font-light">
          12.12.2014
        </span>
      </div>
    </div>

    <div
      class="max-h-[300px] grid grid-cols-12 grid-rows-6 gap-0 bg-secondary-50 rounded overflow-hidden"
    >
      <div class="col-span-5 row-span-6">
        <n-image
          class="w-full h-full"
          object-fit="cover"
          :src="recipe.pictures.path"
          alt="Recipe picture"
        />
      </div>

      <div
        class="col-span-7 row-span-2 flex justify-center items-center overflow-x-hidden overflow-y-auto px-2 py-1"
      >
        <a
          class="w-full max-h-full text-xl text-center font-medium tracking-tight leading-tight whitespace-pre-line"
          :href="`/recipes/${recipe.id}`"
        >
          <!-- max: 64 characters -->
          <!-- <span>
            Идейные соображения высшего порядка, а также укрепление и развит
          </span> -->
          <span>{{ recipe.title }}</span>
        </a>
      </div>

      <div class="col-span-7 row-span-4 px-2 py-1">
        <p
          class="h-fit max-h-[100px] text-base text-secondary-700 leading-tight bg-secondary-100 rounded overflow-x-hidden overflow-y-auto px-2 mb-1"
        >
          {{ testComment }}
          <span class="text-teal-600 font-handwritten">
            / {{ testComment.length }}
          </span>
        </p>

        <n-button
          type="primary"
          size="small"
          class="block text-base text-secondary-500 bg-primary-300 border border-primary-400 rounded px-2 py-1"
        >
          Ответить
        </n-button>
      </div>
    </div>
  </div>
</template>
