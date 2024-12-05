<script setup>
import { ref, reactive } from "vue";
import FormHeading from "@/Layouts/FormHeading.vue";
import FormSection from "@/Layouts/FormSection.vue";

const props = defineProps({
  formHeadingText: String,
  picture: Object,
});

const uploadableTypes = ref(".jpeg, .jpg, .png, .bmp");
const uploadProgress = reactive({
  progress: 0,
  processing: false,
});

function submitEditPicture(newPicture) {
  axios
    .postForm(
      route("picture.update", {
        picture: props.picture,
      }),
      {
        file: newPicture,
      },
      {
        onUploadProgress: function (progressEvent) {
          uploadProgress.progress = Math.round(progressEvent.progress * 100);
          uploadProgress.processing = progressEvent.upload;
        },
      }
    )
    .then((res) => {
      props.picture.path = res.data.path;
    });
}
</script>
<template>
  <FormSection>
    <FormHeading :title="formHeadingText" />

    <div class="flex flex-col bg-secondary-700 text-white rounded p-4">
      <div class="flex flex-auto flex-row justify-between items-center">
        <div class="mr-4">
          <n-image
            round
            :size="150"
            object-fit="cover"
            :src="picture.path"
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
              <label for="fileUpload" class="mb-2">Обновить фото</label>
              <input
                id="fileUpload"
                type="file"
                :accept="uploadableTypes"
                @change="submitEditPicture($event.target.files[0])"
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
  </FormSection>
</template>
