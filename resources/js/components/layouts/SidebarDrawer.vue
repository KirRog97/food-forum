<template>
  <el-drawer
    :direction="drawerDirection"
    :show-close="false"
    :withHeader="false"
    :append-to-body="true"
    :wrapperClosable="true"
    :visible.sync="DrawerOpenStatus"
    @close="toggleOffDrawer()"
  >
    <sidebar-menu :isCollapse="false">
      <template v-slot:fistElement>
        <el-menu-item index="1" @click="toggleOffDrawer()">
          <i class="el-icon-back"></i>
          <span slot="title">Свернуть</span>
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
  computed: {
    ...mapGetters(["DrawerOpenStatus"])
  },
  methods: {
    ...mapMutations({
      toggleOffDrawer: "toggleOffDrawer"
    })
  }
};
</script>
