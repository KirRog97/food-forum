require("./bootstrap");

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";

import "../sass/element-ui/element-variables.scss";
import ElementPlus from "element-plus";
import ElementPlusRussianLocale from "element-plus/lib/locale/lang/ru";

import { store } from "./store/index.js";

const appName =
  window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => require(`./Pages/${name}.vue`),
  setup({ el, app, props, plugin }) {
    return createApp({ render: () => h(app, props) })
      .use(ElementPlus, {
        locale: ElementPlusRussianLocale,
      })
      .use(store)
      .use(plugin)
      .mixin({ methods: { route } })
      .mount(el);
  },
});

InertiaProgress.init({ color: "#4B5563", showSpinner: true });
