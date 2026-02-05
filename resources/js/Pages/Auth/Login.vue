<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppAuthLayout from "@/Layouts/AppAuthLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <AppAuthLayout>
    <Head title="Eда | Вход" />

    <div class="w-full px-8">
      <ValidationErrors class="mb-4" />

      <div v-if="status" class="font-medium text-sm text-emerald-600 mb-4">
        {{ status }}
      </div>

      <form @submit.prevent="submit">
        <div>
          <InputLabel for="email" value="Почта" />
          <TextInput
            id="email"
            type="email"
            class="mt-1 block w-full"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
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
            autocomplete="current-password"
          />
        </div>

        <div class="flex flex-col justify-center items-center mt-4">
          <n-checkbox :value="form.remember" label="Запомни меня"></n-checkbox>

          <n-button
            primary
            type="primary"
            size="large"
            attr-type="submit"
            class="mt-4"
            :loading="form.processing"
            :disabled="form.processing"
          >
            Вход
          </n-button>

          <Link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="text-base text-primary-600 hover:text-primary-700 hover:underline transition mt-8"
          >
            Забыли пароль?
          </Link>
        </div>
      </form>
    </div>
  </AppAuthLayout>
</template>
