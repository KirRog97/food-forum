<template>
  <el-row
    class="flex-wrap"
    type="flex"
    justify="betwwen"
    align="middle"
    :gutter="12"
  >
    <el-col
      :xs="selectOptions.grid.xs"
      :sm="selectOptions.grid.sm"
      :md="selectOptions.grid.md"
      :lg="selectOptions.grid.lg"
      :xl="selectOptions.grid.xl"
    >
      <el-select
        placeholder="Выберите категорию"
        :class="selectOptions.selectClass"
        v-model="selectedCategory"
        value-key="id"
      >
        <el-option
          v-for="item in categoryArray"
          :key="item.id"
          :label="item.name"
          :value="item"
        >
          <span>{{ item.name }}</span>
          <span style="float: right; color: #8492a6; font-size: 13px">
            Категория
          </span>
        </el-option>
      </el-select>
      <el-input-number
        v-show="false"
        v-model="selectedCategory.id"
        name="post_category_id"
      ></el-input-number>
    </el-col>
    <el-col
      :xs="selectOptions.grid.xs"
      :sm="selectOptions.grid.sm"
      :md="selectOptions.grid.md"
      :lg="selectOptions.grid.lg"
      :xl="selectOptions.grid.xl"
    >
      <el-select
        :class="selectOptions.selectClass"
        placeholder="Выберите кухню"
        v-model="selectedKitchen"
        value-key="id"
      >
        <el-option
          v-for="item in kitchenArray"
          :key="item.id"
          :label="item.name"
          :value="item"
        >
          <span>{{ item.name }}</span>
          <span style="float: right; color: #8492a6; font-size: 13px">
            Кухня
          </span>
        </el-option>
      </el-select>
      <el-input-number
        v-show="false"
        v-model="selectedKitchen.id"
        name="post_kitchen_id"
      ></el-input-number>
    </el-col>
    <el-col
      :xs="selectOptions.grid.xs"
      :sm="selectOptions.grid.sm"
      :md="selectOptions.grid.md"
      :lg="selectOptions.grid.lg"
      :xl="selectOptions.grid.xl"
    >
      <el-select
        :class="selectOptions.selectClass"
        placeholder="Выберите блюдо"
        v-model="selectedDish"
        value-key="id"
      >
        <el-option
          v-for="item in dishArray"
          :key="item.id"
          :label="item.name"
          :value="item"
        >
          <span>{{ item.name }}</span>
          <span style="float: right; color: #8492a6; font-size: 13px">
            Блюдо
          </span>
        </el-option>
      </el-select>
      <el-input-number
        v-show="false"
        v-model="selectedDish.id"
        name="post_dish_id"
      ></el-input-number>
    </el-col>
    <el-col
      :xs="selectOptions.grid.xs"
      :sm="selectOptions.grid.sm"
      :md="selectOptions.grid.md"
      :lg="selectOptions.grid.lg"
      :xl="selectOptions.grid.xl"
    >
      <el-select
        :class="selectOptions.selectClass"
        placeholder="Выберите меню"
        v-model="selectedMenu"
        value-key="id"
      >
        <el-option
          v-for="item in menuArray"
          :key="item.id"
          :label="item.name"
          :value="item"
        >
          <span>{{ item.name }}</span>
          <span style="float: right; color: #8492a6; font-size: 13px">
            Меню
          </span>
        </el-option>
      </el-select>
      <el-input-number
        v-show="false"
        v-model="selectedMenu.id"
        name="post_menu_id"
      ></el-input-number>
    </el-col>
  </el-row>
</template>

<script>
export default {
  data() {
    return {
      categoryArray: [],
      kitchenArray: [],
      dishArray: [],
      menuArray: [],
      selectedCategory: {},
      selectedDish: {},
      selectedKitchen: {},
      selectedMenu: {},
      selectOptions: {
        selectClass: "w-100 py-1",
        grid: {
          xs: 24,
          sm: 12,
          md: 12,
          lg: 12,
          xl: 12
        }
      }
    };
  },

  mounted() {
    this.$_PostSelectionOptions_getData();
  },

  methods: {
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
