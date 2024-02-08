<script setup>
import { reactive } from "vue";

const themeOverrides = reactive({
  // 'Common' take color before :root was created or ???
  // primaryColor: "#b5904e" = "var(--color-primary500)",
  // primaryColorHover: "#494949" = "var(--color-secondary700)",
  common: {
    primaryColor: "#b5904e",
    primaryColorHover: "#c0a169",
    primaryColorPressed: "#9d7335",
    primaryColorSuppl: "#c0a169",
    scrollbarColorHover: "#494949",
  },
  Button: {
    textColor: "#b5904e",
    textColorPrimary: "#b5904e",
  },
  Checkbox: {
    textColor: "#b5904e",
    textColorPrimary: "#b5904e",
  },
});
</script>

<template>
  <n-config-provider :theme-overrides="themeOverrides">
    <div class="flex flex-auto flex-nowrap min-h-screen mx-auto">
      <div class="hidden sm:flex sm:w-4/12 md:w-8/12 lg:w-7/12">
        <img
          class="w-full h-full object-center object-cover overflow-hidden"
          src="/images/login_background.jpg"
          alt=""
        />
      </div>
      <div
        class="w-full sm:w-8/12 lg:w-5/12 flex flex-wrap content-center justify-center bg-secondary-800 border-0 sm:border-l-2 border-primary-500 px-12 py-10 sm:px-5 sm:py-2"
      >
        <div class="w-full flex flex-auto justify-center mb-8">
          <a
            class="text-6xl text-primary-500 hover:text-primary-400 text-center font-handwritten"
            href="/home"
            data-toggle="tooltip"
            data-placement="bottom"
            title="На главную"
          >
            Еда
          </a>
        </div>

        <slot></slot>
      </div>
    </div>
  </n-config-provider>
</template>
