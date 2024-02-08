<script setup>
import AppAuthLayout from "@/Layouts/AppAuthLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
  username: "",
  email: "",
  password: "",
  password_confirmation: "",
  terms: false,
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <AppAuthLayout>
    <Head title="Eда | Регистрация" />

    <InputError class="mb-4" />

    <form class="w-full px-8" @submit.prevent="submit">
      <div>
        <InputLabel for="username" value="Логин" />
        <TextInput
          id="username"
          type="text"
          class="mt-1 block w-full"
          v-model="form.username"
          required
          autofocus
          autocomplete="username"
        />
      </div>

      <div class="mt-4">
        <InputLabel for="email" value="Почта" />
        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autocomplete="userusername"
        />
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="Пароль" />
        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="new-password"
        />
      </div>

      <div class="mt-4">
        <InputLabel for="password_confirmation" value="Подтвреждение пароля" />
        <TextInput
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />
      </div>

      <div class="flex flex-col items-center justify-end mt-4">
        <n-button
          primary
          type="primary"
          size="large"
          attr-type="submit"
          class="mt-4"
          :loading="form.processing"
          :disabled="form.processing"
        >
          Зарегистрироваться
        </n-button>
        <Link
          :href="route('login')"
          class="text-base text-primary-600 hover:text-primary-700 hover:underline mt-8"
        >
          Уже зарегистрированы?
        </Link>
      </div>
    </form>
  </AppAuthLayout>
</template>
