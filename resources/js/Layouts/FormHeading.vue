<script setup>
defineProps({
  title: String,
});
</script>
<template>
  <div class="w-auto flex justify-center bg-secondary-900 rounded-lg mb-2">
    <span
      class="text-2xl lg:text-3xl text-primary-500 text-center font-black px-2 py-1"
    >
      {{ title }}
    </span>
  </div>
</template>
