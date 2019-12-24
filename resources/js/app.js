/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css' //Vuesax styles
Vue.use(Vuesax, {
  theme: {
    colors: {
      primary: "#b5904e",
      secondary: "#5b5b5b",
      success: "#28a745",
      danger: "#dc3545",
      warning: "#ffc107",
      dark: "#343a40"
    }
  }
});


// https:www.npmjs.com/package/vue-snotify
import Snotify, {
    SnotifyPosition
} from 'vue-snotify'
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
})

Vue.toArrayOfObjects = function (data) {
    let resultArray = [];
    _.each(data, function (value, key) {
        resultArray.push({
            id: key,
            name: value
        });
    });
    return resultArray;
}

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('selection', require('./components/layouts/Selection.vue').default);

Vue.component('recipe-selection', require('./components/RecipeSelection.vue').default);
Vue.component('recipe-selection-add-ing', require('./components/RecipeSelectionAddIng.vue').default);
Vue.component('recipe-selection-exlucde-ing', require('./components/RecipeSelectionExcludeIng.vue').default);

Vue.component('ingredient-selection', require('./components/IngredientSelection.vue').default);
Vue.component('picture-downloading', require('./components/PictureDownloading.vue').default);
Vue.component('post-selection-options', require('./components/PostSelectionOptions.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

require('./custom');
