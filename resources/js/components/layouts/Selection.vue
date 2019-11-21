<template>
  <select
    class="form-control custom-select custom-select-sm"
    v-model="selected"
    :required="isRequire"
    @change="sendSelectedItem"
  >
    <option disabled selected>{{ options.defaultText }}</option>
    <option v-for="(item,index) in data" :value="item.id" :key="index">{{ item.name }}</option>
  </select>
</template>

<script>
export default {
  props: {
    data: Array,
    options: {
      defaultText: String,
      isRequire: Boolean
    }
  },
  data() {
    return {
      //fix empty default <option>
      selected: this.options.defaultText,
      isRequire: this.options.isRequire === true ? "required" : null
    };
  },
  methods: {
    sendSelectedItem() {
      const newSelectedItem = {
        selected: _.toNumber(this.selected)
      };
      this.$emit("selectedItem", newSelectedItem);
    }
  }
};
</script>
