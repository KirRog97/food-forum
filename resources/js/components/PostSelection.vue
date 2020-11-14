<template>
  <div class="flex flex-auto flex-wrap mb-2 sm:mb-3">
    <!-- Selects: Category, Kitchen, Dish, Menu -->
    <el-row
      class="w-full flex flex-wrap sm:flex-no-wrap justify-between items-center mb-3 sm:mb-2 sm:space-x-2 space-y-2 sm:space-y-0"
    >
      <el-col
        :xs="postSelection.grid.xs"
        :sm="postSelection.grid.sm"
        :md="postSelection.grid.md"
        :lg="postSelection.grid.lg"
        :xl="postSelection.grid.xl"
      >
        <el-select
          :class="postSelection.selectClass"
          placeholder="Выберите категорию"
          v-model="selectedCategory"
          value-key="id"
        >
          <el-option
            v-for="item in categoryArray"
            :key="item.id"
            :label="item.name"
            :value="item"
          >
            <span class="el-select-dropdown_title">
              {{ item.name }}
            </span>
            <span class="el-select-dropdown_label">
              Категория
            </span>
          </el-option>
        </el-select>
      </el-col>
      <el-col
        :xs="postSelection.grid.xs"
        :sm="postSelection.grid.sm"
        :md="postSelection.grid.md"
        :lg="postSelection.grid.lg"
        :xl="postSelection.grid.xl"
      >
        <el-select
          :class="postSelection.selectClass"
          placeholder="Выберите категорию"
          v-model="selectedKitchen"
          value-key="id"
        >
          <el-option
            v-for="item in kitchenArray"
            :key="item.id"
            :label="item.name"
            :value="item"
          >
            <span class="el-select-dropdown_title">
              {{ item.name }}
            </span>
            <span class="el-select-dropdown_label">
              Кухня
            </span>
          </el-option>
        </el-select>
      </el-col>
      <el-col
        :xs="postSelection.grid.xs"
        :sm="postSelection.grid.sm"
        :md="postSelection.grid.md"
        :lg="postSelection.grid.lg"
        :xl="postSelection.grid.xl"
      >
        <el-select
          :class="postSelection.selectClass"
          placeholder="Выберите категорию"
          v-model="selectedDish"
          value-key="id"
        >
          <el-option
            v-for="item in dishArray"
            :key="item.id"
            :label="item.name"
            :value="item"
          >
            <span class="el-select-dropdown_title">
              {{ item.name }}
            </span>
            <span class="el-select-dropdown_label">
              Блюдо
            </span>
          </el-option>
        </el-select>
      </el-col>
      <el-col
        :xs="postSelection.grid.xs"
        :sm="postSelection.grid.sm"
        :md="postSelection.grid.md"
        :lg="postSelection.grid.lg"
        :xl="postSelection.grid.xl"
      >
        <el-select
          :class="postSelection.selectClass"
          placeholder="Выберите категорию"
          v-model="selectedMenu"
          value-key="id"
        >
          <el-option
            v-for="item in menuArray"
            :key="item.id"
            :label="item.name"
            :value="item"
          >
            <span class="el-select-dropdown_title">
              {{ item.name }}
            </span>
            <span class="el-select-dropdown_label">
              Меню
            </span>
          </el-option>
        </el-select>
      </el-col>
    </el-row>

    <el-collapse-transition>
      <el-row
        class="w-full flex flex-wrap justify-between items-center bg-secondary-100 rounded-lg mb-3 sm:mb-2 px-2 py-3"
        v-if="isIngVisible"
      >
        <el-col class="flex flex-wrap px-2" :xs="24" :md="12">
          <post-selection-search
            :ingredientArray="ingredientArray"
            :isAdding="true"
          />
        </el-col>
        <el-col class="flex flex-wrap px-2" :xs="24" :md="12">
          <post-selection-search
            :ingredientArray="ingredientArray"
            :isAdding="false"
          />
        </el-col>
        <el-col class="mt-8 sm:mt-4" :span="24">
          <el-button class="w-full" type="primary">
            Очистить
          </el-button>
        </el-col>
      </el-row>
    </el-collapse-transition>

    <el-row
      class="w-full flex flex-col sm:flex-row justify-between items-center sm:space-x-2 space-y-3 sm:space-y-0"
    >
      <el-col :xs="24" :sm="12">
        <el-button
          class="w-full"
          type="primary"
          @click="isIngVisible = !isIngVisible"
        >
          Ингредиенты
        </el-button>
      </el-col>
      <el-col :xs="24" :sm="12">
        <el-button class="w-full" type="primary">
          Подобрать
        </el-button>
      </el-col>
    </el-row>
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
      selectedCategory: {},
      selectedDish: {},
      selectedKitchen: {},
      selectedMenu: {},
      postSelection: {
        selectClass: "w-full",
        grid: {
          xs: 24,
          sm: 6,
          md: 6,
          lg: 6,
          xl: 6
        }
      },
      isIngVisible: true
    };
  },

  mounted() {
    this.$_postSelection_getData();
  },

  methods: {
    $_postSelection_getData: function() {
      axios
        .get("/post-filter")
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
