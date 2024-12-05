<script setup>
import { useForm } from "@inertiajs/vue3";
import { PencilOutline as PencilIcon } from "@vicons/ionicons5";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";

const props = defineProps({
  dish: Object,
});

const dishEditForm = useForm({
  id: props.dish.id,
  name: props.dish.name,
  description: props.dish.description,
});

function submitDishEditForm() {
  dishEditForm.patch(route("dishes.update", { dish: dishEditForm }));
}
</script>

<template>
  <form class="w-full space-y-4" @submit.prevent="submitDishEditForm">
    <FormSection>
      <FormHeading title="Название блюда" />
      <n-input
        class="w-full flex flex-auto text-center border-0"
        v-model:value="dishEditForm.name"
        maxlength="64"
        show-count
      >
      </n-input>
    </FormSection>

    <FormSection>
      <FormHeading title="Описание блюда" />
      <n-input
        :autosize="{ minRows: 4, maxRows: 16 }"
        placeholder="Описание блюда"
        type="textarea"
        v-model:value="dishEditForm.description"
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
        :loading="dishEditForm.processing"
        :disabled="dishEditForm.processing"
      >
        Сохранить изменения
      </n-button>
    </FormSection>
  </form>
</template>
