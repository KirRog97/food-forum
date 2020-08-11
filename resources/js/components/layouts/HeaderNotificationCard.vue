<template>
  <el-row
    class="flex flex-auto justify-between content-start hover:bg-gray-200 px-4 py-2"
  >
    <el-col :span="3" class="mr-2">
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
    <el-col :span="13">
      <p class="text-left text-xs sm:text-sm lg:text-base">
        На канале "Екатерина Шульман" появилось новое видео: "Второй день:
        разговор с Тимуром Олевским". Советуем его посмотреть.
      </p>
    </el-col>
    <el-col :span="7" class="mx-2">
      <img
        class="object-cover h-16 w-full rounded-sm"
        src="/images/recipes/пельмени.jpg"
        alt
      />
    </el-col>
    <el-col :span="1">
      <el-dropdown trigger="click" size="mini">
        <button class="text-sm text-secondary-500 hover:text-primary-400 px-2">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <el-dropdown-menu slot="dropdown">
          <el-dropdown-item>
            <i class="el-icon-view text-sm lg:text-base"></i>
            <span class="text-left text-xs sm:text-md lg:text-base">
              Скрыть уведомление
            </span>
          </el-dropdown-item>
          <el-dropdown-item>
            <i class="el-icon-user-solid text-sm lg:text-base"></i>
            <span class="text-left text-xs sm:text-md lg:text-base">
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
