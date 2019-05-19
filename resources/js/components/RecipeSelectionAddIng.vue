<template>
  <div class="col-6">
    <div class="form-group">
      <label class="text-muted font-weight-lighter">Включить ингредиенты:</label>
      <div class="input-group shadow-sm">
        <div class="input-group-prepend">
          <button
            class="btn btn-light border rounded-left px-3"
            type="button"
            @click="$_RecipeSelectionAddIng_moveToAddList"
          >
            <i class="fas fa-plus"></i>
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
          v-for="(item, index) in filteredIAddingredients"
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
        'list-group', 'list-group-horizontal', 'flex-wrap',
        added_ingredients.length > 0? 'mt-2' : 'd-none'
        ]"
      >
        <li
          class="list-group-item list-group-item-success rounded-pill shadow-sm p-2 m-1"
          v-for="(item, index) in added_ingredients"
          :key="index"
        >
          <span class="font-weight-lighter px-1">{{ item }}</span>
          <button
            type="button"
            class="btn btn-danger rounded close px-1"
            @click="$_RecipeSelectionAddIng_delFromList(item)"
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
      added_ingredients: [],
      hasError: false,
      searchString: ""
    };
  },

  computed: {
    filteredIAddingredients: function() {
      var filtered_ingredients_array = this.ingredient_list;
      var searchString = this.searchString;

      if (!searchString || searchString.length < 2) {
        return;
      }

      searchString = searchString.trim().toLowerCase();

      filtered_ingredients_array = filtered_ingredients_array.filter(function(
        item
      ) {
        if (item.toLowerCase().indexOf(searchString) !== -1) {
          return item;
        }
      });

      return filtered_ingredients_array;
    }
  },

  methods: {
    $_RecipeSelectionAddIng_moveToAddList: function() {
      var ingredient_list = this.ingredient_list,
        added_ingredients = this.added_ingredients,
        searchString = this.searchString;

      if (
        ingredient_list.includes(searchString) &&
        !added_ingredients.includes(searchString)
      ) {
        return added_ingredients.push(searchString);
      } else {
        this.hasError = true;
        return this.hasError;
      }

      return added_ingredients;
    },

    $_RecipeSelectionAddIng_delFromList: function(item) {
      if (this.added_ingredients.includes(item))
        this.added_ingredients.splice(item);
      return this.added_ingredients;
    },

    $_RecipeSelectionAddIng_copyToSearch: function(item) {
      return (this.searchString = item);
    }
  }
};
</script>