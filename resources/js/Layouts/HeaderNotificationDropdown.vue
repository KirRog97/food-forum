<script setup>
// import { useMessage } from "naive-ui";
import { SettingsSharp as SettingsIcon } from "@vicons/ionicons5";
import { NEmpty, NIcon, NScrollbar, NSkeleton } from "naive-ui";
import { defineAsyncComponent, h, ref } from "vue";

// const message = useMessage();

const header_icon = ref(
  "lg:text-2xl text-xl text-primary-600 md:text-secondary-900 hover:transition hover:text-primary-400"
);

const notifications = ref(
  Array(12).fill({
    id: Math.round(Math.random() * 100),
    channel_logo: "/images/category_healthy.jpg",
    post_picture: "/images/recipes/пельмени.jpg",
    text_body: `На канале "Очень длинное имя" появилось новое видео:
    "Второй день: Лорем Ипсум Доллар". Советуем его посмотреть.`,
  })
);

// https://www.naiveui.com/en-US/os-theme/components/dropdown#render.vue
const HeaderNotificationMarkup = ref([
  {
    key: "header",
    type: "render",
    render: renderCustomHeader,
  },
  {
    key: "header-divider",
    type: "divider",
  },
  {
    key: "header",
    type: "render",
    render: renderCustomContentBody,
  },
]);

function renderCustomHeader() {
  return h(
    "div",
    {
      class:
        "h-[40px] flex flex-initial justify-between items-center px-3 py-2",
    },
    [
      h("span", { class: "text-xl" }, ["Notifications"]),
      h(
        "button",
        {
          type: "button",
          class: "text-xl text-secondary-700 hover:text-primary-500 px-3 py-1",
        },
        [
          h(
            "a",
            {
              href: "#",
              // href: route(user.profile.notification),
            },
            [
              h(
                NIcon,
                {
                  size: 18,
                  color: "#000000",
                  component: SettingsIcon,
                },
                []
              ),
            ]
          ),
        ]
      ),
    ]
  );
}

function renderCustomContentBody() {
  return h(
    NScrollbar,
    {
      class: "max-h-[348px]",
    },
    [
      // https://vuejs.org/guide/extras/render-function.html#render-function-recipes
      h("ul", {}, [
        notifications.value.map((itemData) => {
          return h("li", { key: itemData.id }, [renderNotification(itemData)]);
        }),
      ]),
    ]
  );
}

function renderNotification(childProps) {
  const HeaderNotificationDropdownCard = defineAsyncComponent({
    loader: () => import("@/Layouts/HeaderNotificationDropdownCard.vue"),
    loadingComponent: () =>
      h(NSkeleton, {
        text: true,
        width: "200px",
        height: "50px",
        size: "medium",
        animated: true,
        repeat: 20,
      }),
    delay: 1500,
    errorComponent: () => h(NEmpty, null),
    // The error component will be displayed if a timeout is
    // provided and exceeded. Default: Infinity.
    timeout: 5000,
  });

  return h(HeaderNotificationDropdownCard, { notification: childProps });
}

function handleSelect(key) {
  // message.info(String(key));
}
</script>

<template>
  <n-dropdown
    class="w-[455px] h-[400px] p-1"
    :options="HeaderNotificationMarkup"
    placement="bottom-end"
    trigger="click"
  >
    <!-- maybe withou this Div -->
    <span class="flex justify-center items-center px-5 py-2">
      <!-- #9d7335 = primary-700 -->
      <n-badge :value="1" :max="9" color="#9d7335">
        <i :class="header_icon" class="fa fa-bell" aria-hidden="true"></i>
      </n-badge>
    </span>
  </n-dropdown>
</template>
