<template>
  <div class="container-fluid p-0">
    <el-row
      class="flex-wrap"
      type="flex"
      justify="betwwen"
      align="middle"
      :gutter="12"
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
          </el-option>
        </el-select>
      </el-col>
    </el-row>
    <el-row
      class="bg-light rounded my-2 p-2"
      justify="between"
      v-if="isIngVisible"
    >
      <el-col class="d-flex flex-wrap px-2 py-1" :xs="24" :md="12">
        <post-selection-search
          :ingredientArray="ingredientArray"
          :isAdding="true"
        />
      </el-col>
      <el-col class="d-flex flex-wrap px-2 py-1" :xs="24" :md="12">
        <post-selection-search
          :ingredientArray="ingredientArray"
          :isAdding="false"
        />
      </el-col>
      <el-col :span="24">
        <el-button class="w-100" type="primary">
          Очистить
        </el-button>
      </el-col>
    </el-row>

    <el-row>
      <el-col class="px-1 py-2" :span="12">
        <el-button
          class="w-100"
          type="primary"
          @click="isIngVisible = !isIngVisible"
        >
          Ингредиенты
        </el-button>
      </el-col>
      <el-col class="px-1 py-2" :span="12">
        <el-button class="w-100" type="primary">
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
        selectClass: "w-100 py-1",
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
