export const dishes = {
  state: () => ({
    all: [],
  }),
  mutations: {
    setAllDishes(state, data) {
      state.all = data;
    },
  },
  actions: {
    loadAllDishes({ commit, state }) {
      axios
        .get("/api/dishes", { params: _.omit(state.selected, "dishes") })
        .then((res) => {
          commit("setAllDishes", res.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
