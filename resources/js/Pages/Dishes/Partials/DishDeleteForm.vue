<script setup>
import { useForm } from "@inertiajs/vue3";
import { Trash as TrashCan } from "@vicons/ionicons5";
import FormSection from "@/Layouts/FormSection.vue";

const props = defineProps({
  dish: Object,
});

const dishDeleteForm = useForm({
  id: props.dish.id,
  name: props.dish.name,
});

function submitDishDeleteForm() {
  dishDeleteForm.delete(route("dishes.destroy", { dish: dishDeleteForm }));
}
</script>

<template>
  <form class="w-full p-1">
    <FormSection>
      <n-popconfirm @positive-click="submitDishDeleteForm">
        <template #trigger>
          <n-button primary type="error" size="large" class="mt-4">
            <template #icon>
              <n-icon>
                <TrashCan />
              </n-icon>
            </template>
            Удалить блюдо
          </n-button>
        </template>
        <p>
          Уверены, что хотите удалить блюдо "{{ dish.name }}"? <br />
          <span class="text-red-500 underline">
            Посты содержащие это блюдо будут так же удалены
          </span>
        </p>
      </n-popconfirm>
    </FormSection>
  </form>
</template>
