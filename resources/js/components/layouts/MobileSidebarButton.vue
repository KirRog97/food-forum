<template>
  <div class="header-icon__inner">
    <button class="block md:hidden" @click="toggleOnDrawer()">
      <i class="fa fa-bars header-icon" aria-hidden="true"></i>
    </button>
  </div>
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
    })
  }
};
</script>
