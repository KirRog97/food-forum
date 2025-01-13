<script setup>
defineProps({
  user: { type: Object, default: {} },
});
</script>
<template>
  <div class="flex flex-col justify-center items-center p-3">
    <div class="flex justify-center">
      <n-avatar
        :size="150"
        :src="user.avatar.path"
        fallback-src="/images/icons/user_avacado.svg"
        object-fit="cover"
        round
      />
    </div>
    <div class="flex justify-center items-center mt-4">
      <a
        class="text-center text-lg sm:text-xl leading-normal font-handwritten"
        :href="`users/${user.id}`"
      >
        {{ user.username }}
      </a>
    </div>
    <div class="flex justify-center items-center mt-2">
      <button
        type="button"
        class="text-sm sm:text-lg text-center text-primary-500 focus:text-primary-300 focus:bg-secondary-700 leading-normal focus:border focus:border-secondary-200 rounded-lg hover:underline"
      >
        <a :href="`users/${user.id}/recipes`">Список рецептов</a>
      </button>
    </div>
  </div>
</template>
