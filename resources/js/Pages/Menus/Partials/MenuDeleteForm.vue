<script setup>
import { useForm } from "@inertiajs/vue3";
import { Trash as TrashCan } from "@vicons/ionicons5";
import FormSection from "@/Layouts/FormSection.vue";

const props = defineProps({
  menu: Object,
});

const menuDeleteForm = useForm({
  id: props.menu.id,
  name: props.menu.name,
});

function submitMenuDeleteForm() {
  menuDeleteForm.delete(route("menus.destroy", { menu: menuDeleteForm }));
}
</script>

<template>
  <form class="w-full p-1">
    <FormSection>
      <n-popconfirm @positive-click="submitMenuDeleteForm">
        <template #trigger>
          <n-button primary type="error" size="large" class="mt-4">
            <template #icon>
              <n-icon>
                <TrashCan />
              </n-icon>
            </template>
            Удалить меню
          </n-button>
        </template>
        <p>
          Уверены, что хотите удалить меню "{{ menu.name }}"? <br />
          <span class="text-red-500 underline">
            Посты из этого меню будут так же удалены
          </span>
        </p>
      </n-popconfirm>
    </FormSection>
  </form>
</template>
