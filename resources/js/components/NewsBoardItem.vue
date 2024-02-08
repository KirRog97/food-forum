<script setup>
import { reactive } from "vue";

// Large size already used in NewsBoardItemLarge
// For now it's not used in 'here'
const NewsBoardItemStyles = reactive({
  large: "h-65 row-span-2 col-span-2 sm:h-[400px]",
  medium: "h-48 row-span-1 col-span-2 sm:h-[270px]",
  small: "h-48 row-span-1 col-span-2 xs:col-span-1 sm:h-[270px]",
});

// RU: https://tproger.ru/translations/alternativa-if-else-i-switch-literaly-obektov-v-javascript/
// EN: https://betterprogramming.pub/dont-use-if-else-and-switch-in-javascript-use-object-literals-c54578566ba0
function getNewsBoardClassesMap(elementSize) {
  return (
    NewsBoardItemStyles[elementSize.toLowerCase()] ??
    console.error("getNewsBoardClassesMap() Incorrect input")
  );
}

defineProps({
  newsBoardItem: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <div
    :class="getNewsBoardClassesMap(newsBoardItem.size)"
    class="flex justify-center items-center relative overflow-hidden"
  >
    <img
      class="absolute w-full h-full object-center object-cover overflow-hidden z-20"
      :src="newsBoardItem.pictureUrl"
      :alt="`Изображение статьи номер ${newsBoardItem.id}`"
    />
    <div
      class="flex flex-col w-full h-full overflow-auto z-50 content-start p-2 vignette"
      style="color: rgba(255, 255, 255, 0.9)"
    >
      <div class="flex flex-row flex-nowrap justify-start w-full h-fit">
        <div
          class="flex items-center bg-secondary-800 text-base p-2 w-fit h-fit mr-1 last:mr-0"
          style="color: rgba(255, 255, 255, 0.9)"
          v-for="(tag, index) in newsBoardItem.tags"
          :key="index"
        >
          <i :class="[tag.icon, 'mr-1']" v-if="tag.icon"></i>
          <h6>
            {{ tag.name }}
          </h6>
        </div>
      </div>

      <span
        class="w-fit h-fit s:text-lg text-base text-secondary-600 text-left uppercase font-semibold leading-tight z-50 p-1"
        style="background-color: rgba(255, 255, 255, 0.9)"
      >
        {{ newsBoardItem.title }}
      </span>
    </div>
  </div>
</template>

<style scoped>
.vignette {
  box-shadow: inset 0 -35px 40px rgba(0, 0, 0, 0.25);
}
</style>
