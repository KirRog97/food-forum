export const kitchens = {
  state: () => ({
    all: [],
  }),
  mutations: {
    setAllKitchens(state, data) {
      state.all = data;
    },
  },
  actions: {
    loadAllKitchens({ commit, state }) {
      axios
        .get("/api/kitchens", {
          params: _.omit(state.selected, "kitchens"),
        })
        .then((res) => {
          commit("setAllKitchens", res.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
