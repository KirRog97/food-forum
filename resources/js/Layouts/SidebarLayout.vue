<script setup>
import {
  AccessibilityOutline as AccessibilityIcon,
  AlbumsOutline as AlbumsIcon,
  BookOutline as BookIcon,
  CartOutline as CartIcon,
  HomeOutline as HomeIcon,
  PersonOutline as PersonIcon,
  WineOutline as WineIcon,
} from "@vicons/ionicons5";
import { NIcon } from "naive-ui";
import { h, reactive, ref } from "vue";

const themeOverrides = ref({
  // 'Common' take color before :root was created or ???
  // primaryColor: "#b5904e" = "var(--color-primary-500)",
  // primaryColorHover: "#535353" = "var(--color-secondary-600)",
  Menu: {
    // itemColorActiveHover: "rgba(255, 255, 255, 0.1)",
    // itemTextColorActiveHover: "#FFFFFFFF",
    itemColorActive: "var(--color-primary-400)",
    itemColorActiveCollapsed: "rgba(246, 246, 246, 0.1)",
    itemColorHover: "var(--color-primary-700)",
    itemIconColor: "var(--color-primary-500)",
    itemIconColorCollapsed: "var(--color-primary-500)",
    itemIconColorHover: "var(--color-secondary-700)",
    itemTextColor: "var(--color-primary-500)",
    itemTextColorActive: "var(--color-primary-700)",
    itemTextColorChildActive: "var(--color-secondary-700)",
  },
});

const menuOptions = reactive([
  {
    label: () =>
      h(
        "a",
        {
          href: route("home"),
          rel: "noopenner noreferrer",
        },
        { default: () => "Home" }
      ),
    key: "go-back-home",
    params: { class: "flex justify-center items-center" },
    icon: renderIcon(HomeIcon),
  },
  {
    key: "divider-1",
    type: "divider",
    props: {
      style: {},
    },
  },
  {
    label: () =>
      h(
        "a",
        {
          href: route("recipes.index"),
          rel: "noopenner noreferrer",
        },
        "Посты"
      ),
    key: "Index Recipe",
    icon: renderIcon(BookIcon),
  },
  {
    label: () =>
      h(
        "a",
        {
          href: route("ingredients.index"),
          rel: "noopenner noreferrer",
        },
        "Ингредиенты"
      ),
    key: "Index Ings",
    icon: renderIcon(CartIcon),
  },
  {
    label: () =>
      h(
        "a",
        {
          href: route("users.index"),
          rel: "noopenner noreferrer",
        },
        "Пользователи"
      ),
    key: "Index Users",
    icon: renderIcon(AccessibilityIcon),
  },
  {
    label: "Посты",
    key: "recipes-sidebar-button",
    icon: renderIcon(AlbumsIcon),
    children: [
      {
        type: "group",
        label: "Посты",
        key: "recipes-group",
        children: [
          {
            label: () =>
              h(
                "a",
                {
                  href: route("recipes.index"),
                  rel: "noopenner noreferrer",
                },
                "Все посты"
              ),
            key: "Recipes-index",
            icon: renderIcon(AlbumsIcon),
          },
          {
            label: () =>
              h(
                "a",
                {
                  href: route("recipes.create"),
                  rel: "noopenner noreferrer",
                },
                "Добавить пост"
              ),
            key: "Recipes-create",
            icon: renderIcon(PersonIcon),
          },
          {
            label: () =>
              h(
                "a",
                {
                  href: route("recipes.popular"),
                  rel: "noopenner noreferrer",
                },
                "Популярные посты"
              ),
            key: "Recipes-popular",
            icon: renderIcon(PersonIcon),
          },

          {
            label: "Sheep Man",
            key: "sheep-man9879",
            icon: renderIcon(PersonIcon),
          },
        ],
      },
      {
        label: "Beverage",
        key: "beverage",
        icon: renderIcon(WineIcon),
        children: [
          {
            label: "Whisky",
            key: "whisky",
          },
        ],
      },
      {
        label: "Food",
        key: "food",
        children: [
          {
            label: "Sandwich",
            key: "sandwich",
          },
        ],
      },
      {
        label: "The past increases. The future recedes.",
        key: "the-past-increases-the-future-recedes",
      },
    ],
  },
]);

function renderIcon(icon) {
  return () => h(NIcon, null, { default: () => h(icon) });
}
</script>

<template>
  <n-config-provider :theme-overrides="themeOverrides">
    <n-theme-editor>
      <n-menu
        class="text-primary-500"
        :collapsed-width="64"
        :collapsed-icon-size="22"
        :options="menuOptions"
      />
    </n-theme-editor>
  </n-config-provider>
</template>
