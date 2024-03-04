<script setup>
import MessageEmptyCollection from "@/Components/MessageEmptyCollection.vue";
import InstrumentsIndexCard from "@/Components/InstrumentsIndexCard.vue";
import Heading from "@/Layouts/Heading.vue";
import HeadingSub from "@/Layouts/HeadingSub.vue";
import Pagination from "@/Layouts/Pagination.vue";

defineProps({
  headingText: {
    type: String,
    default: "",
    required: true,
  },
  headingSubText: {
    type: String,
    default: "",
    required: true,
  },
  messageEmptyCollection: {
    type: String,
    default: "Список инструментов пуст",
  },
  paginationLinks: {
    type: Object,
    default: {},
  },
  instruments: Object,
});
</script>

<template>
  <Heading v-if="headingText">{{ headingText }}</Heading>
  <HeadingSub v-if="headingSubText">{{ headingSubText }}</HeadingSub>

  <template v-if="instruments.length > 0">
    <div class="w-full flex flex-col space-y-4">
      <InstrumentsIndexCard
        v-for="instrument in instruments"
        :key="instrument.id"
        :instrument="instrument"
      />
    </div>
    <Pagination v-if="paginationLinks.length > 0" :links="paginationLinks" />
  </template>
  <template v-else>
    <MessageEmptyCollection>
      {{ messageEmptyCollection }}
    </MessageEmptyCollection>
  </template>
</template>
