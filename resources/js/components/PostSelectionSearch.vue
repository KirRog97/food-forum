<template>
  <div class="form-group w-100">
    <label class="text-secondary font-lighter" v-if="isAdding">
      Предпочитаемые ингредиенты:
    </label>
    <label class="text-secondary font-lighter" v-else>
      Исключаемые ингредиенты:
    </label>
    <div class="input-group shadow-sm">
      <div class="input-group-prepend">
        <button
          class="btn btn-light border rounded-left px-3"
          type="button"
          @click="$_PostSelectionSearch_addToOutputArray"
        >
          <i class="fas fa-plus" v-if="isAdding === true"></i>
          <i class="fas fa-minus" v-else></i>
        </button>
      </div>
      <input
        type="text"
        class="form-control shadow-none"
        v-model="searchString"
      />
    </div>

    <ul class="list-group mt-1">
      <li
        :class="[
          'list-group-item',
          isAdding ? 'list-group-item-success' : 'list-group-item-danger',
          'shadow',
          'px-3',
          'py-2'
        ]"
        v-for="(item, index) in filteredInput"
        :value="item"
        :key="index"
        @click="$_PostSelectionSearch_copyToSearch(item)"
      >
        <i class="fas fa-plus mr-3" v-if="isAdding === true"></i>
        <i class="fas fa-minus mr-3" v-else></i>
        <span>{{ item }}</span>
      </li>
    </ul>

    <ul
      :class="[
        'list-group',
        'list-group-horizontal',
        'flex-wrap',
        outputArray.length > 0 ? 'mt-2' : 'd-none'
      ]"
    >
      <li
        class="col-auto p-1"
        v-for="(item, index) in outputArray"
        :key="index"
      >
        <el-tag
          :type="[isAdding ? 'success' : 'danger']"
          closable
          @close="$_PostSelectionSearch_delFromOutputArray(item, index)"
        >
          <span class="text-center h6 m-0">{{ item.name }}</span>
        </el-tag>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    ingredientArray: Array,
    isAdding: false
  },

  data() {
    return {
      outputArray: [],
      searchString: ""
    };
  },

  computed: {
    filteredInput: function() {
      if (!this.searchString || this.searchString.length < 2) {
        return;
      }

      let ingNameArray = this.ingredientArray.map(i => i.name);
      let searchString = this.searchString.trim().toLowerCase();

      return (ingNameArray = ingNameArray.filter(function(item) {
        if (item.toLowerCase().indexOf(searchString) !== -1) {
          return item;
        }
      }));
    }
  },

  methods: {
    $_PostSelectionSearch_addToOutputArray: function() {
      if (_.isEmpty(this.searchString)) {
        return this.$snotify.info(
          "Вы не выбрали инредиент",
          "Выбор ингредиента",
          { showProgressBar: false, timeout: 1500 }
        );
      }
      let ingNameArray = this.ingredientArray.map(i => i.name);
      let outputArray = this.outputArray;
      let searchString = this.searchString;

      if (
        ingNameArray.includes(searchString) &&
        !_.find(outputArray, ["name", searchString])
      ) {
        let findedObj = _.find(this.ingredientArray, ["name", searchString]);

        return outputArray.push({
          id: findedObj.id,
          name: findedObj.name
        });
      } else {
        return this.$snotify.error(
          "Указанный ингредиент уже выбран или отсутствует",
          "Выбор ингредиента",
          { showProgressBar: false, timeout: 1500 }
        );
      }
    },

    $_PostSelectionSearch_delFromOutputArray: function(item, index) {
      let outputArray = this.outputArray;

      if (_.find(outputArray, ["id", item.id])) {
        outputArray.splice(index, 1);
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
      return (this.searchString = item);
    }
  }
};
</script>
