<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  links: {
    type: Object,
    default: {},
  },
});
</script>

<!-- ❗️ ToDO:Try to understand this pagination conception  ❗️-->
<!-- https://www.naiveui.com/en-US/os-theme/components/pagination#item-count.vue -->
<!-- <n-pagination :page="posts.current_page" :item-count="posts.total" :page-sizes="[10, 20, 30, 40]"
        on-update:page="onUpdatePaginationPage" on-update:page-size="onUpdatePaginationPageSize" /> -->

<template>
  <div
    v-if="links.length > 3"
    class="w-full flex flex-wrap justify-center items-center mt-12 mb-4"
  >
    <template v-for="(link, index) in links">
      <div
        v-if="link.url === null"
        :key="link.url"
        class="mr-1 mb-1 px-4 py-3 text-base text-secondary-500 leading-4 border border-secondary-100 rounded"
        v-html="link.label"
      />
      <Link
        v-else
        :key="index"
        class="mr-1 mb-1 px-4 py-3 text-base leading-4 border rounded hover:bg-primary-600 focus:border-secondary-400 focus:text-secondary-700"
        :class="{ 'bg-primary-600': link.active }"
        :href="link.url"
        v-html="link.label"
      />
    </template>
  </div>
</template>
