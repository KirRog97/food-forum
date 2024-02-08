<script setup>
import { ArrowUpSharp } from "@vicons/ionicons5";
</script>
<template>
  <n-back-top
    class="group bg-secondary-800 hover:shadow hover:shadow-secondary-900"
    :right="10"
    :bottom="85"
    :visibility-height="10"
    style="z-index: 9999"
  >
    <n-icon
      size="24"
      :component="ArrowUpSharp"
      class="text-primary-700 group-hover:text-primary-500"
    />
  </n-back-top>
</template>
