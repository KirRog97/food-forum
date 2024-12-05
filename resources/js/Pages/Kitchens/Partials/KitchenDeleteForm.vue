<script setup>
import { useForm } from "@inertiajs/vue3";
import { Trash as TrashCan } from "@vicons/ionicons5";
import FormSection from "@/Layouts/FormSection.vue";

const props = defineProps({
  kitchen: Object,
});

const kitchenDeleteForm = useForm({
  id: props.kitchen.id,
  name: props.kitchen.name,
});

function submitKitchenDeleteForm() {
  kitchenDeleteForm.delete(route("kitchens.destroy", { kitchen: kitchenDeleteForm }));
}
</script>

<template>
  <form class="w-full p-1">
    <FormSection>
      <n-popconfirm @positive-click="submitKitchenDeleteForm">
        <template #trigger>
          <n-button primary type="error" size="large" class="mt-4">
            <template #icon>
              <n-icon>
                <TrashCan />
              </n-icon>
            </template>
            Удалить кухню
          </n-button>
        </template>
        <p>
          Уверены, что хотите удалить кухню "{{ kitchen.name }}"? <br />
          <span class="text-red-500 underline">
            Посты принадлежащие этой кухне будут так же удалены
          </span>
        </p>
      </n-popconfirm>
    </FormSection>
  </form>
</template>
