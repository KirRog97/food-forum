<script setup>
import { PencilOutline as PencilIcon } from "@vicons/ionicons5";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const isEmailAvailable = ref(null);

const props = defineProps({
  user: Object,
});

//Todo: End fucnc on BackEnd
const EditUserEmailForm = useForm({
  confirm_password: "",
  email: "",
});

function submitEmail() {
  // Todo:make error Message $snotify like
  if (isEmailAvailable === false) return;

  EditUserEmailForm.put(
    route("users.update", {
      user: props.user,
    }),
    {
      // onFinish: () => EditUserEmailForm.reset(["file"]),
    }
  );
}

function UserEmailValidate(email) {
  axios
    .post("/api/validate/user/email", {
      email,
    })
    .then((res) => {
      isEmailAvailable.value = res.data.isEmailAvailable;
    })
    .catch({
      // callback(error);
    });
}
</script>

<template>
  <form @submit.prevent="submitEmail">
    <div class="flex flex-col w-full py-2">
      <div class="w-full flex flex-row flex-nowrap justify-center items-center p-2">
        <div class="w-2/12 mr-2">
          <InputLabel for="email" value="Новый Email" />
        </div>
        <div class="w-10/12 h-fit">
          <TextInput
            v-model="EditUserEmailForm.email"
            id="email"
            type="email"
            class="mt-1 block w-full"
            :class="isEmailAvailable ? 'ring ring-green-600' : 'ring ring-red-600'"
            autocomplete="email"
            :update="UserEmailValidate(EditUserEmailForm.email)"
          />
        </div>
        <div class="flex ml-2 mx-auto">
          <n-button
            attr-type="submit"
            class="flex size-full px-3 py-2"
            primary
            :class="{ 'opacity-25': EditUserEmailForm.processing }"
            :disabled="EditUserEmailForm.processing || isEmailAvailable === false"
          >
            <n-icon size="24" :component="PencilIcon" />
          </n-button>
        </div>
      </div>
      <div class="ml-2/12 w-10/12 flex flex-col" v-if="isEmailAvailable === false">
        <InputError message="Этот адрес почты недоступен" />
      </div>
    </div>
  </form>
</template>
