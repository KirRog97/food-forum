<template>
  <el-menu
    default-active="3000"
    class="sidebar"
    background-color="var(--secondary)"
    text-color="var(--white)"
    active-text-color="var(--primary)"
    @open="handleOpen"
    @close="handleClose"
    :collapse="isCollapse"
  >
    <slot name="fistElement"></slot>

    <el-submenu index="2">
      <template slot="title">
        <i class="el-icon-s-management"></i>
        <span slot="title">Рецепты</span>
      </template>
      <el-menu-item @click="redirect('/posts')" index="2-1">
        <i class="el-icon-s-management"></i>
        <span slot="title">Книга рецептов</span>
      </el-menu-item>
      <el-menu-item @click="redirect('/posts/create')" index="2-2">
        <i class="el-icon-document-add"></i>
        <span slot="title">Добавление рецептов</span>
      </el-menu-item>
      <el-menu-item @click="redirect('/posts')" index="2-3">
        <i class="el-icon-sunrise-1"></i>
        <span slot="title">Сезонные рецепты</span>
      </el-menu-item>
    </el-submenu>
    <el-menu-item @click="redirect('/ingredients')" index="3">
      <i class="el-icon-apple"></i>
      <span slot="title">Ингредиеты</span>
    </el-menu-item>
    <el-menu-item @click="redirect('/users')" index="4">
      <i class="el-icon-user-solid"></i>
      <span slot="title">Авторы</span>
    </el-menu-item>
    <el-menu-item @click="redirect('/ingredients')" index="5">
      <i class="el-icon-setting"></i>
      <span slot="title">Navigator Four</span>
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
