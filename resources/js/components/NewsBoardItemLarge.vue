<script setup>
defineProps({
  newsBoardItem: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <div
    class="h-65 row-span-2 col-span-2 sm:h-[400px] flex justify-center items-center relative overflow-hidden"
  >
    <!-- Placeholder -->
    <img
      class="w-full h-full object-center object-cover overflow-hidden"
      src="/images/recipes/пельмени.jpg"
      alt="Изображение новости"
    />

    <!-- <img
      class="w-full h-full object-center object-cover overflow-hidden"
      :src="newsBoardItem.picture.path"
      alt="Изображение новости"
    /> -->
    <div
      class="absolute flex flex-col w-full h-full overflow-auto z-50 justify-center bg-vignette"
    >
      <span
        class="xs:text-5xl text-4xl w-full tracking-wide font-light leading-tight text-center text-white"
      >
        {{ newsBoardItem.category }}
      </span>
      <span
        class="uppercase font-light leading-tight z-50 xs:4xl text-xl text-white text-center tracking-wide"
      >
        {{ newsBoardItem.title }}
      </span>
      <div class="relative w-1/2 xs:w-1/4 h-10 flex flex-nowrap mx-auto">
        <div class="relative flex flex-1 top-1/2 h-px bg-white"></div>
        <div
          class="relative flex items-center text-white px-2 object-center object-fill select-none overflow-hidden z-50"
        >
          <i class="fas fa-hotdog fa-2x"></i>
        </div>
        <div class="relative flex flex-1 top-1/2 h-px bg-white"></div>
      </div>
    </div>
  </div>
</template>

<style>
.bg-vignette {
  background: radial-gradient(
    circle,
    rgba(255, 255, 255, 0.1) 0%,
    rgba(0, 0, 0, 0.3) 75%,
    rgba(0, 0, 0, 0.65) 100%
  );
}
</style>
