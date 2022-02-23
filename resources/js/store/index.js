import { createStore } from "vuex";
import { categories } from "./modules/categories.js";
import { dishes } from "./modules/dishes.js";
import { drawer } from "./modules/drawer.js";
import { ingredients } from "./modules/ingredients.js";
import { kitchens } from "./modules/kitchens.js";
import { menus } from "./modules/menus.js";
import { selected } from "./modules/selected.js";

export const store = createStore({
  modules: {
    categories,
    dishes,
    drawer,
    ingredients,
    kitchens,
    menus,
    selected,
  },
});
