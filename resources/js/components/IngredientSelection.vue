<template>
  <div class="w-full flex flex-col justify-center">
    <el-input v-model="searchString">
      <template slot="prepend">
        <i
          class="fas fa-plus text-sm sm:text-base text-green-500 leading-tight cursor-pointer"
          @click="$_IngredientSelection_addToList"
        ></i>
      </template>
    </el-input>

    <transition-group
      class="flex flex-col rounded overflow-x-hidden overflow-y-auto divide-y-2 mt-2"
      enter-active-class="animate__animated animate__fadeIn animate__slow"
      leave-active-class="animate__animated animate__fadeOutRight animate__delay-75 animate__fast"
      tag="ul"
      css
    >
      <li
        v-for="item in filterIngredients"
        class="w-full flex justify-start items-center bg-gray-100 hover:bg-gray-300 shadow px-3 py-2"
        :value="item"
        :key="item.id"
        @click="$_IngredientSelection_copyToSearch(item)"
      >
        <i class="fas fa-plus text-base sm:text-lg text-green-500 mr-3"></i>
        <span class="text-base sm:text-lg text-secondary700">{{ item }}</span>
      </li>
    </transition-group>

    <ul
      class="flex flex-wrap justify-between mt-4 space-y-4 sm:space-y-3"
      :class="[added_ingredients.length > 0 ? 'mt-2' : 'hidden']"
    >
      <li
        class="w-full flex flex-no-wrap justify-between bg-transparent shadow-none border-0 space-x-2"
        v-for="(item, index) in added_ingredients"
        :key="index"
      >
        <el-input
          class="el-input_indgredient"
          placeholder="Введите число"
          v-model="item.amount"
        >
          <div
            class="custom-el-input_prepend flex justify-center items-center text-xs xs:text-base sm:text-lg"
            slot="prepend"
          >
            {{ item.name }}
          </div>
          <div
            class="custom-el-input_append flex justify-center items-center tex-xs xs:text-base sm:text-lg"
            slot="append"
          >
            грамм
          </div>
        </el-input>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      ingredientArray: [],
      added_ingredients: [],
      hasError: false,
      searchString: ""
    };
  },

  mounted() {
    this.$_IngredientSelection_getData();
  },

  computed: {
    filterIngredients: function() {
      if (!this.searchString || this.searchString.length < 2) {
        return;
      }

      let ingNameArray = this.ingredientArray.map(i => i.name);
      let searchString = this.searchString;

      searchString = searchString.trim().toLowerCase();

      return (ingNameArray = ingNameArray.filter(function(item) {
        if (item.toLowerCase().indexOf(searchString) !== -1) {
          return item;
        }
      }));
    },
    summaryAmountOfIng: function() {
      let ingredientAmountArray = this.added_ingredients.map(i => i.amount);
      let ingredientTotalAmount = _.sum(ingredientAmountArray);
      if (ingredientTotalAmount > 0) {
        return ingredientTotalAmount;
      }
    }
  },

  watch: {
    summaryAmountOfIng: function() {
      this.$_IngredientSelection_sendData();
    }
  },

  methods: {
    $_IngredientSelection_addToList: function() {
      if (_.isEmpty(this.searchString)) {
        return this.$snotify.info(
          "Вы не выбрали инредиент",
          "Выбор ингредиента"
        );
      }
      let ingNameArray = this.ingredientArray.map(i => i.name);
      let added_ingredients = this.added_ingredients;
      let searchString = this.searchString;

      // https://lodash.com/docs/4.17.11#find
      let existInIngredientList = ingNameArray.includes(searchString);
      let missedInAddedIngredientsList = !_.find(added_ingredients, [
        "name",
        searchString
      ]);

      if (existInIngredientList && missedInAddedIngredientsList) {
        let findedObj = _.find(this.ingredientArray, ["name", searchString]);
        return added_ingredients.push({
          id: findedObj.id,
          name: findedObj.name,
          amount: 0
        });
        this.hasError = false;
        this.searchString = "";
      } else {
        this.hasError = true;
        return this.$snotify.error(
          "Указанный ингредиент уже выбран или отсутствует",
          "Выбор ингредиента"
        );
      }
    },

    $_IngredientSelection_delFromList: function(item, index) {
      if (_.find(this.added_ingredients, ["name", item.name])) {
        this.added_ingredients.splice(index, 1);
        return this.$snotify.success(
          "Указанный ингредиент успешно удален",
          "Выбор ингредиента"
        );
      }
      return this.$snotify.error(
        "Указанный для удаления ингредиент не был найден",
        "Выбор ингредиента"
      );
    },

    $_IngredientSelection_copyToSearch: function(item) {
      return (this.searchString = item);
    },

    $_IngredientSelection_sendData: _.debounce(function() {
      axios
        .post("/post/ing/save", {
          added_ingredients: this.added_ingredients
        })
        .then(res => {
          return this.$snotify.info("Изменения сохранены", "Выбор ингредиента");
        })
        .catch(err => {
          this.$snotify.error(
            "Изменения не были сохранены",
            "Выбор ингредиента"
          );
          return this.$snotify.error(null, "Ошибка сервера");
        });
    }, 3000),

    $_IngredientSelection_getData: function() {
      axios
        .get("/post-filter")
        .then(res => {
          this.ingredientArray = Vue.toArrayOfObjects(
            res.data["ingredient_list"]
          );
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>
<style lang="scss" scopped>
.el-input_indgredient.el-input-group.el-input-group--append.el-input-group--prepend {
  .el-input-group__prepend {
    width: 70% !important;
  }

  .el-input-group__append {
    width: 20% !important;
  }
  input {
    text-align: center;
  }
}
</style>
