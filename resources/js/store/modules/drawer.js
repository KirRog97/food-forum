export const drawer = {
  state: () => ({
    isDrawerOpen: false,
  }),
  getters: {
    drawerOpenStatus: (state) => {
      return state.isDrawerOpen;
    },
  },
  mutations: {
    switchToggleDrawer(state) {
      state.isDrawerOpen = !state.isDrawerOpen;
    },
    toggleOnDrawer(state) {
      state.isDrawerOpen = true;
    },
    toggleOffDrawer(state) {
      state.isDrawerOpen = false;
    },
  },
};
