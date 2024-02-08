<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  user: {
    type: Object,
    default: {},
  },
});
</script>
<template>
  <div
    class="sticky top-0 transition flex flex-col justify-center items-center px-2 py-6 space-y-2"
  >
    <n-avatar
      :size="130"
      :src="user.avatar.path"
      fallback-src="/images/icons/user_avacado.svg"
      object-fit="cover"
      round
    />

    <span
      class="text-lg text-secondary-700 text-center tracking-wide font-handwritten"
    >
      Кухня
    </span>
    <span
      class="text-2xl text-center tracking-wide font-handwritten font-semibold"
    >
      {{ user.username }}
    </span>

    <div class="w-full flex flex-col justify-between space-y-2">
      <div
        class="w-full flex flex-col justify-center items-center bg-secondary-50 text-secondary-700 rounded p-2"
      >
        <span
          class="text-lg text-center leading-tight font-handwritten"
          v-text="4236"
        >
        </span>
        <span class="text-lg text-center font-light leading-tight">
          Рецептов
        </span>
      </div>
      <div
        class="w-full flex flex-col justify-center items-center bg-secondary-50 text-secondary-700 rounded p-2"
      >
        <span
          class="text-lg text-center leading-tight font-handwritten"
          v-text="1262"
        >
        </span>
        <span class="text-lg text-center font-light leading-tight">
          Подписок
        </span>
      </div>
      <div
        class="w-full flex flex-col justify-center items-center bg-secondary-50 text-secondary-700 rounded p-2"
      >
        <span
          class="text-lg text-center leading-tight font-handwritten"
          v-text="4002"
        >
        </span>
        <span class="text-lg text-center font-light leading-tight">
          Коментариев
        </span>
      </div>
    </div>

    <span class="text-lg text-center font-light">
      Дата регистрации:
      <span class="font-handwritten">
        <!-- Carbon in JS World https://momentjs.com/docs/#/durations/humanize/ -->
        {{
          new Date(user.created_at).toLocaleString("ru-RU", { timeZone: "UTC" })
        }}
      </span>
    </span>

    <template v-if="$page.props.auth.user?.id === user.id">
      <Link
        class="block text-base md:text-lg text-secondary500 bg-primary-300 border border-primary-400 rounded px-2 py-1"
        :href="route('users.edit', { user: user.id })"
      >
        Редактировать
      </Link>
    </template>
  </div>
</template>
