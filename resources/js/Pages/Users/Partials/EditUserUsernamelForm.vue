<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
// import InputError from "@/Components/InputError.vue";
//Todo: Add Error Handling

const props = defineProps({
  user: Object,
});

const EditUserUsernamelForm = useForm({
  username: "",
  password: "",
});

// Todo: End fucnc on BackEnd
function submitEmail() {
  EditUserUsernamelForm.post(
    route("user.update", {
      user: props.user,
    }),
    {
      // onFinish: () => EditUserUsernamelForm.reset(["file"]),
    }
  );
}
</script>
<template>
  <form
    class="flex flex-col w-full bg-secondary-700 rounded p-4 space-y-4"
    @submit.prevent="submitEmail"
  >
    <div class="">
      <!-- Todo: Make backend email check for avaiblness -->
      <InputLabel for="username" value="Новое имя пользователя" />
      <TextInput
        v-model="EditUserUsernamelForm.username"
        id="username"
        type="text"
        class="mt-1 block w-full"
        required
        autofocus
        autocomplete="username"
      />
    </div>
    <div class="">
      <InputLabel for="password" value="Ваш пароль" />
      <TextInput
        v-model="EditUserUsernamelForm.password"
        id="password"
        type="password"
        class="mt-1 block w-full"
        required
        autocomplete="password"
      />
    </div>
    <div class="flex justify-center items-center">
      <button
        type="submit"
        class="text-lg text-primary-500 hover:text-primary-300 bg-secondary-900 text-center leading-normal border border-secondary-700 hover:border-secondary-500 rounded-full px-3 py-2"
      >
        Сменить имя
      </button>
    </div>
  </form>
</template>
