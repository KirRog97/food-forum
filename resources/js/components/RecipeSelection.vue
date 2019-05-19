<template>
  <div>
    <form action="recipefilter.someMethod" method="POST">
    <div class="container-fluid">
      <div class="row justify-content-between mb-2">
        <div class="col-auto btn-group py-1 px-0">
          <div class="form-group w-25 shadow-sm p-0 m-1">
            <select class="form-control custom-select custom-select-sm">
              <option disabled selected>Выберите категорию</option>
              <option
                v-for="(category, index) in urldata['category_list']"
                :key="index"
                :value="category"
              >{{category}}</option>
            </select>
          </div>
          <div class="form-group w-25 shadow-sm p-0 m-1">
            <select class="form-control custom-select custom-select-sm">
              <option disabled selected>Выберите кухню</option>
              <option
                v-for="(kitchen, index) in urldata['kitchen_list']"
                :key="index"
                :value="kitchen"
              >{{kitchen}}</option>
            </select>
          </div>
          <div class="form-group w-25 shadow-sm p-0 m-1">
            <select class="form-control custom-select custom-select-sm">
              <option disabled selected>Выберите блюдо</option>
              <option
                v-for="(dish, index) in urldata['dishes_list']"
                :key="index"
                :value="dish"
              >{{ dish }}</option>
            </select>
          </div>
          <div class="form-group w-25 shadow-sm p-0 m-1">
            <select class="form-control custom-select custom-select-sm">
              <option disabled selected>Выберите меню</option>
              <option
                v-for="(menu, index) in urldata['menu_list']"
                :key="index"
                :value="menu"
              >{{ menu }}</option>
            </select>
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

    <transition
      name="custom-classes-transition"
      type="animation"
      enter-active-class="animated fadeIn slow"
      leave-active-class="animated fadeOut fast"
    >
      <div class="container-fluid bg-light rounded p-4" v-if="show">
        <div class="row mb-3">
          <recipe-selection-add-ing :ingredient_list="urldata['ingredient_list']"/>
          <recipe-selection-exlucde-ing :ingredient_list="urldata['ingredient_list']"/>
        </div>
        <button type="button" class="btn btn-outline-secondary mr-1">Показать</button>
        <button type="reset" class="btn btn-outline-light text-muted">
          <i class="fas fa-redo mr-1"></i>
          Очистить
        </button>
      </div>
    </transition>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: false,
      urldata: []
    };
  },

  mounted() {
    this.$_RecipeSelection_getData();
  },

  methods: {
    $_RecipeSelection_getData: function() {
      axios
        .get("/recipes/recipe-filter")
        .then(res => {
          this.urldata = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>
