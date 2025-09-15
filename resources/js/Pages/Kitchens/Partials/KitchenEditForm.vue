<script setup>
import { PencilOutline as PencilIcon } from "@vicons/ionicons5";
import { useForm } from "@inertiajs/vue3";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
  kitchen: Object,
});

const kitchenEditForm = useForm({
  id: props.kitchen.id,
  name: props.kitchen.name,
  description: props.kitchen.description,
});

function submitKitchenEditForm() {
  kitchenEditForm.put(route("kitchens.update", { kitchen: kitchenEditForm }));
}
</script>

<template>
  <form class="w-full space-y-4" @submit.prevent="submitKitchenEditForm">
    <FormSection>
      <FormHeading title="Название кухни" />
      <n-input
        class="w-full flex flex-auto text-center border-0"
        v-model:value="kitchenEditForm.name"
        maxlength="64"
        show-count
      >
      </n-input>
    </FormSection>

    <FormSection>
      <FormHeading title="Описание кухни" />
      <n-input
        :autosize="{ minRows: 4, maxRows: 16 }"
        placeholder="Описание кухни"
        type="textarea"
        v-model:value="kitchenEditForm.description"
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
        :loading="kitchenEditForm.processing"
        :disabled="kitchenEditForm.processing"
      >
        Сохранить изменения
      </n-button>
    </FormSection>
  </form>
</template>
