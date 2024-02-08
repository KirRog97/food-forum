<template>
  <div class="relative text-center text-secondary-500 uppercase z-10 mb-4">
    <div class="relative w-full h-[50px] flex flex-nowrap mx-auto">
      <div
        class="relative flex flex-1 flex-grow-1 flex-shrink-1 top-1/2 h-px bg-secondary-100"
      ></div>
      <img
        class="relative w-[72px] h-[50px] px-[10px] object-center object-fill overflow-hidden select-none z-50"
        src="/images/olive_branche.png"
      />
      <div
        class="relative flex flex-1 flex-grow-1 flex-shrink-1 top-1/2 h-px bg-secondary-100"
      ></div>
    </div>
    <span class="text-2xl sm:text-3xl font-display">
      <slot />
    </span>
  </div>
</template>
