<template>
  <div class="w-full flex justify-center flex-wrap">
    <h2
      class="text-3xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2"
    >
      <slot name="heading"></slot>
    </h2>

    <div class="w-full space-y-2">
      <slot name="content"> </slot>
    </div>
  </div>
</template>
