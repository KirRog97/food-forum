<script setup>
import HeaderUserDropdownCard from "@/Layouts/HeaderUserDropdownCard.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { Layers as HomeIcon } from "@vicons/ionicons5";
import { NIcon, NMenu, NScrollbar } from "naive-ui";
import { computed, h, ref } from "vue";

const headerUserMenu = ref([
  {
    label: () =>
      h(
        "a",
        {
          href: `/users/${user.value.id}`,
        },
        { default: () => "Мой профиль" }
      ),
    key: "go-to-user-profile",
    params: { class: "flex justify-center items-center" },
    icon: () =>
      h(NIcon, null, {
        default: () => h(HomeIcon),
      }),
  },
  {
    label: () =>
      h(
        "a",
        {
          href: `/users/${user.value.id}/recipes`,
        },
        { default: () => "Мои посты" }
      ),
    key: "go-to-user-recipes",
    params: { class: "flex justify-center items-center" },
    icon: () =>
      h(NIcon, null, {
        default: () => h(HomeIcon),
      }),
  },
  {
    label: () =>
      h(
        "a",
        {
          href: `/users/${user.value.id}/favorites`,
        },
        { default: () => "Понравилось" }
      ),
    key: "go-to-user-favorites",
    params: { class: "flex justify-center items-center" },
    icon: () =>
      h(NIcon, null, {
        default: () => h(HomeIcon),
      }),
  },
  {
    label: () =>
      h(
        "a",
        {
          href: `/users/${user.value.id}`,
        },
        { default: () => "Закладки" }
      ),
    key: "go-to-user-bookmarks",
    params: { class: "flex justify-center items-center" },
    icon: () =>
      h(NIcon, null, {
        default: () => h(HomeIcon),
      }),
  },
  {
    label: () =>
      h(
        "a",
        {
          href: "#",
        },
        { default: () => "Тема: Dark" }
      ),
    key: "theme-swith",
    params: { class: "flex justify-center items-center" },
    icon: () =>
      h(NIcon, null, {
        default: () => h(HomeIcon),
      }),
    children: [
      {
        label: "Системная",
        key: "theme-system",
      },
      {
        label: "Темная",
        key: "theme-dark",
      },
      {
        label: "Светлая",
        key: "theme-light",
      },
    ],
  },
  {
    key: "divider-1",
    type: "divider",
    props: {
      style: {
        marginLeft: "32px",
      },
    },
  },

  {
    label: () =>
      h(
        Link,
        {
          href: route("logout"),
          method: "post",
        },
        { default: () => "Выход" }
      ),
    key: "logout",
    params: { class: "flex justify-center items-center" },
    icon: () =>
      h(NIcon, null, {
        default: () => h(HomeIcon),
      }),
  },
]);

const header_icon = ref(
  "lg:text-2xl text-xl text-primary-600 md:text-secondary-900 hover:transition hover:text-primary-400"
);

const user = computed(() => usePage().props.auth.user);

// https://www.naiveui.com/en-US/os-theme/components/dropdown#render.vue
const HeaderUserMarkup = ref([
  {
    key: "header",
    type: "render",
    render: () => h(HeaderUserDropdownCard, { user: user.value }),
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

function renderCustomContentBody() {
  return h(
    NScrollbar,
    {
      class: "max-h-[250px]",
    },
    [
      h(NMenu, {
        class: "text-secondary-700 hover:text-primary-500 transition",
        options: headerUserMenu.value,
      }),
    ]
  );
}
</script>

<template>
  <n-dropdown
    class="w-[225px] h-[325px] p-1"
    :options="HeaderUserMarkup"
    placement="bottom-end"
    trigger="click"
    :render-label="renderDropdownLabel"
    :render-icon="renderDropdownIcon"
  >
    <span class="flex justify-center items-center px-5 py-2">
      <!-- #9d7335 = primary-700 -->
      <n-badge :value="1" :max="9" color="#9d7335">
        <i
          class="fa fa-user-circle"
          :class="header_icon"
          aria-hidden="true"
        ></i>
      </n-badge>
    </span>
  </n-dropdown>
</template>
