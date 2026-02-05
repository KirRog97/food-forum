<script setup>
defineProps({
  title: String,
});
</script>
<template>
  <div class="w-full flex justify-center mb-2">
    <div class="w-auto bg-secondary-900 rounded-lg p-1">
      <span
        class="text-2xl lg:text-3xl text-primary-500 text-center font-black px-2 py-1"
      >
        {{ title }}
      </span>
    </div>
  </div>
</template>
