import Vue from "vue";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component("selection", require("./layouts/Selection.vue").default);
Vue.component("backtop", require("./layouts/Backtop.vue").default);
Vue.component(
  "mobile-sidebar-button",
  require("./layouts/MobileSidebarButton.vue").default
);
Vue.component("sidebar", require("./layouts/SideBar.vue").default);
Vue.component("sidebar-drawer", require("./layouts/SidebarDrawer.vue").default);
Vue.component("sidebar-menu", require("./layouts/SidebarMenu.vue").default);

Vue.component(
  "header-global-search",
  require("./layouts/HeaderGlobalSearch.vue").default
);

Vue.component(
  "header-notification-dropdown",
  require("./layouts/HeaderNotificationDropdown.vue").default
);

Vue.component(
  "header-notification-card",
  require("./layouts/HeaderNotificationCard.vue").default
);

Vue.component(
  "header-user-dropdown",
  require("./layouts/HeaderUserDropdown.vue").default
);

Vue.component("post-selection", require("./PostSelection.vue").default);

Vue.component(
  "post-selection-search",
  require("./PostSelectionSearch.vue").default
);

Vue.component(
  "ingredient-selection",
  require("./IngredientSelection.vue").default
);

Vue.component(
  "picture-upload-single",
  require("./PictureUploadSingle.vue").default
);

Vue.component(
  "post-selection-options",
  require("./PostSelectionOptions.vue").default
);

Vue.component("user-index-card", require("./UserIndexCard.vue").default);
Vue.component("post-index-card", require("./PostIndexCard.vue").default);
Vue.component("post-show-card", require("./PostShowCard.vue").default);
Vue.component("like-button", require("./layouts/LikeButton.vue").default);

Vue.component("news-board", require("./NewsBoard.vue").default);
Vue.component("news-board-item", require("./NewsBoardItem.vue").default);
Vue.component(
  "news-board-item-large",
  require("./NewsBoardItemLarge.vue").default
);

Vue.component("post-trands", require("./PostTrands.vue").default);
