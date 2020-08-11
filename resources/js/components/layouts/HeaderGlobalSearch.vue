<template>
  <el-autocomplete
    class="flex flex-auto items-center px-3"
    v-model="state"
    :fetch-suggestions="querySearch"
    @select="handleSelect"
  >
    <transition
      slot="suffix"
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
    <template slot-scope="{ item }">
      <div class="value">{{ item.value }}</div>
      <span class="link">{{ item.link }}</span>
    </template>
  </el-autocomplete>
</template>

<script>
export default {
  data() {
    return {
      state: "",
      links: []
    };
  },
  methods: {
    querySearch(queryString, cb) {
      let links = this.links;
      let results = queryString
        ? links.filter(this.createFilter(queryString))
        : links;
      // call callback function to return suggestion objects
      cb(results);
    },
    createFilter(queryString) {
      return link => {
        return (
          link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0
        );
      };
    },
    handleSelect(item) {
      console.log(item);
    },
    cleanSearch(ev) {
      this.state = "";
      console.log(ev);
    }
  }
};
</script>

<style lang="scss" scoped>
.el-autocomplete {
  display: flex;
}
</style>
