<script setup>
import { useForm } from "@inertiajs/vue3";
import { PencilOutline as PencilIcon } from "@vicons/ionicons5";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";

const props = defineProps({
  category: Object,
});

const categoryEditForm = useForm({
  id: props.category.id,
  name: props.category.name,
  description: props.category.description,
});

function submitCategoryEditForm() {
  categoryEditForm.put(route("categories.update", { category: categoryEditForm }));
}
</script>

<template>
  <form class="w-full space-y-4 p-4" @submit.prevent="submitCategoryEditForm">
    <FormSection>
      <FormHeading title="Название категории" />
      <n-input
        class="w-full flex flex-auto text-center border-0"
        v-model:value="categoryEditForm.name"
        maxlength="64"
        show-count
      >
      </n-input>
    </FormSection>

    <FormSection>
      <FormHeading title="Описание категории" />
      <n-input
        :autosize="{ minRows: 4, maxRows: 16 }"
        placeholder="Описание категории"
        type="textarea"
        v-model:value="categoryEditForm.description"
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
        :loading="categoryEditForm.processing"
        :disabled="categoryEditForm.processing"
      >
        Сохранить изменения
      </n-button>
    </FormSection>
  </form>
</template>
