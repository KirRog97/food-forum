<script setup>
defineProps({
  user: {
    type: Object,
    default: {},
  },
});
</script>

<template>
  <div class="flex flex-initial justify-between items-center px-2 pt-1">
    <div class="w-3/12 h-full flex justify-center items-center">
      <n-avatar
        :size="48"
        :src="user.avatar.path"
        fallback-src="/images/icons/user_avacado.svg"
        object-fit="cover"
        round
      />
    </div>
    <div class="w-9/12 flex flex-col justify-start">
      <span
        class="text-base md:text-xl text-secondary-700 text-center leading-tight"
      >
        {{ user.username }}
      </span>
    </div>
  </div>
</template>
