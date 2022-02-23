export const ingredients = {
  state: () => ({
    all: [],
  }),
  mutations: {
    setAllIngredients(state, data) {
      state.all = data;
    },
  },
  actions: {
    loadAllIngredients({ commit, state }) {
      axios
        .get("/api/ingredients", {
          params: _.omit(state.selected, "ingredients"),
        })
        .then((res) => {
          commit("setAllIngredients", res.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
