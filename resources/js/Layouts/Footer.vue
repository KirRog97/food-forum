<script setup>
import { ref } from "vue";

const footerOptions = ref({
  localLinks: [
    { title: "Главная", url: "/home" },
    { title: "Рецепты", url: "/posts" },
    { title: "Идеи", url: "/" },
    { title: "Авторы", url: "/" },
    { title: "Журналы", url: "/" },
    { title: "Реклама", url: "/" },
    { title: "FAQ", url: "/" },
  ],
  socialMediaLinks: [
    { iconClasses: "fab fa-vk", url: "/" },
    { iconClasses: "fab fa-facebook-f", url: "/" },
    { iconClasses: "fab fa-instagram", url: "/" },
    { iconClasses: "fab fa-twitter ", url: "/" },
  ],
});
</script>
<template>
  <div
    class="flex flex-auto flex-wrap justify-center bg-secondary-900 py-4 md:py-4 mx-auto mt-4"
  >
    <div
      class="w-full md:w-9/12 flex flex-wrap justify-center md:justify-start items-center mb-3 md:mb-0"
    >
      <a
        v-for="(loaclLink, index) in footerOptions.localLinks"
        :key="index"
        class="w-3/12 text-lg text-white hover:text-primary-600 hover:text-shadow uppercase tracking-wide transition mx-2 md:w-auto"
        :href="loaclLink.url"
      >
        {{ loaclLink.title }}
      </a>
    </div>

    <div
      class="w-full md:w-3/12 flex flex-nowrap justify-evenly items-center md:justify-around p-2"
    >
      <div
        class="text-white hover:text-primary-600 transition transform hover:scale-150 mx-2"
        v-for="(socialMediaLink, index) in footerOptions.socialMediaLinks"
        :key="index"
      >
        <a :href="socialMediaLink.url">
          <i :class="`${socialMediaLink.iconClasses} fa-lg`"></i>
        </a>
      </div>
    </div>
  </div>
</template>
