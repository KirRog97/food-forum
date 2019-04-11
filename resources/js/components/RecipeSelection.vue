<template>
  <div>
    <form action="PostController@???what???" method="POST">
      <div class="form-group">
        <div class="container-fluid">
          <div class="row justify-content-between mb-2">
            <div class="col-auto p-1 btn-group">
              <div class="form-group p-0 m-1">
                <select class="form-control custom-select custom-select-sm">
                  <option disabled selected>Выберите категорию</option>
                  <option
                    v-for="(category, index) in urldata['category_list']"
                    :key="index"
                    :value="category"
                  >{{category.name}}</option>
                </select>
              </div>
              <div class="p-0 m-1">
                <select class="form-control custom-select custom-select-sm">
                  <option disabled selected>Выберите кухню</option>
                  <option
                    v-for="(kitchen, index) in urldata['kitchen_list']"
                    :key="index"
                    :value="kitchen"
                  >{{kitchen.name}}</option>
                </select>
              </div>
              <div class="p-0 m-1">
                <select class="form-control custom-select custom-select-sm">
                  <option disabled selected>Выберите блюдо</option>
                  <option
                    v-for="(dish, index) in urldata['dish_list']"
                    :key="index"
                    :value="dish"
                  >{{ dish.name }}</option>
                </select>
              </div>
              <div class="p-0 m-1">
                <select class="form-control custom-select custom-select-sm">
                  <option disabled selected>Выберите меню</option>
                  <option
                    v-for="(menu, index) in urldata['menu_list']"
                    :key="index"
                    :value="menu"
                  >{{ menu.name }}</option>
                </select>
              </div>
            </div>

            <div class="col-auto p-1 mx-1">
              <button
                type="button"
                class="btn btn-outline-primary"
                @click="show = !show"
              >Ингредиенты</button>
            </div>

            <div class="col-auto p-1 m-0">
              <button class="btn btn-xm btn-primary" type="submit">Подобрать рецепт</button>
            </div>
          </div>
        </div>
      </div>

      <transition
        name="fade"
        enter-active-class="animated fadeIn"
        leave-active-class="animated fadeOut"
        :duration="{ enter: 900, leave: 600 }"
      >
        <div class="container-fluid bg-light rounded p-4" v-if="show">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for class="text-muted font-weight-lighter">Включить ингредиенты:</label>
                <input type="search" class="form-control" placeholder="+ Ингредиент">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for class="text-muted font-weight-lighter">Исключить ингредиенты:</label>
                <input type="search" class="form-control" placeholder="- Ингредиент">
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-outline-primary">Показать</button>
          <button type="reset" class="btn text-muted">
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
          console.log(res);
          this.urldata = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>
