<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  ingredient: Object,
});
</script>
<template>
  <div
    class="grid grid-cols-3 md:grid-cols-6 gap-4 rounded-lg bg-secondary-700 p-4"
  >
    <div
      class="col-span-3 row-span-1 md:row-span-3 flex justify-center items-center"
    >
      <img
        class="w-full h-full object-cover overflow-hidden rounded"
        :src="ingredient.picture.path"
        :alt="`${ingredient.name} Picture`"
      />

      <!-- Placeholder -->
      <!--
      <img
        class="w-full h-full object-cover overflow-hidden rounded"
        src="/images/login_background.jpg"
      /> -->
    </div>
    <div class="col-span-3 row-span-1 flex justify-center items-center p-1">
      <a
        class="text-3xl text-center text-primary-400 hover:underline leading-none"
        :href="`/ingredients/${ingredient.id}`"
      >
        <span>
          {{ ingredient.name }}
        </span>
      </a>
    </div>

    <div class="col-span-3 md:col-span-3 row-span-1">
      <p
        class="text-xl text-primary-300 leading-normal md:leading-snug font-normal whitespace-pre-line overflow-hidden font-display font-serif"
        v-text="ingredient.description"
      ></p>
    </div>
    <div class="col-span-3 row-span-1 flex justify-center items-center">
      <Link
        class="text-xl text-primary-400 hover:text-primary-700 hover:underline transition px-4 py-2"
        :href="`/ingredients/${ingredient.id}/usage`"
      >
        Использование в рецептах
      </Link>
    </div>
  </div>
</template>
