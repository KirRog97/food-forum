<script setup>
defineProps({
  entity: {
    type: Object,
    default: {},
    required: true,
  },
});
</script>

<template>
  <div class="flex flex-col mx-auto space-y-8">
    <div
      class="w-full flex flex-auto flex-wrap justify-center bg-secondary-100 p-4 mx-auto space-y-6 sm:space-y-8"
    >
      <div class="relative w-full bg-secondary-300">
        <div class="relative pb-2/3">
          <n-image
            class="absolute h-full w-full"
            :img-props="{ class: 'w-full h-full' }"
            object-fit="cover"
            fallback-src="/images/login_background.jpg"
            :src="entity.picture.path"
            alt="Recipe image"
          />
        </div>
      </div>
      <div class="w-full flex justify-center flex-wrap">
        <span
          class="text-2xl sm:text-4xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2"
        >
          {{ entity.name }}
        </span>
        <p
          class="w-full text-base text-center sm:text-lg text-secondary-800 leading-snug sm:leading-normal break-words"
        >
          {{ entity.description }}
        </p>
      </div>
      <slot name="showFooter"></slot>
    </div>

    <slot name="recipes"></slot>
  </div>
</template>
