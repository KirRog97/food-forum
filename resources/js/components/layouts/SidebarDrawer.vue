<template>
  <el-drawer
    :direction="drawerDirection"
    :show-close="false"
    :withHeader="false"
    :append-to-body="true"
    :wrapperClosable="true"
    :destroy-on-close="true"
    :visible.sync="DrawerOpenStatus"
    @close="toggleOffDrawer()"
  >
    <sidebar-menu :isCollapse="false">
      <template v-slot:fistElement>
        <el-menu-item index="1" @click="toggleOffDrawer()">
          <a href="#">
            <i class="el-icon-back"></i>
            <span slot="title">Свернуть</span>
          </a>
        </el-menu-item>
      </template>
    </sidebar-menu>
  </el-drawer>
</template>

<script>
import { mapGetters } from "vuex";
import { mapMutations } from "vuex";

export default {
  data() {
    return {
      drawerDirection: "ltl"
    };
  },
  watch: {
    DrawerOpenStatus: function(newVal, oldVal) {
      if (newVal === true) {
        window.addEventListener("resize", this.onResize);
      }
    }
  },

  beforeDestroy() {
    window.removeEventListener("resize", this.onResize);
  },
  computed: {
    ...mapGetters(["DrawerOpenStatus"])
  },
  methods: {
    ...mapMutations({
      toggleOffDrawer: "toggleOffDrawer"
    }),
    onResize() {
      if (window.innerWidth >= 991) {
        this.toggleOffDrawer();
      }
    }
  }
};
</script>
