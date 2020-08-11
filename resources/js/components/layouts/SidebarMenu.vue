<template>
  <el-menu
    default-active="3000"
    class="sidebar"
    background-color="var(--color-secondary600)"
    active-text-color="var(--color-primary500)"
    @open="handleOpen"
    @close="handleClose"
    :collapse="isCollapse"
  >
    <slot name="fistElement"></slot>

    <el-menu-item @click="redirect('/posts')" index="2">
      <a href="/posts">
        <i class="fas fa-book fa-lg"></i>
      </a>
      <span slot="title">Книга рецептов</span>
    </el-menu-item>
    <el-menu-item @click="redirect('/posts/create')" index="3">
      <a href="/posts/create">
        <i class="fas fa-file-medical fa-lg"></i>
      </a>
      <span slot="title">Добавление рецептов</span>
    </el-menu-item>
    <el-menu-item @click="redirect('/ingredients')" index="4">
      <a href="/ingredients">
        <i class="fas fa-apple-alt fa-lg"></i>
      </a>
      <span slot="title">Ингредиеты</span>
    </el-menu-item>
    <el-menu-item @click="redirect('/users')" index="5">
      <a href="/users">
        <i class="fas fa-address-book fa-lg"></i>
      </a>
      <span slot="title">Авторы</span>
    </el-menu-item>
  </el-menu>
</template>

<script>
export default {
  props: {
    isCollapse: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    redirect(url) {
      window.location.href = url;
    },
    handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    }
  }
};
</script>
