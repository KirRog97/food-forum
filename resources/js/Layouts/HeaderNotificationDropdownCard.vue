<script setup>
import {
  BanSharp as BanIcon,
  NotificationsOff as HideIcon,
} from "@vicons/ionicons5";
import { NIcon } from "naive-ui";
import { h, ref } from "vue";

defineProps({
  notification: {
    type: Object,
    default: {},
  },
});

const notificatonOptions = ref([
  {
    label: "Больше не показывать уведомления от этого источника",
    key: "banNotificationSource",
    icon: () =>
      h(NIcon, null, {
        default: () => h(BanIcon),
      }),
  },
  {
    label: "Скрыть уведомление",
    key: "hideNotification",
    icon: () =>
      h(NIcon, null, {
        default: () => h(HideIcon),
      }),
  },
]);

function handleSelect(key) {
  message.info(String(key));
}
</script>

<template>
  <div
    class="w-full flex flex-auto justify-between content-start hover:bg-gray-200 px-4 py-2"
  >
    <div class="w-auto mr-2">
      <n-avatar
        :size="40"
        fallback-src="/images/icons/user_avacado.svg"
        object-fit="cover"
        round
        :src="notification.channel_logo"
      />
    </div>
    <div class="w-10/12 md:w-5/12 mr-2">
      <p
        class="text-left text-xs sm:text-sm lg:text-base"
        v-text="notification.text_body"
      ></p>
    </div>
    <div class="hidden md:block w-0 md:w-4/12 mx-2">
      <img
        class="w-full h-24 object-cover rounded-sm"
        :src="notification.recipe_picture"
        alt
      />
    </div>
    <div class="w-auto">
      <n-dropdown
        placement="top"
        trigger="click"
        :options="notificatonOptions"
        @select="handleSelect"
      >
        <n-button
          class="text-sm text-secondary-500 hover:text-primary-400 px-2"
        >
          <i class="fas fa-ellipsis-v"></i>
        </n-button>
      </n-dropdown>
    </div>
  </div>
</template>
