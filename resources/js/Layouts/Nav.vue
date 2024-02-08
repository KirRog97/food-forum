<script setup>
import MobileSidebarButton from "@/Components/MobileSidebarButton.vue";
import HeaderNotificationDropdown from "@/Layouts/HeaderNotificationDropdown.vue";
import HeaderUserDropdown from "@/Layouts/HeaderUserDropdown.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
// import HeaderGlobalSearch from "@/Layouts/HeaderGlobalSearch.vue";

const header_icon = ref(
  "lg:text-2xl text-xl text-primary-600 md:text-secondary-900 hover:transition hover:text-primary-400"
);

defineProps({
  auth: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <div
    class="h-full flex flex-auto flex-nowrap justify-between items-center py-3"
  >
    <div class="w-fit h-full flex justify-start items-center py-1 px-2">
      <Link :href="route('home')">
        <span
          class="text-4xl text-primary-500 hover:text-primary-400 font-handwritten leading-none"
          v-text="'Еда'"
        ></span>
      </Link>
    </div>
    <div class="w-fit h-full justify-between items-center">
      <ul class="h-full flex flex-row flex-nowrap justify-around items-center">
        <li class="block md:hidden">
          <div class="flex justify-center items-center px-5 py-2">
            <i class="fas fa-search" :class="header_icon"></i>
          </div>
        </li>

        <template v-if="$page.props.auth.user !== null">
          <li>
            <HeaderNotificationDropdown />
          </li>
          <li>
            <HeaderUserDropdown />
          </li>
        </template>
        <template v-else>
          <li>
            <div class="flex justify-center items-center px-5 py-2">
              <Link
                :href="route('login')"
                data-toggle="tooltip"
                data-placement="bottom"
                title="Вход"
              >
                <i :class="header_icon" class="fas fa-sign-in-alt"></i>
              </Link>
            </div>
          </li>
          <li>
            <div class="flex justify-center items-center px-5 py-2">
              <Link
                :href="route('register')"
                data-toggle="tooltip"
                data-placement="bottom"
                title="Зарегистрироваться"
              >
                <i class="fas fa-address-card" :class="header_icon"></i>
              </Link>
            </div>
          </li>
        </template>

        <li class="block md:hidden">
          <MobileSidebarButton />
        </li>
      </ul>
    </div>
  </div>
</template>
