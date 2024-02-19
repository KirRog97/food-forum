<script setup>
import { LogoVk, Send, Mail, Share } from "@vicons/ionicons5";
</script>
<template>
  <div
    class="flex flex-row flex-wrap justify-center align-items-center space-x-2"
  >
    <n-tooltip trigger="hover">
      <template #trigger>
        <n-button type="primary" ghost bordered color="#2787f5">
          <template #icon>
            <n-icon>
              <Logo-Vk />
            </n-icon>
          </template>
          100
        </n-button>
      </template>
      Поделиться в VK
    </n-tooltip>

    <n-tooltip trigger="hover">
      <template #trigger>
        <n-button type="primary" ghost bordered color="#2787f5">
          <template #icon>
            <n-icon>
              <Send />
            </n-icon>
          </template>
          12
        </n-button>
      </template>
      Поделиться в Telegram
    </n-tooltip>

    <n-tooltip trigger="hover">
      <template #trigger>
        <n-button type="primary" ghost bordered color="#995103">
          <template #icon>
            <n-icon>
              <Mail />
            </n-icon>
          </template>
        </n-button>
      </template>
      Выслать на email
    </n-tooltip>

    <n-tooltip trigger="hover">
      <template #trigger>
        <n-button type="primary" ghost bordered color="#029a95">
          <template #icon>
            <n-icon>
              <Share />
            </n-icon>
          </template>
        </n-button>
      </template>
      Скопировать ссылку на рецепт
    </n-tooltip>
  </div>
</template>
