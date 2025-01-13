<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
  ingredient: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <AppLayout>
    <Head :title="`Ингредиент ${ingredient.name}`" />

    <div class="flex flex-col mx-auto">
      <div class="relative w-full bg-secondary-100">
        <div class="relative pb-2/3">
          <img
            class="absolute h-full w-full object-cover"
            :src="ingredient.picture.path"
            :alt="`Ingredient ${ingredient.name}
          image`"
          />

          <!-- {{-- Placeholder --}} -->

          <!-- <img
          class="absolute h-full w-full object-cover"
          src="/images/login_background.jpg"
          alt="Recipe image"
        /> -->
        </div>
      </div>

      <div
        class="flex flex-auto flex-wrap justify-center bg-secondary-100 px-6 py-8 mx-auto space-y-6 sm:space-y-8"
      >
        <div class="flex justify-center flex-wrap">
          <span
            class="text-2xl sm:text-4xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2"
          >
            {{ ingredient.name }}
          </span>

          <p
            class="w-full text-base sm:text-lg text-secondary-800 leading-snug sm:leading-normal"
          >
            {{ ingredient.description }}
          </p>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
