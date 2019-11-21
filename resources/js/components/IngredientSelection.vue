<template>
  <div class="row">
    <div class="col-12">
      <div
        class="form-group d-flex flex-wrap justify-content-center position-relative pt-4 mt-5 mb-0"
      >
        <label class="text-shadow shadow">Включить ингредиенты</label>
        <div class="input-group shadow-sm">
          <div class="input-group-prepend">
            <div class="input-group-sm">
              <button
                class="btn border border-right-0 border-primary rounded shadow-none"
                type="button"
                @click="$_IngredientSelection_addToList"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <input
            type="text"
            class="form-control text-left"
            :class="{ 'is-invalid': hasError }"
            v-model="searchString"
          />
        </div>
      </div>

      <transition-group
        class="list-group mt-1"
        move-class="animated fadeOutUp slow"
        enter-active-class="animate fadeInDownBig delay-1s slow"
        leave-active-class="animated fadeOutUp d-none delay-1s slow"
        tag="ul"
      >
        <li
          v-for="(item, index) in filterIngredients"
          class="list-group-item list-group-item-primary shadow px-3 py-2"
          :value="item"
          :key="index"
          @click="$_IngredientSelection_copyToSearch(item)"
        >
          <i class="fas fa-plus mr-3"></i>
          <span>{{ item }}</span>
        </li>
      </transition-group>
    </div>

    <div class="col-12" :class="[!added_ingredients.length > 0 ? 'd-none' : 'bg-dark-50']">
      <ul
        class="list-group list-group-horizontal flex-wrap justify-content-center bg-dark35 rounded border border-primary p-2"
        :class="[added_ingredients.length > 0 ? 'mt-2' : 'd-none']"
      >
        <li
          class="list-group-item bg-transparent shadow-none border-0 p-2"
          v-for="(item, index) in added_ingredients"
          :key="index"
        >
          <div class="d-flex justify-content-center rounded border-primary bg-secondary p-2">
            <div class="card bg-secondary border-0 text-shadow">
              <div
                class="card-head position-relative border-bottom border-primary text-center text-wrap"
              >
                <div class="position-absolute" style="top: -23px; right: -23px">
                  <button
                    type="button"
                    class="close text-danger text-shadow p-2"
                    @click="$_IngredientSelection_delFromList(item,index)"
                  >
                    <i class="fas fa-times fa-lg" aria-hidden="true"></i>
                  </button>
                </div>
                <h4>{{ item.name }}</h4>
              </div>
              <div class="card-body py-3 px-2">
                <h5 class="card-subtitle text-center mb-2">Количество грамм:</h5>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button
                      type="button"
                      class="btn btn-outline-primary"
                      @click="item.amount -= 10"
                    >
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <input
                    type="number"
                    class="form-control"
                    min="0"
                    max="10000"
                    step="1"
                    v-model="item.amount"
                  />
                  <div class="input-group-append">
                    <button
                      type="button"
                      class="btn btn-outline-primary"
                      @click="item.amount += 10"
                    >
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
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
      if (!this.searchString || this.searchString.length < 3) {
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

    $_IngredientSelection_getData: function() {
      axios
        .get("/api/recipe-filter")
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
