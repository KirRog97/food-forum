<script setup>
defineProps({
  value: {
    type: String,
  },
});
</script>

<template>
  <label
    class="flex justify-center items-center font-medium text-center text-sm text-primary-700 dark:text-primary-600"
  >
    <span v-if="value">{{ value }}</span>
    <span v-else>
      <slot />
    </span>
  </label>
</template>
