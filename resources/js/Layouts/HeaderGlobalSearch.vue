<template>
  <div>
    <!-- <el-autocomplete
    class="w-full flex items-center px-3"
    v-model="state"
    :fetch-suggestions="querySearch"
    @select="handleSelect"
  >
    <template #suffix>
      <transition
        enter-active-class="animate__animated animate__fadeIn"
        leave-active-class="animate__animated animate__fadeOut"
        appear
        css
      >
        <i
          v-show="state.length > 2"
          class="fas fa-eraser fa-lg el-input__icon text-gray-700 hover:text-red-600"
          @click="cleanSearch"
        ></i>
      </transition>
    </template>
    <template #default="{ item }">
      <div class="value">{{ item.value }}</div>
      <span class="link">{{ item.link }}</span>
    </template>
  </el-autocomplete> -->
  </div>
</template>

<script setup>
import { ref } from "vue";

const state = ref("");
const links = ref([]);

function querySearch(queryString, cb) {
  let links = this.links;
  let results = queryString
    ? links.filter(this.createFilter(queryString))
    : links;
  // call callback function to return suggestion objects
  cb(results);
}

function createFilter(queryString) {
  return (link) => {
    return link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0;
  };
}
function handleSelect(item) {}
function cleanSearch(ev) {
  state.value = "";
}
</script>
s
