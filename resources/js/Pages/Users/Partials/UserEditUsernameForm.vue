<script setup>
import { PencilOutline as PencilIcon } from "@vicons/ionicons5";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

//Todo: Add Error Handling

const isUsernameAvailable = ref(null);

const props = defineProps({
  user: Object,
});

const EditUserUsernameForm = useForm({
  username: "",
});

function submitEmail() {
  EditUserUsernameForm.put(
    route("users.update", {
      user: props.user,
    })
  );
}

function UsernameValidate(username) {
  axios
    .post("/api/validate/user/username", {
      username,
    })
    .then((res) => {
      isUsernameAvailable.value = res.data.isUsernameAvailable;
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
          <InputLabel for="username" value="Новое имя пользователя" />
        </div>
        <div class="w-10/12 h-fit">
          <TextInput
            v-model="EditUserUsernameForm.username"
            id="username"
            type="text"
            class="mt-1 block w-full"
            :class="isUsernameAvailable ? 'ring ring-green-600' : 'ring ring-red-600'"
            auto
            autocomplete=""
            :update="UsernameValidate(EditUserUsernameForm.username)"
          />
        </div>
        <div class="flex ml-2 mx-auto">
          <!-- ToDO: LOW make button more fancy... -->
          <n-button
            attr-type="submit"
            class="flex size-full px-3 py-2"
            primary
            :class="{ 'opacity-25': EditUserUsernameForm.processing }"
            :disabled="EditUserUsernameForm.processing || isUsernameAvailable === false"
          >
            <n-icon size="24" :component="PencilIcon" />
          </n-button>
        </div>
      </div>
      <div class="ml-2/12 w-10/12 flex flex-col" v-if="isUsernameAvailable === false">
        <InputError message="Это имя пользователя недоступно" />
      </div>
    </div>
  </form>
</template>
