require("./bootstrap");

window.Vue = require("vue");

import { store } from "./store";

window.ElementUI = require("element-ui");
import locale from "element-ui/lib/locale/lang/ru-RU";

Vue.use(ElementUI, { locale });

// https:www.npmjs.com/package/vue-snotify
import Snotify, { SnotifyPosition } from "vue-snotify";
Vue.use(Snotify, {
  toast: {
    position: SnotifyPosition.leftBottom,
    timeout: 5000,
    animation: {
      time: 800
    },
    titleMaxLength: 32,
    bodyMaxLength: 240,
    placeholder: "Введите текст..."
  }
});

require("./components/index");

const app = new Vue({
  el: "#app",
  store
});
