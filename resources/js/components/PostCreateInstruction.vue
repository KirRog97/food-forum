<script setup>
const props = defineProps({
  instructions: {
    type: Array,
    default: [],
  },
});

function addInstructionStep() {
  if (props.instructions.length > 50) {
    // return this.$snotify.error(
    //   "Превышенно максимальное допустимое колличество шагов приготовления рецепта (50 шаговов)",
    //   "Способ приготовления",
    //   { showProgressBar: true, timeout: 4000 }
    // );
  }
  props.instructions.push({ content: "" });
}

function deleteInstructionStep(index) {
  if (props.instructions.length > 1) {
    props.instructions.splice(index, 1);
  } else {
    // this.$snotify.error(
    //   "Указанный шаг не может быть удален. Рецепт должен содержать хотя бы один шаг приготовления",
    //   "Способ приготовления",
    //   { showProgressBar: true, timeout: 4000 }
    // );
  }
}
</script>

<template>
  <div class="w-full">
    <div class="space-y-3">
      <div
        class="flex justify-between space-x-2"
        v-for="(instructionStep, instructionStepIndex) in instructions"
        :key="instructionStepIndex"
      >
        <div class="w-24 flex flex-col space-y-1">
          <div
            class="h-1/2 flex justify-center items-center bg-secondary-900 rounded"
          >
            <span class="text-lg text-primary-400 bold font-handwritten">
              {{ instructionStepIndex + 1 }} шаг
            </span>
          </div>
          <div
            class="h-1/2 flex justify-center items-center bg-secondary-900 rounded"
          >
            <button
              type="button"
              class="text-primary-400 hover:text-red-700"
              @click="deleteInstructionStep(instructionStepIndex)"
            >
              <i class="fas fa-times fa-lg"></i>
            </button>
          </div>
        </div>

        <n-input
          :autosize="{ minRows: 4, maxRows: 16 }"
          placeholder="Описание шага приготовления блюда"
          type="textarea"
          maxlength="250"
          v-model:value="instructionStep.text"
        >
        </n-input>
      </div>
    </div>

    <button
      type="button"
      class="w-full flex flex-nowrap justify-center items-center text-primary-400 hover:text-primary-100 bg-secondary-900 rounded-lg px-3 py-2 mt-2"
      @click="addInstructionStep"
    >
      <i class="fas fa-plus mr-1"></i>
      <span class="text-lg">Добавить шаг</span>
    </button>
  </div>
</template>
