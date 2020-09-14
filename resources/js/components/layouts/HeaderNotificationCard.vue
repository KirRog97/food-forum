<template>
  <el-row
    class="flex flex-auto justify-between content-start hover:bg-gray-200 px-4 py-2"
  >
    <el-col :span="4" :md="3" class="mr-2">
      <el-avatar
        shape="circle"
        fit="cover"
        :size="40"
        src="/images/category_healthy.jpg"
        alt="User picture"
      >
        <img src="/images/icons/user_avacado.svg" />
      </el-avatar>
    </el-col>
    <el-col :span="18" :md="12">
      <p class="text-left text-xs sm:text-sm lg:text-base">
        На канале "Екатерина Шульман" появилось новое видео: "Второй день:
        разговор с Тимуром Олевским". Советуем его посмотреть.
      </p>
    </el-col>
    <el-col :span="7" class="hidden md:block mx-2">
      <img
        class="object-cover h-16 w-full rounded-sm"
        src="/images/recipes/пельмени.jpg"
        alt
      />
    </el-col>
    <el-col :span="2">
      <el-dropdown placement="top" trigger="click" size="mini">
        <button class="text-sm text-secondary-500 hover:text-primary-400 px-2">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <el-dropdown-menu class="header-notification__menu" slot="dropdown">
          <el-dropdown-item>
            <i class="header-notification__menu-icon el-icon-view"></i>
            <span class="header-notification__menu-title">
              Скрыть уведомление
            </span>
          </el-dropdown-item>
          <el-dropdown-item>
            <i class="header-notification__menu-icon el-icon-user-solid"></i>
            <span class="header-notification__menu-title">
              Больше не показывать уведомления от "Екатерина Шульман"
            </span>
          </el-dropdown-item>
        </el-dropdown-menu>
      </el-dropdown>
    </el-col>
  </el-row>
</template>

<script>
export default {};
</script>
