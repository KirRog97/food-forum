<template>
  <vs-row vs-align="center" vs-type="flex" vs-justify="space-between" vs-w="12">
    <vs-col
      :vs-lg="selectOptions.grid.lg"
      :vs-sm="selectOptions.grid.sm"
      :vs-xs="selectOptions.grid.xs"
    >
      <vs-select
        color="primary"
        :class="selectOptions.selectClass"
        placeholder="Выберите категорию"
        v-model="selectedCategoryId"
      >
        <vs-select-item
          :class="selectOptions.selectClass"
          :key="index"
          :value="item.id"
          :text="item.name"
          v-for="(item, index) in categoryArray"
        />
      </vs-select>
    </vs-col>
    <vs-col
      :vs-lg="selectOptions.grid.lg"
      :vs-sm="selectOptions.grid.sm"
      :vs-xs="selectOptions.grid.xs"
    >
      <vs-select
        color="primary"
        :class="selectOptions.selectClass"
        placeholder="Выберите кухню"
        v-model="selectedKitchenId"
      >
        <vs-select-item
          :key="index"
          :value="item.id"
          :text="item.name"
          v-for="(item, index) in kitchenArray"
        />
      </vs-select>
    </vs-col>
    <vs-col
      :vs-lg="selectOptions.grid.lg"
      :vs-sm="selectOptions.grid.sm"
      :vs-xs="selectOptions.grid.xs"
    >
      <vs-select
        color="primary"
        :class="selectOptions.selectClass"
        placeholder="Выберите кухню"
        v-model="selectedDishId"
      >
        <vs-select-item
          :key="index"
          :value="item.id"
          :text="item.name"
          v-for="(item, index) in dishArray"
        />
      </vs-select>
    </vs-col>
    <vs-col
      :vs-lg="selectOptions.grid.lg"
      :vs-sm="selectOptions.grid.sm"
      :vs-xs="selectOptions.grid.xs"
    >
      <vs-select
        color="primary"
        :class="selectOptions.selectClass"
        placeholder="Выберите кухню"
        v-model="selectedMenuId"
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
      selectOptions: {
        selectClass: "w-100 py-2 px-1",
        grid: {
          xs: 12,
          md: 6,
          lg: 6
        }
      }
    };
  },

  mounted() {
    this.$_PostSelectionOptions_getData();
  },
  computed: {
    $_PostSelectionOptions_checkFormCompletion: function() {
      if (
        _.isNumber(this.selectedCategoryId) &&
        _.isNumber(this.selectedKitchenId) &&
        _.isNumber(this.selectedDishId) &&
        _.isNumber(this.selectedMenuId)
      ) {
        this.$_PostSelectionOptions_sendData();
      }
    }
  },

  methods: {
    $_PostSelectionOptions_sendData: _.debounce(function() {
      let form = new FormData();
      form.append("selectedCategoryId", this.selectedCategoryId);
      form.append("selectedDishId", this.selectedDishId);
      form.append("selectedKitchenId", this.selectedKitchenId);
      form.append("selectedMenuId", this.selectedMenuId);

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
