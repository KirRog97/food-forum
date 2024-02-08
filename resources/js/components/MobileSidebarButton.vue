<script setup>
import { computed } from "vue";
import { useStore } from "vuex";

const store = useStore();

// Vuex States
const drawerOpenStatus = computed(() => store.state.drawerOpenStatus);

// Vuex Actions
const switchToggleDrawer = () => store.dispatch("switchToggleDrawer");
</script>

<template>
  <div class="flex justify-center items-center px-5 py-2">
    <button class="block md:hidden" @click="switchToggleDrawer()">
      <i
        class="fa fa-bars lg:text-2xl text-xl text-primary-600 md:text-secondary-900 hover:transition hover:text-primary-400"
        aria-hidden="true"
      ></i>
    </button>
  </div>
</template>
