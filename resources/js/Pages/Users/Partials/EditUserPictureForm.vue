<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
  user: Object,
});

const uploadableTypes = ref(".jpeg, .jpg, .png, .bmp");

const editUserPictureForm = useForm({
  file: [],
  picture: props.user.avatar,
});

function handleUpdate(file) {
  editUserPictureForm.file = file;
  editUserPictureForm.post(
    route("picture.update", {
      picture: props.user.avatar,
    }),
    {
      forceFormData: true,
      // onFinish: () => editUserPictureForm.reset(["file"]),
    }
  );
}
</script>
<template>
  <div class="flex flex-col bg-secondary-700 text-white rounded p-4">
    <div class="text-lg leading-4 mb-1">Фото профиля</div>
    <div class="mb-4">
      Фото профиля показывается, например, рядом с вашими видео или
      комментариями на FoodForum.
    </div>
    <div class="flex flex-auto flex-row justify-between items-center">
      <div class="mr-4">
        <n-avatar
          round
          :size="150"
          object-fit="cover"
          :src="user.avatar.path"
          fallback-src="/images/icons/user_avacado.svg"
        />
      </div>
      <div class="flex flex-col">
        <div class="mb-4">
          Рекомендуем использовать изображение размером не менее 98 х 98
          пикселей в форматах {{ uploadableTypes.toUpperCase() }}. Анимированные
          картинки загружать нельзя. Размер файла – не более 4 МБ. Помните, что
          изображение должно соответствовать правилам сообщества FoodForum.
        </div>

        <div
          class="w-full flex flex-row justify-start align-baseline space-x-2"
        >
          <div class="flex flex-col">
            <label for="fileUpload" class="mb-2">Загрузить аватар</label>
            <input
              id="fileUpload"
              type="file"
              :accept="uploadableTypes"
              @change="handleUpdate($event.target.files[0])"
            />
            <n-progress
              type="line"
              v-if="editUserPictureForm.progress"
              :percentage="editUserPictureForm.progress.percentage"
              :processing="editUserPictureForm.processing"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
