<template>
  <div class="container-fluid p-0">
    <vs-row class="w-100 mb-2" vs-justify="space-between">
      <vs-col class="px-1 py-2" vs-lg="3" vs-sm="6" vs-xs="12">
        <vs-select
          class="w-100"
          placeholder="Выберите категорию"
          v-model.number="selectedCategoryId"
        >
          <vs-select-item
            :key="index"
            :value="item.id"
            :text="item.name"
            v-for="(item, index) in categoryArray"
          />
        </vs-select>
      </vs-col>
      <vs-col class="px-1 py-2" vs-lg="3" vs-sm="6" vs-xs="12">
        <vs-select
          class="w-100"
          placeholder="Выберите кухню"
          v-model.number="selectedKitchenId"
        >
          <vs-select-item
            :key="index"
            :value="item.id"
            :text="item.name"
            v-for="(item, index) in kitchenArray"
          />
        </vs-select>
      </vs-col>
      <vs-col class="px-1 py-2" vs-lg="3" vs-sm="6" vs-xs="12">
        <vs-select
          class="w-100"
          placeholder="Выберите блюдо"
          v-model.number="selectedDishId"
        >
          <vs-select-item
            :key="index"
            :value="item.id"
            :text="item.name"
            v-for="(item, index) in dishArray"
          />
        </vs-select>
      </vs-col>
      <vs-col class="px-1 py-2" vs-lg="3" vs-sm="6" vs-xs="12">
        <vs-select
          class="w-100"
          vs-w="12"
          placeholder="Выберите меню"
          v-model.number="selectedMenuId"
        >
          <vs-select-item
            :key="index"
            :value="item.id"
            :text="item.name"
            v-for="(item, index) in menuArray"
          />
        </vs-select>
      </vs-col>
    </vs-row>

    <vs-row
      class="bg-light rounded p-2"
      vs-w="12"
      vs-justify="space-between"
      v-if="show"
    >
      <vs-col class="row" vs-justify="space-between">
        <recipe-selection-add-ing :ingredientArray="ingredientArray" />
        <recipe-selection-exlucde-ing :ingredientArray="ingredientArray" />
      </vs-col>
      <vs-col vs-type="flex" vs-justify="space-around">
        <vs-button class="w-100" color="secondary" type="flat" icon="replay">
          Очистить
        </vs-button>
      </vs-col>
    </vs-row>

    <vs-row class="w-100 mb-2" vs-justify="space-between">
      <vs-col class="px-1 py-2" vs-lg="3" vs-sm="12" vs-xs="12">
        <vs-button
          class="w-100"
          color="secondary"
          type="relief"
          @click="show = !show"
        >
          Ингредиенты
        </vs-button>
      </vs-col>

      <!-- add submit func -->
      <vs-col class="px-1 py-2" vs-lg="3" vs-sm="12" vs-xs="12">
        <vs-button class="w-100" color="secondary" type="relief">
          Подобрать рецепт
        </vs-button>
      </vs-col>
    </vs-row>
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
      selectedCategoryId: Number,
      selectedDishId: Number,
      selectedKitchenId: Number,
      selectedMenuId: Number,
      show: false
    };
  },

  mounted() {
    this.$_RecipeSelection_getData();
  },

  methods: {
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
