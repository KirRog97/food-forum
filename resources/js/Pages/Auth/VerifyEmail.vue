<script setup>
import { computed } from "vue";
import AppAuthLayout from "@/Layouts/AppAuthLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
  status: String,
});

const form = useForm();

const submit = () => {
  form.post(route("verification.send"));
};

const verificationLinkSent = computed(() => props.status === "verification-link-sent");
</script>

<template>
  <AppAuthLayout>
    <Head title="Email Verification" />

    <div class="mb-4 text-sm text-primary-600">
      Thanks for signing up! Before getting started, could you verify your email address
      by clicking on the link we just emailed to you? If you didn't receive the email, we
      will gladly send you another.
    </div>

    <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
      A new verification link has been sent to the email address you provided during
      registration.
    </div>

    <form @submit.prevent="submit">
      <div class="mt-4 flex items-center justify-between">
        <PrimaryButton
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Resend Verification Email
        </PrimaryButton>

        <Link
          :href="route('logout')"
          method="post"
          as="button"
          class="underline text-sm text-primary-600 dark:text-primary-400 hover:text-primary-900 dark:hover:text-primary-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-primary-800"
        >
          Log Out
        </Link>
      </div>
    </form>
  </AppAuthLayout>
</template>
