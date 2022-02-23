export const menus = {
  state: () => ({
    all: [],
  }),
  mutations: {
    setAllMenus(state, data) {
      state.all = data;
    },
  },
  actions: {
    loadAllMenus({ commit, state }) {
      axios
        .get("/api/menus", { params: _.omit(state.selected, "menus") })
        .then((res) => {
          commit("setAllMenus", res.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
