<template>
  <div class="col-6">
    <div class="form-group">
      <label for class="text-muted font-weight-lighter">Исключить ингредиенты:</label>
      <div class="input-group shadow-sm">
        <div class="input-group-append">
          <button
            class="btn btn-light border rounded-left px-3"
            type="button"
            @click="$_RecipeSelectionExIng_moveToExList"
          >
            <i class="fas fa-minus"></i>
          </button>
        </div>
        <input
          type="text"
          class="form-control shadow-none"
          :class="{ 'is-invalid' : hasError }"
          v-model="searchString"
        >
      </div>

      <transition-group
        class="list-group mt-1"
        move-class="animated fadeOutUp slow"
        enter-active-class="animate fadeInDownBig delay-1s slow"
        leave-active-class="animated fadeOutUp d-none delay-1s slow"
        tag="ul"
      >
        <li
          v-for="(item, index) in filteredExIingredients"
          class="list-group-item list-group-item-danger shadow px-3 py-2"
          :value="item"
          :key="index"
          @click="$_RecipeSelectionExIng_copyToSearch(item)"
        >
          <i class="fas fa-minus mr-3"></i>
          <span>{{ item }}</span>
        </li>
      </transition-group>

      <ul
        :class="[
        'list-group', 'list-group-horizontal', 'flex-wrap',
        ex_ingredients.length > 0 ? 'mt-2' : 'd-none'
        ]"
      >
        <li
          class="list-group-item list-group-item-danger rounded-pill shadow-sm p-2 m-1"
          v-for="(item, index) in ex_ingredients"
          :key="index"
        >
          <span class="font-weight-lighter px-1">{{ item }}</span>
          <button
            type="button"
            class="btn btn-success rounded close px-1"
            @click="$_RecipeSelectionExIng_delFromList(item)"
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
    ingredient_list: Array
  },

  data() {
    return {
      ex_ingredients: [],
      hasError: false,
      searchString: ""
    };
  },

  computed: {
    filteredExIingredients: function() {
      var ex_ingredients_array = this.ingredient_list;
      var searchString = this.searchString;

      if (!searchString || searchString.length < 2) {
        return;
      }

      searchString = searchString.trim().toLowerCase();

      ex_ingredients_array = ex_ingredients_array.filter(function(item) {
        if (item.toLowerCase().indexOf(searchString) !== -1) {
          return item;
        }
      });

      return ex_ingredients_array;
    }
  },

  methods: {
    $_RecipeSelectionExIng_moveToExList: function() {
      var ingredient_list = this.ingredient_list,
        ex_ingredients = this.ex_ingredients,
        searchString = this.searchString;

      if (
        ingredient_list.includes(searchString) &&
        !ex_ingredients.includes(searchString)
      ) {
        return ex_ingredients.push(searchString);
      } else {
        this.hasError = true;
        return this.hasError;
      }

      return ex_ingredients;
    },

    $_RecipeSelectionExIng_delFromList: function(item) {
      if (this.ex_ingredients.includes(item)) this.ex_ingredients.splice(item);
      return this.ex_ingredients;
    },

    $_RecipeSelectionExIng_copyToSearch: function(item) {
      return (this.searchString = item);
    }
  }
};
</script>
