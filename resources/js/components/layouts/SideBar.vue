<template>
  <sidebar-menu :isCollapse="true">
    <template v-slot:fistElement>
      <el-menu-item index="1" @click="toggleOnDrawer()">
        <i class="el-icon-right"></i>
        <span slot="title">Открыть</span>
      </el-menu-item>
    </template>
  </sidebar-menu>
</template>

<script>
import { mapGetters } from "vuex";
import { mapMutations } from "vuex";

export default {
  computed: {
    ...mapGetters(["DrawerOpenStatus"])
  },
  methods: {
    ...mapMutations({
      toggleOnDrawer: "toggleOnDrawer"
    }),
    goToURL(url) {
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
