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
        v-model="selected.categories"
        value-key="id"
      >
        <el-option
          v-for="category in categories"
          :key="category.id"
          :label="category.name"
          :value="category"
        >
          <span class="el-select-dropdown_title">
            {{ category.name }}
          </span>
          <span class="el-select-dropdown_label">
            Категория
          </span>
        </el-option>
      </el-select>
      <el-input-number
        v-show="false"
        v-model="selected.categories.id"
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
        v-model="selected.kitchens"
        value-key="id"
      >
        <el-option
          v-for="kitchen in kitchens"
          :key="kitchen.id"
          :label="kitchen.name"
          :value="kitchen"
        >
          <span class="el-select-dropdown_title">
            {{ kitchen.name }}
          </span>
          <span class="el-select-dropdown_label">
            Кухня
          </span>
        </el-option>
      </el-select>
      <el-input-number
        v-show="false"
        v-model="selected.kitchens.id"
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
        v-model="selected.dishes"
        value-key="id"
      >
        <el-option
          v-for="dish in dishes"
          :key="dish.id"
          :label="dish.name"
          :value="dish"
        >
          <span class="el-select-dropdown_title">
            {{ dish.name }}
          </span>
          <span class="el-select-dropdown_label">
            Блюдо
          </span>
        </el-option>
      </el-select>
      <el-input-number
        v-show="false"
        v-model="selected.dishes.id"
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
        v-model="selected.menus"
        value-key="id"
      >
        <el-option
          v-for="menu in menus"
          :key="menu.id"
          :label="menu.name"
          :value="menu"
        >
          <span class="el-select-dropdown_title">
            {{ menu.name }}
          </span>
          <span class="el-select-dropdown_label">
            Меню
          </span>
        </el-option>
      </el-select>
      <el-input-number
        v-show="false"
        v-model="selected.menus.id"
        name="post_menu_id"
      ></el-input-number>
    </el-col>
  </el-row>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  data() {
    return {
      selectOptions: {
        selectClass: "w-full",
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
    this.$_PostSelectionOptions_loadData();
  },

  computed: {
    ...mapState(["categories", "dishes", "ingredients", "kitchens", "menus"]),

    selected: {
      get() {
        return this.$store.state.selected;
      },
      set(value) {
        this.$store.commit("setSelected", value);
      }
    }
  },

  watch: {
    selected: {
      handler: function() {
        this.$_PostSelectionOptions_loadData();
      },
      deep: true
    }
  },

  methods: {
    ...mapActions([
      "loadCategories",
      "loadDishes",
      "loadIngredients",
      "loadKitchens",
      "loadMenus"
    ]),

    $_PostSelectionOptions_loadData: function() {
      this.loadCategories();
      this.loadDishes();
      this.loadIngredients();
      this.loadKitchens();
      this.loadMenus();
    }
  }
};
</script>
