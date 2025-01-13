<template>
  <div
    class="w-auto flex justify-center items-center bg-secondary-700 rounded-lg px-4 py-2 mt-1 mr-1"
  >
    <n-tooltip placement="top" trigger="hover">
      <template #trigger>
        <slot name="content" />
      </template>
      <span>
        <slot name="tooltipText" />
      </span>
    </n-tooltip>
  </div>
</template>
