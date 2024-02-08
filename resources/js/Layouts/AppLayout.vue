<script setup>
// import { useMessage } from "naive-ui";
import BackTop from "@/Components/Backtop.vue";
import Footer from "@/Layouts/Footer.vue";
import Nav from "@/Layouts/Nav.vue";
import SidebarLayout from "@/Layouts/SidebarLayout.vue";
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
});

// Inertia.on('start', () => NProgress.start())
// Inertia.on('finish', () => NProgress.done())
</script>

<template>
  <n-config-provider :theme-overrides="themeOverrides">
    <n-layout style="height: 100vh" class="flex">
      <n-layout-header
        id="header"
        position="absolute"
        style="height: 56px"
        class="bg-white py-2 px-4 shadow-2xl"
        bordered
      >
        <Nav />
      </n-layout-header>

      <n-layout
        id="content_layout"
        position="absolute"
        style="top: 56px"
        has-sider
        class="bg-white"
      >
        <n-layout-sider
          class="bg-inherit border-r border-primary-700"
          show-trigger
          collapse-mode="width"
          :collapsed-width="64"
          :width="240"
          :native-scrollbar="false"
        >
          <SidebarLayout />
        </n-layout-sider>

        <n-layout-content :native-scrollbar="false" class="h-full bg-white">
          <BackTop />

          <n-message-provider>
            <content />
          </n-message-provider>

          <div class="min-h-screen px-6 py-4">
            <slot />
          </div>

          <n-layout-footer id="footer" class="bg-secondary-900">
            <Footer />
          </n-layout-footer>
        </n-layout-content>
      </n-layout>
    </n-layout>
  </n-config-provider>
</template>
