<script setup>
import { ref, reactive } from "vue";

const props = defineProps({
  user: Object,
});

const uploadableTypes = ref(".jpeg, .jpg, .png, .bmp");
const uploadProgress = reactive({
  progress: 0,
  processing: false,
});

function submitEditUserPicture(newAvatarPicture) {
  axios
    .postForm(
      route("picture.update", {
        picture: props.user.avatar,
      }),
      {
        file: newAvatarPicture,
      },
      {
        onUploadProgress: function (progressEvent) {
          uploadProgress.progress = Math.round(progressEvent.progress * 100);
          uploadProgress.processing = progressEvent.upload;
        },
      }
    )
    .then((res) => {
      props.user.avatar.path = res.data.path;
    });
}
</script>
<template>
  <div class="flex flex-col bg-secondary-700 text-white rounded p-4">
    <div class="text-lg leading-4 mb-1">Фото профиля</div>
    <div class="mb-4">
      Фото профиля показывается, например, рядом с вашими видео или комментариями на
      FoodForum.
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
          Рекомендуем использовать изображение размером не менее 98 х 98 пикселей в
          форматах {{ uploadableTypes.toUpperCase() }}. Анимированные картинки загружать
          нельзя. Размер файла – не более 4 МБ. Помните, что изображение должно
          соответствовать правилам сообщества FoodForum.
        </div>

        <div class="w-full flex flex-row justify-start space-x-2">
          <div class="flex flex-col">
            <label for="fileUpload" class="mb-2">Загрузить аватар</label>
            <input
              id="fileUpload"
              type="file"
              :accept="uploadableTypes"
              @change="submitEditUserPicture($event.target.files[0])"
            />

            <n-progress
              type="line"
              v-if="uploadProgress.progress > 0 && uploadProgress.progress < 99"
              :percentage="uploadProgress.progress"
              :processing="uploadProgress.processing"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
