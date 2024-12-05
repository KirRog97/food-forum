<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";

const menuCreateForm = useForm({
  name: "",
  file: [],
  description: "",
});

const uploadableTypes = ref(".jpeg, .jpg, .png, .bmp");
// TODO: Move to separate component "Picture download"
function handleUpdate(file) {
  menuCreateForm.file = file;
}

function submitMenuCreateForm() {
  menuCreateForm.post(route("menus.store", { menu: menuCreateForm }), {
    // onFinish: () =>  menuCreateForm.reset(),
  });
}
</script>
<template>
  <AppLayout>
    <Head title="Создание нового меню" />

    <div class="w-full mx-auto bg-secondary-100 rounded px-4 py-6">
      <form class="w-full" @submit.prevent="submitMenuCreateForm">
        <FormSection>
          <FormHeading title="Название меню" />

          <n-input
            class="w-full flex flex-auto text-center border-0"
            v-model:value="menuCreateForm.name"
            type="text"
            maxlength="64"
            show-count
          >
          </n-input>
        </FormSection>

        <FormSection>
          <FormHeading title="Фото меню" />
          <div class="size-full flex flex-col">
            <div class="flex flex-col text-white bg-secondary-700 px-2 py-3 mb-2">
              <label for="fileUpload" class="mb-2">Выбрать фото</label>
              <span>
                Выбранное фото будет загружено во время отправки заполненной формы
              </span>
              <input
                id="fileUpload"
                type="file"
                :accept="uploadableTypes"
                @change="handleUpdate($event.target.files[0])"
              />
            </div>
          </div>
        </FormSection>

        <FormSection>
          <FormHeading title="Описание меню" />
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание меню"
            type="textarea"
            v-model:value="menuCreateForm.description"
          >
          </n-input>
        </FormSection>

        <FormSection>
          <n-button
            primary
            type="primary"
            size="large"
            attr-type="submit"
            class="mt-4"
            :loading="menuCreateForm.processing"
            :disabled="menuCreateForm.processing"
          >
            Создать меню
          </n-button>
        </FormSection>
      </form>
    </div>
  </AppLayout>
</template>
