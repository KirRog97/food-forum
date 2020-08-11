<template>
  <el-dropdown
    placement="bottom-start"
    trigger="click"
    :hide-timeout="700"
    @command="redirect"
  >
    <span class="el-dropdown-link header-icon__inner">
      <el-badge type="primary" is-dot="true">
        <i class="fa fa-user-circle header-icon" aria-hidden="true"></i>
      </el-badge>
    </span>
    <el-dropdown-menu
      style="min-width:200px; max-width: 290px; max-height: 200px; padding: 0;  z-index:2031;"
      slot="dropdown"
    >
      <el-card shadow="always" :body-style="{ padding: '0px' }">
        <div
          slot="header"
          class="flex flex-initial justify-between items-center"
        >
          <div class="w-2/12 mr-2 sm:mr-3">
            <el-avatar
              shape="circle"
              fit="cover"
              :size="40"
              src="/images/category_healthy.jpg"
              alt="User picture"
            >
              <img src="/images/icons/user_avacado.svg" />
            </el-avatar>
          </div>
          <div class="w-10/12 flex flex-col justify-start space-y-1">
            <span class="text-base sm:text-xl leading-tight text-secondary-700">
              {{ user.username }}
            </span>
            <span class="text-sm sm:text-base text-secondary-600 font-light">
              {{ user.email }}
            </span>
          </div>
        </div>
        <el-dropdown-item tabindex="1" :command="`/users/${user.id}`">
          <span class="text-base sm:text-lg">
            Мой профиль
          </span>
        </el-dropdown-item>
        <el-dropdown-item tabindex="2" :command="`/users/${user.id}/posts`">
          <span class="text-base sm:text-lg">
            Мои рецепты
          </span>
        </el-dropdown-item>
        <el-dropdown-item tabindex="3" :command="`/users/${user.id}/favorites`">
          <span class="text-base sm:text-lg">Понравилось</span>
        </el-dropdown-item>
        <el-dropdown-item tabindex="4" :command="`/users/${user.id}/favorites`">
          <span class="text-base sm:text-lg">
            Закладки
          </span>
        </el-dropdown-item>
        <li
          tabindex="5"
          class="el-dropdown-menu__item el-dropdown-menu__item--divided"
          @click="logout"
        >
          <span class="text-base sm:text-lg">
            Выход
          </span>
        </li>
      </el-card>
    </el-dropdown-menu>
  </el-dropdown>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      default: {}
    }
  },
  methods: {
    redirect(url) {
      window.location.href = url;
    },
    logout() {
      axios
        .post("/logout")
        .then(res => {
          this.redirect("/home");
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>
