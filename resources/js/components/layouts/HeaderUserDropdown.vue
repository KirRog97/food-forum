<template>
  <el-dropdown placement="bottom-start" trigger="click" @command="redirect">
    <span class="el-dropdown-link header-icon__inner">
      <el-badge type="primary" is-dot="true">
        <i class="fa fa-user-circle header-icon" aria-hidden="true"></i>
      </el-badge>
    </span>
    <el-dropdown-menu class="header-dropdown-user" slot="dropdown">
      <el-card shadow="always" :body-style="{ padding: '0px' }">
        <div
          slot="header"
          class="flex flex-initial justify-between items-center"
        >
          <div class="w-auto mr-2">
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
            <span class="header-user__profile-username">
              {{ user.username }}
            </span>
            <span class="header-user__profile-email">
              {{ user.email }}
            </span>
          </div>
        </div>
        <el-dropdown-item tabindex="1" :command="`/users/${user.id}`">
          <span class="header-user__menu-title">
            Мой профиль
          </span>
        </el-dropdown-item>
        <el-dropdown-item tabindex="2" :command="`/users/${user.id}/posts`">
          <span class="header-user__menu-title">
            Мои рецепты
          </span>
        </el-dropdown-item>
        <el-dropdown-item tabindex="3" :command="`/users/${user.id}/favorites`">
          <span class="header-user__menu-title">Понравилось</span>
        </el-dropdown-item>
        <el-dropdown-item tabindex="4" :command="`/users/${user.id}/favorites`">
          <span class="header-user__menu-title">
            Закладки
          </span>
        </el-dropdown-item>
        <li
          tabindex="5"
          class="el-dropdown-menu__item el-dropdown-menu__item--divided"
          @click="logout"
        >
          <span class="header-user__menu-title">
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
