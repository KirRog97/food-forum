/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

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

Vue.toArrayOfObjects = function(data) {
  let resultArray = [];
  _.each(data, function(value, key) {
    resultArray.push({
      id: key,
      name: value
    });
  });
  return resultArray;
};

require("./components/index");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: "#app",
  store
});

require("./custom");
