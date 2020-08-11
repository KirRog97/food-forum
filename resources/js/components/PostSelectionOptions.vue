<template>
  <el-row
    class="w-full flex flex-col sm:flex-row justify-between items-center sm:space-x-2 space-y-3 sm:space-y-0"
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
          <span :style="selectOptions.selectSubSpanStyles">
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
          <span :style="selectOptions.selectSubSpanStyles">
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
          <span :style="selectOptions.selectSubSpanStyles">
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
          <span :style="selectOptions.selectSubSpanStyles">
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
        selectClass: "w-full",
        selectSubSpanStyles: "float: right; color: #8492a6; font-size: 13px;",
        grid: {
          xs: 24,
          sm: 24,
          md: 24,
          lg: 6,
          xl: 6
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
        .get("/post-filter")
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
