<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AppAuthLayout from "@/Layouts/AppAuthLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

defineProps({
  status: String,
});

const form = useForm({
  email: "",
});

const submit = () => {
  form.post(route("password.email"));
};
</script>

<template>
  <AppAuthLayout>
    <Head title="Forgot Password" />

    <div class="w-full flex flex-wrap justify-center items-center px-8">
      <ValidationErrors class="mb-4" />

      <div class="mb-4 text-base text-center text-primary-600">
        Забыли пароль? Не проблема. Просто укажите адрес почты, куда будет выслана ссылка
        для сброса и выбора нового пароля
      </div>
      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>

      <InputError class="mb-4" />

      <form @submit.prevent="submit">
        <div>
          <InputLabel for="email" value="Email" />
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
          <PrimaryButton
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Сбросить пароль Email Password Reset Link
          </PrimaryButton>
        </div>
      </form>
    </div>
  </AppAuthLayout>
</template>
