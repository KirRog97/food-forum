<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";

const categoryCreateForm = useForm({
  name: "",
  file: [],
  description: "",
});

const uploadableTypes = ref(".jpeg, .jpg, .png, .bmp");

function handleFileChange(file) {
  categoryCreateForm.file = file;
}

function submitCategoryCreateForm() {
  categoryCreateForm.post(route("categories.store", categoryCreateForm));
}
</script>
<script>
export default {
  name: "CategoriesCreate",
};
</script>
<template>
  <AppLayout>
    <Head title="Создание новой категории" />

    <div class="w-full mx-auto bg-secondary-100 rounded px-4 py-6">
      <form class="w-full" @submit.prevent="submitCategoryCreateForm">
        <FormSection>
          <FormHeading title="Название категории" />

          <n-input
            class="w-full flex flex-auto text-center border-0"
            v-model:value="categoryCreateForm.name"
            type="text"
            maxlength="64"
            show-count
          >
          </n-input>
        </FormSection>

        <FormSection>
          <FormHeading title="Фото кухни" />
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
                @change="handleFileChange($event.target.files[0])"
              />
            </div>
          </div>
        </FormSection>

        <FormSection>
          <FormHeading title="Описание категории" />
          <n-input
            :autosize="{ minRows: 4, maxRows: 16 }"
            placeholder="Описание категории"
            type="textarea"
            v-model:value="categoryCreateForm.description"
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
            :loading="categoryCreateForm.processing"
            :disabled="categoryCreateForm.processing"
          >
            Создать категорию
          </n-button>
        </FormSection>
      </form>
    </div>
  </AppLayout>
</template>
