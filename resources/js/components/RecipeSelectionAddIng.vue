<template>
  <div class="col-6">
    <div class="form-group">
      <label class="text-muted font-weight-lighter">Включить ингредиенты:</label>
      <div class="input-group shadow-sm">
        <div class="input-group-prepend">
          <button
            class="btn btn-light border rounded-left px-3"
            type="button"
            @click="$_RecipeSelectionAddIng_addToPreferIng"
          >
            <i class="fas fa-plus"></i>
          </button>
        </div>
        <input
          type="text"
          class="form-control shadow-none"
          :class="{ 'is-invalid': hasError }"
          v-model="searchString"
        />
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
          class="list-group-item list-group-item-success shadow px-3 py-2"
          :value="item"
          :key="index"
          @click="$_RecipeSelectionAddIng_copyToSearch(item)"
        >
          <i class="fas fa-plus mr-3"></i>
          <span>{{ item }}</span>
        </li>
      </transition-group>

      <ul
        :class="[
                    'list-group',
                    'list-group-horizontal',
                    'flex-wrap',
                    preferableIngredients.length > 0 ? 'mt-2' : 'd-none'
                ]"
      >
        <li
          class="list-group-item list-group-item-success rounded-pill shadow-sm p-2 m-1"
          v-for="(item, index) in preferableIngredients"
          :key="index"
        >
          <span class="font-weight-lighter px-1">{{ item.name }}</span>
          <button
            type="button"
            class="btn btn-danger rounded close px-1"
            @click="$_RecipeSelectionAddIng_delFromPreferIng(item)"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    ingredientArray: Array
  },

  data() {
    return {
      preferableIngredients: [],
      hasError: false,
      searchString: ""
    };
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
    $_RecipeSelectionAddIng_addToPreferIng: function() {
      if (_.isEmpty(this.searchString)) {
        return this.$snotify.info(
          "Вы не выбрали инредиент",
          "Выбор ингредиента"
        );
      }
      let ingNameArray = this.ingredientArray.map(i => i.name),
        preferableIngredients = this.preferableIngredients,
        searchString = this.searchString;
      if (
        ingNameArray.includes(searchString) &&
        !_.find(preferableIngredients, ["name", searchString])
      ) {
        let findedObj = _.find(this.ingredientArray, ["name", searchString]);
        return preferableIngredients.push({
          id: findedObj.id,
          name: findedObj.name
        });
      } else {
        this.$snotify.error(
          "Указанный ингредиент уже выбран или отсутствует",
          "Выбор ингредиента"
        );
        return (this.hasError = true);
      }
    },

    $_RecipeSelectionAddIng_delFromPreferIng: function(item) {
      if (this.preferableIngredients.includes(item)) {
        return this.preferableIngredients.splice(item);
      }
      return this.$snotify.error(
        "Указанный для удаления ингредиент не был найден",
        "Выбор ингредиента"
      );
    },

    $_RecipeSelectionAddIng_copyToSearch: function(item) {
      return (this.searchString = item);
    }
  }
};
</script>
