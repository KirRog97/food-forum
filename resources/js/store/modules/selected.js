export const selected = {
  state: () => ({
    selected: {
      categories: [],
      dishes: [],
      ingredients: [],
      kitchens: [],
      menus: [],
    },
  }),
  mutations: {
    setSelected(state, data) {
      state.selected = data;
    },
  },
};
