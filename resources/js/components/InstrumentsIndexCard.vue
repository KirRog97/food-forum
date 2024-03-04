<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  instrument: {
    type: Object,
    required: true,
    default: {},
  },
});
</script>
<template>
  <div class="w-full h-64 flex flex-nowrap">
    <div class="w-6/12 mr-4">
      <n-image
        class="w-full h-full"
        :img-props="{ class: 'w-full h-full' }"
        object-fit="cover"
        fallback-src="/images/icons/user_avacado.svg"
        :src="instrument.picture.path"
        alt="Instrument Picture"
      />
    </div>
    <div class="w-6/12 h-64 flex flex-col p-2">
      <div class="flex w-full mb-2">
        <Link
          class="w-full h-full text-xl text-secondary-800 font-medium font-handwritten overflow-hidden text-balance text-ellipsis leading-2"
          :href="route('instruments.show', { instrument: instrument })"
        >
          {{ instrument.name }}
        </Link>
      </div>
      <div class="flex flex-1 w-full h-48 overflow-hidden">
        <p
          class="text-base h-full w-full overflow-hidden text-wrap text-ellipsis py-2"
        >
          {{ instrument.description }}
        </p>
      </div>
    </div>
  </div>
</template>
