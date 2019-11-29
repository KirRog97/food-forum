<template>
  <div class="row form-group justify-content-around m-auto">
    <div class="col-12 col-md-3 form-group p-0 shadow-none">
      <selection
        @selectedItem="$_PostSelectionOptions_takeFromChildCategory"
        :data="categoryArray"
        :options="{
                    defaultText: 'Выберите категорию',
                    isRequire: true
                }"
      ></selection>
    </div>
    <div class="col-12 col-md-3 form-group p-0 shadow-none">
      <selection
        @selectedItem="$_PostSelectionOptions_takeFromChildKitchen"
        :data="kitchenArray"
        :options="{ defaultText: 'Выберите кухню', isRequire: true }"
      ></selection>
    </div>
    <div class="col-12 col-md-3 form-group p-0 shadow-none">
      <selection
        @selectedItem="$_PostSelectionOptions_takeFromChildDish"
        :data="dishArray"
        :options="{ defaultText: 'Выберите блюдо', isRequire: true }"
      ></selection>
    </div>
    <div class="col-12 col-md-3 form-group p-0 shadow-none">
      <selection
        @selectedItem="$_PostSelectionOptions_takeFromChildMenu"
        :data="menuArray"
        :options="{ defaultText: 'Выберите меню', isRequire: false }"
      ></selection>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
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
    this.$_PostSelectionOptions_getData();
  },

  methods: {
    $_PostSelectionOptions_takeFromChildCategory: function(newSelectedItem) {
      this.selectedCategoryId = newSelectedItem.selected;
      this.$_PostSelectionOptions_checkFormCompletion();
    },
    $_PostSelectionOptions_takeFromChildKitchen: function(newSelectedItem) {
      this.selectedKitchenId = newSelectedItem.selected;
      this.$_PostSelectionOptions_checkFormCompletion();
    },
    $_PostSelectionOptions_takeFromChildDish: function(newSelectedItem) {
      this.selectedDishId = newSelectedItem.selected;
      this.$_PostSelectionOptions_checkFormCompletion();
    },
    $_PostSelectionOptions_takeFromChildMenu: function(newSelectedItem) {
      this.selectedMenuId = newSelectedItem.selected;
      this.$_PostSelectionOptions_checkFormCompletion();
    },

    $_PostSelectionOptions_checkFormCompletion: function() {
      if (
        _.isNumber(this.selectedCategoryId) &&
        _.isNumber(this.selectedKitchenId) &&
        _.isNumber(this.selectedDishId)
      ) {
        this.$_PostSelectionOptions_sendData();
      }
    },

    $_PostSelectionOptions_sendData: _.debounce(function() {
      let form = new FormData();
      form.append("selectedCategoryId", this.selectedCategoryId);
      form.append("selectedDishId", this.selectedDishId);
      form.append("selectedKitchenId", this.selectedKitchenId);
      // form.append("selectedMenuId", this.selectedMenuId);

      axios
        .post("/api/r/tags/cache", form)
        .then(res => {
          return this.$snotify.success(
            "Внесенные изменения сохранены",
            "Выбор тэгов"
          );
        })
        .catch(err => {
          console.error(err);
        });
    }, 1000),

    $_PostSelectionOptions_getData: function() {
      axios
        .get("/api/recipe-filter")
        .then(res => {
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
