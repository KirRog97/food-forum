<script setup>
import { ref } from "vue";
import { ArchiveOutline as ArchiveIcon } from "@vicons/ionicons5";

const props = defineProps({ file: Array });
const uploadableTypes = ref(".jpeg, .jpg, .png, .bmp");

function handleUpdate(file) {
  props.file[0] = file[0].file;
}

function handlePreview(file) {
  const { url } = file;
  previewImageUrlRef.value = url;
  showModalRef.value = true;
}
</script>

<template>
  <div class="w-full flex flex-col flex-auto justify-center mx-auto px-0 my-3">
    <label for="fileUpload" class="mb-2">Выбрать фото</label>
    <span> Выбранное фото будет загружено во время отправки заполненной формы </span>

    <n-upload
      directory-dnd
      :accept="uploadableTypes"
      @update:file-list="handleUpdate"
      :max="1"
    >
      <n-upload-dragger>
        <div style="margin-bottom: 12px">
          <n-icon size="48" :depth="3">
            <archive-icon />
          </n-icon>
        </div>
        <n-text style="font-size: 16px">
          Кликните на это поле или перетащите на него медиафайл, чтобы загрузить
        </n-text>
        <n-p depth="3" style="margin: 8px 0 0 0">
          Разрешены медиафайлы с расширениями {{ uploadableTypes }}
        </n-p>
      </n-upload-dragger>
    </n-upload>
  </div>
</template>
