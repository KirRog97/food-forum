<script setup>
import FormHeading from "@/Layouts/FormHeading.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import FormSection from "@/Layouts/FormSection.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const dishCreateForm = useForm({
  name: "",
  file: [],
  description: "",
});

const uploadableTypes = ref(".jpeg, .jpg, .png, .bmp");

function handleUpdate(file) {
  dishCreateForm.file = file;
}

function submitDishCreateForm() {
  dishCreateForm.post(route("dishes.store", { dish: dishCreateForm.data }));
}
</script>
<template>
  <AppLayout>
    <Head title="Создание нового блюда" />

    <div class="w-full mx-auto bg-secondary-100 rounded px-4 py-6">
      <form class="w-full" @submit.prevent="submitDishCreateForm">
        <FormSection>
          <FormHeading title="Название блюда" />

          <n-input
            class="w-full flex flex-auto text-center border-0"
            v-model:value="dishCreateForm.name"
            type="text"
            maxlength="64"
            show-count
          >
          </n-input>
        </FormSection>

        <FormSection>
          <FormHeading title="Фото блюда" />
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
          <FormHeading title="Описание блюда" />
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание блюда"
            type="textarea"
            v-model:value="dishCreateForm.description"
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
            :loading="dishCreateForm.processing"
            :disabled="dishCreateForm.processing"
          >
            Создать блюдо
          </n-button>
        </FormSection>
      </form>
    </div>
  </AppLayout>
</template>
