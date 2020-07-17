<template>
  <transition
    enter-active-class="animate__animated animate__zoomIn animate__fast"
    css
  >
    <el-backtop :bottom="70" :right="15" :visibility-height="200"></el-backtop>
  </transition>
</template>

<style lang="scss" scoped>
.el-backtop {
  background-color: var(--secondary);
  transition: 0.7s cubic-bezier(0.55, 0, 0.1, 1);
  opacity: 0.2;
  user-select: none;
  z-index: 1000;

  &:hover {
    opacity: 1;
    box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.5);
  }
}
</style>
