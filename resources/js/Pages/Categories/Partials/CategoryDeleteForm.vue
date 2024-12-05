<script setup>
import { useForm } from "@inertiajs/vue3";
import { Trash as TrashCan } from "@vicons/ionicons5";
import FormSection from "@/Layouts/FormSection.vue";

const props = defineProps({
  category: Object,
});

const categoryDeleteForm = useForm({
  id: props.category.id,
  name: props.category.name,
});

function submitCategoryDeleteForm() {
  categoryDeleteForm.delete(
    route("categories.destroy", { category: categoryDeleteForm })
  );
}
</script>

<template>
  <form class="w-full p-1">
    <FormSection>
      <n-popconfirm @positive-click="submitCategoryDeleteForm">
        <template #trigger>
          <n-button primary type="error" size="large" class="mt-4">
            <template #icon>
              <n-icon>
                <TrashCan />
              </n-icon>
            </template>
            Удалить категорию
          </n-button>
        </template>
        <p>
          Уверены, что хотите удалить категорию "{{ category.name }}"? <br />
          <span class="text-red-500 underline">
            Посты содержащие эту категорию будут так же удалены
          </span>
        </p>
      </n-popconfirm>
    </FormSection>
  </form>
</template>
