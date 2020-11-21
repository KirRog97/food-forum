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
      </el-col>
    </el-row>

    <el-collapse-transition>
      <!--
            Don't set v-if atribute instead of v-show.
            All existing child visual stuff will be removed
            after 'isIngVisible' change
        -->
      <el-row
        class="w-full flex flex-wrap justify-between items-start bg-secondary-100 rounded-lg mb-3 sm:mb-2 px-2 py-3"
        v-show="isIngVisible"
      >
        <el-col class="flex flex-wrap px-2" :xs="24" :md="12">
          <post-selection-search
            :ingredients="ingredients"
            :interfaceData="includedIngredients"
            @interface="includedIngredients = $event"
            :isAdding="true"
          />
        </el-col>
        <el-col class="flex flex-wrap px-2" :xs="24" :md="12">
          <post-selection-search
            :ingredients="ingredients"
            :interfaceData="excludedIngredients"
            @interface="excludedIngredients = $event"
            :isAdding="false"
          />
        </el-col>
        <el-col class="flex justify-center mt-8 sm:mt-4" :span="24">
          <button
            type="button"
            class="bg-transparent hover:bg-secondary-900 text-center text-secondary-300 hover:text-white transition-500ms rounded-lg p-2"
            @click="$_PostSelection_resetIngredients"
          >
            <i class="fas fa-undo fa-lg mr-1"></i>
            <span class="text-base">Сбросить</span>
          </button>
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
import { mapState, mapActions } from "vuex";

export default {
  data() {
    return {
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
      includedIngredients: [],
      excludedIngredients: [],
      isIngVisible: false
    };
  },

  mounted() {
    this.$_PostSelection_loadData();
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
        this.$_PostSelection_loadData();
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

    $_PostSelection_loadData: function() {
      this.loadCategories();
      this.loadDishes();
      this.loadIngredients();
      this.loadKitchens();
      this.loadMenus();
    },

    $_PostSelection_resetIngredients: function() {
      this.includedIngredients = [];
      this.excludedIngredients = [];

      return this.$snotify.success(
        "Списки ингредиентов очищены",
        "Выбор ингредиентов",
        {
          showProgressBar: false,
          timeout: 2300
        }
      );
    }
  }
};
</script>
