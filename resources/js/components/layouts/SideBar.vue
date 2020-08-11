<template>
  <sidebar-menu :isCollapse="true">
    <template v-slot:fistElement>
      <el-menu-item index="1">
        <a href="/home">
          <i class="fas fa-home text-xl"></i>
        </a>
        <span slot="title">Главная</span>
      </el-menu-item>
    </template>
  </sidebar-menu>
</template>

<script>
import { mapGetters } from "vuex";
import { mapMutations } from "vuex";

export default {
  methods: {
    handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    }
  }
};
</script>
