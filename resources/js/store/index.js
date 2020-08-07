import Vue from "vue";
import Vuex from "vuex";
import "es6-promise/auto";

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    isDrawerOpen: false,
  },
  getters: {
    DrawerOpenStatus: (state) => {
      return state.isDrawerOpen;
    },
  },
  mutations: {
    toggleOnDrawer(state) {
      state.isDrawerOpen = true;
    },
    toggleOffDrawer(state) {
      state.isDrawerOpen = false;
    },
  },
  actions: {},
});
