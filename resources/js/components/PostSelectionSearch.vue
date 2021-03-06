<template>
  <div class="w-full space-y-2">
    <label
      class="text-base sm:text-lg text-secondary-600 font-lighter"
      v-text="
        isAdding ? 'Предпочитаемые ингредиенты' : 'Исключаемые ингредиенты'
      "
    >
    </label>

    <el-input v-model="searchString">
      <template slot="prepend">
        <i
          class="fas fa-lg leading-tight"
          :class="[
            isAdding ? 'fa-plus text-green-500' : 'fa-minus text-red-500'
          ]"
        ></i>
      </template>
    </el-input>

    <ul
      class="flex flex-col justify-start items-center rounded overflow-x-hidden overflow-y-auto divide-y-2"
      v-show="filteredInput && filteredInput.length > 0"
    >
      <li
        class="w-full flex justify-start items-center bg-gray-100 hover:bg-gray-300 shadow px-3 py-2"
        v-for="(item, index) in filteredInput"
        :value="item"
        :key="index"
        @click="$_PostSelectionSearch_addToOutputArray(item)"
      >
        <i
          class="fas fa-lg leading-tight cursor-pointer mr-3"
          :class="[
            isAdding ? 'fa-plus text-green-500' : 'fa-minus text-red-500'
          ]"
        >
        </i>
        <span class="text-base text-left">
          {{ item.name }}
        </span>
      </li>
    </ul>

    <transition-group
      name="el-fade-in-linear"
      v-show="outputArray && outputArray.length > 0"
      class="w-full flex flex-wrap justify-start items-center"
      tag="ul"
    >
      <li
        class="flex justify-between items-center mr-2 sm:mr-3 mb-3 sm:mb-2"
        v-for="(item, index) in outputArray"
        :key="item.id"
      >
        <el-tag
          :type="isAdding ? 'success' : 'danger'"
          closable
          @close="$_PostSelectionSearch_delFromOutputArray(item, index)"
        >
          <span class="text-base text-center">{{ item.name }}</span>
        </el-tag>
      </li>
    </transition-group>
  </div>
</template>

<script>
export default {
  props: {
    ingredients: Array,
    interfaceData: Array,
    isAdding: false
  },

  data() {
    return {
      outputArray: [],
      searchString: ""
    };
  },

  watch: {
    interfaceData(newValue, oldValue) {
      this.outputArray = this.interfaceData;
    }
  },

  computed: {
    filteredInput: function() {
      if (!this.searchString || this.searchString.length < 2) {
        return;
      }
      let ingredients = this.ingredients;
      let searchString = this.searchString.trim().toLowerCase();

      return (ingredients = ingredients.filter(function(item) {
        if (item.name.toLowerCase().indexOf(searchString) !== -1) {
          return item;
        }
      }));
    }
  },

  methods: {
    $_PostSelectionSearch_addToOutputArray: function(item) {
      if (_.find(this.outputArray, ["id", item.id])) {
        return this.$snotify.error(
          "Указанный ингредиент уже выбран или отсутствует",
          "Выбор ингредиента",
          { showProgressBar: false, timeout: 1500 }
        );
      }
      this.searchString = "";
      return this.outputArray.push(item);
    },

    $_PostSelectionSearch_delFromOutputArray: function(item, index) {
      if (_.find(this.outputArray, ["id", item.id])) {
        this.outputArray.splice(index, 1);

        return this.$snotify.success(
          "Указанный ингредиент успешно удален",
          "Выбор ингредиента",
          { showProgressBar: false, timeout: 1000 }
        );
      }
      return this.$snotify.error(
        "Указанный для удаления ингредиент не был найден",
        "Выбор ингредиента",
        { showProgressBar: false, timeout: 1500 }
      );
    },

    $_PostSelectionSearch_copyToSearch: function(item) {
      if (this.searchString == item) {
        return this.$snotify.info(
          "Указанный ингредиент уже скопирован в поле ввода",
          "Выбор ингредиента",
          { showProgressBar: false, timeout: 700 }
        );
      }
      return (this.searchString = item);
    }
  }
};
</script>
