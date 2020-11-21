import Vue from "vue";
import Vuex from "vuex";
import "es6-promise/auto";

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    categories: [],
    dishes: [],
    ingredients: [],
    kitchens: [],
    menus: [],
    selected: {
      categories: [],
      dishes: [],
      ingredients: [],
      kitchens: [],
      menus: []
    },
    isDrawerOpen: false
  },

  getters: {
    DrawerOpenStatus: state => {
      return state.isDrawerOpen;
    }
  },

  mutations: {
    setCategories(state, data) {
      state.categories = data;
    },
    setDishes(state, data) {
      state.dishes = data;
    },
    setIngredients(state, data) {
      state.ingredients = data;
    },
    setKitchens(state, data) {
      state.kitchens = data;
    },
    setMenus(state, data) {
      state.menus = data;
    },

    toggleOnDrawer(state) {
      state.isDrawerOpen = true;
    },
    toggleOffDrawer(state) {
      state.isDrawerOpen = false;
    }
  },

  actions: {
    loadCategories({ commit, state }) {
      axios
        .get("/api/categories", {
          params: _.omit(state.selected, "categories")
        })
        .then(res => {
          commit("setCategories", res.data);
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    loadDishes({ commit, state }) {
      axios
        .get("/api/dishes", { params: _.omit(state.selected, "dishes") })
        .then(res => {
          commit("setDishes", res.data);
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    loadIngredients({ commit, state }) {
      axios
        .get("/api/ingredients", {
          params: _.omit(state.selected, "ingredients")
        })
        .then(res => {
          commit("setIngredients", res.data);
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    loadKitchens({ commit, state }) {
      axios
        .get("/api/kitchens", {
          params: _.omit(state.selected, "kitchens")
        })
        .then(res => {
          commit("setKitchens", res.data);
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    loadMenus({ commit, state }) {
      axios
        .get("/api/menus", { params: _.omit(state.selected, "menus") })
        .then(res => {
          commit("setMenus", res.data);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
});
