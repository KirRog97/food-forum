<template>
  <div>
    <div class="container-fluid">
      <div class="row justify-content-between mb-2">
        <div class="col-sm-12 col-md-8 col-xl-9 btn-group py-sm-2 py-md-1 px-0">
          <div class="form-group w-25 shadow-none p-0 m-1">
            <selection
              @selectedItem="$_RecipeSelection_takeFromChildCategory"
              :data="categoryArray"
              :options="{ defaultText: 'Выберите категорию', isRequire: true }"
            ></selection>
          </div>
          <div class="form-group w-25 shadow-none p-0 m-1">
            <selection
              @selectedItem="$_RecipeSelection_takeFromChildKitchen"
              :data="kitchenArray"
              :options="{ defaultText: 'Выберите кухню', isRequire: true }"
            ></selection>
          </div>
          <div class="form-group w-25 shadow-none p-0 m-1">
            <selection
              @selectedItem="$_RecipeSelection_takeFromChildDish"
              :data="dishArray"
              :options="{ defaultText: 'Выберите блюдо', isRequire: true }"
            ></selection>
          </div>
          <div class="form-group w-25 shadow-none p-0 m-1">
            <selection
              @selectedItem="$_RecipeSelection_takeFromChildMenu"
              :data="menuArray"
              :options="{ defaultText: 'Выберите меню', isRequire: true }"
            ></selection>
          </div>
        </div>

        <div class="col-auto py-1 px-0 mx-1">
          <button
            type="button"
            class="btn btn-outline-secondary shadow-sm"
            @click="show = !show"
          >Ингредиенты</button>
        </div>

        <div class="col-auto py-1 px-0 m-0">
          <button class="btn btn-xm btn-secondary shadow-sm" type="submit">Подобрать рецепт</button>
        </div>
      </div>
    </div>
    <div class="container-fluid bg-light rounded p-4" v-if="show">
      <div class="row mb-3">
        <recipe-selection-add-ing :ingredientArray="ingredientArray" />
        <recipe-selection-exlucde-ing :ingredientArray="ingredientArray" />
      </div>
      <button type="button" class="btn btn-outline-secondary mr-1">Показать</button>
      <button type="reset" class="btn btn-outline-light text-muted">
        <i class="fas fa-redo mr-1"></i>
        Очистить
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      ingredientArray: [],
      categoryArray: [],
      kitchenArray: [],
      dishArray: [],
      menuArray: [],
      selectedCategoryId: null,
      selectedDishId: null,
      selectedKitchenId: null,
      selectedMenuId: null,
      show: false
    };
  },

  mounted() {
    this.$_RecipeSelection_getData();
  },

  methods: {
    $_RecipeSelection_takeFromChildCategory: function(newSelectedItem) {
      this.selectedCategoryId = newSelectedItem.selected;
    },
    $_RecipeSelection_takeFromChildKitchen: function(newSelectedItem) {
      this.selectedKitchenId = newSelectedItem.selected;
    },
    $_RecipeSelection_takeFromChildDish: function(newSelectedItem) {
      this.selectedDishId = newSelectedItem.selected;
    },
    $_RecipeSelection_takeFromChildMenu: function(newSelectedItem) {
      this.selectedMenuId = newSelectedItem.selected;
    },
    $_RecipeSelection_getData: function() {
      axios
        .get("/api/recipe-filter")
        .then(res => {
          this.ingredientArray = Vue.toArrayOfObjects(
            res.data["ingredient_list"]
          );
          this.categoryArray = Vue.toArrayOfObjects(res.data["category_list"]);
          this.kitchenArray = Vue.toArrayOfObjects(res.data["kitchen_list"]);
          this.dishArray = Vue.toArrayOfObjects(res.data["dish_list"]);
          this.menuArray = Vue.toArrayOfObjects(res.data["menu_list"]);
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>
