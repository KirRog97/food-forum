<template>
  <el-dropdown placement="bottom-end" trigger="click" :hide-timeout="700">
    <span class="el-dropdown-link header-icon__inner">
      <el-badge type="primary" :value="12" :max="9">
        <i class="fa fa-bell header-icon" aria-hidden="true"></i>
      </el-badge>
    </span>
    <el-dropdown-menu class="header-dropdown-notification" slot="dropdown">
      <el-card shadow="always" :body-style="{ padding: '0px' }">
        <div
          slot="header"
          class="flex flex-initial justify-between items-center"
        >
          <span class="text-xl">
            Уведомления
          </span>
          <button
            class="text-xl text-secondary-700 hover:text-primary-500 px-3 py-1"
            type="button"
          >
            <i class="el-icon-s-tools"></i>
          </button>
        </div>

        <div
          class="h-48 sm:h-64 lg:h-auto overflow-y-scroll overflow-x-hidden"
          style="max-height: 320px;"
        >
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
          <header-notification-card></header-notification-card>
        </div>
      </el-card>
    </el-dropdown-menu>
  </el-dropdown>
</template>

<script>
export default {
  data() {
    return {};
  }
};
</script>
