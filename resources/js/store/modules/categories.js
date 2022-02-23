export const categories = {
  state: () => ({
    all: [],
  }),
  mutations: {
    setAllCategories(state, data) {
      state.all = data;
    },
  },
  actions: {
    loadAllCategories({ commit, state }) {
      axios
        .get("/api/categories", {
          params: _.omit(state.selected, "categories"),
        })
        .then((res) => {
          commit("setAllCategories", res.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
