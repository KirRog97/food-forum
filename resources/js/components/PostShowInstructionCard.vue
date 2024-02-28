<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  instruction: {
    default: {},
  },
});
</script>
<template>
  <div class="w-full flex flex-nowrap">
    <div class="w-6/12 mr-4">
      <n-image :src="instruction.picture.path" />
    </div>
    <div class="w-6/12 flex flex-col p-2">
      <div>
        <span class="text-xl font-handwritten font-bold leading-6 mr-1">
          {{ instruction.order }}
        </span>
        <span class="text-lg leading-6">
          {{ instruction.content }}
        </span>
      </div>
      <div class="flex flex-nowrap justify-center align-items-center mt-6">
        <div class="max-w-4/12 mr-6">
          <n-avatar
            round
            :size="96"
            :src="instruction.instrument.picture.path"
          />
        </div>
        <div class="w-5/12 flex flex-col">
          <Link
            :href="route('instruments.index')"
            class="text-base text-primary-500 underline hover:no-underline hover:text-primary-700"
          >
            Инструменты
          </Link>
          <Link
            :href="
              route('instruments.show', { instrument: instruction.instrument })
            "
            class="text-xl leading-5 font-medium font-handwritten tracking-wide text-secondary-700 hover:text-primary-700"
          >
            {{ instruction.instrument.name }}
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>
