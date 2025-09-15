<script setup>
import { useForm } from "@inertiajs/vue3";
import { PencilOutline as PencilIcon } from "@vicons/ionicons5";

import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";

const props = defineProps({
  menu: Object,
});

const menuEditForm = useForm({
  id: props.menu.id,
  name: props.menu.name,
  description: props.menu.description,
});

function submitMenuEditForm() {
  menuEditForm.put(route("menus.update", { menu: menuEditForm }));
}
</script>

<template>
  <form class="w-full space-y-4" @submit.prevent="submitMenuEditForm">
    <FormSection>
      <FormHeading title="Название меню" />
      <n-input
        class="w-full flex flex-auto text-center border-0"
        v-model:value="menuEditForm.name"
        maxlength="64"
        show-count
      >
      </n-input>
    </FormSection>

    <FormSection>
      <FormHeading title="Описание меню" />
      <n-input
        :autosize="{ minRows: 4, maxRows: 16 }"
        placeholder="Описание меню"
        type="textarea"
        v-model:value="menuEditForm.description"
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
        :loading="menuEditForm.processing"
        :disabled="menuEditForm.processing"
      >
        Сохранить изменения
      </n-button>
    </FormSection>
  </form>
</template>
