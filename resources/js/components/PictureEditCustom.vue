<script setup>
import { ref } from "vue";

const uploadableTypes = ref(["image/jpeg", "image/png", "image/bmp"]);

defineProps({
  picture: {
    type: Object,
    default: {},
  },
});

async function fileValidate(uploadableFile) {
  if (!uploadableFile) {
    // return this.$snotify.success(
    //   "Файл для загрузки не был выбран",
    //   "Загрузка фото"
    // );
  }
  if (uploadableTypes.value.indexOf(uploadableFile.type) === -1) {
    // return this.$snotify.success(
    //   `Неверный тип загружаемого файла (${uploadableFile.type})`,
    //   "Загрузка фото"
    // );
  }
}

async function uploadFile(uploadableFile) {
  if (!uploadableFile) {
    return this.$snotify.success(
      "Файл для загрузки не был выбран",
      "Загрузка фото"
    );
  }
  if (this.uploadableTypes.indexOf(uploadableFile.type) === -1) {
    return this.$snotify.success(
      `Неверный тип загружаемого файла (${uploadableFile.type})`,
      "Загрузка фото"
    );
  }

  const form = new FormData();
  form.append("file", uploadableFile);

  this.isUploading = true;

  await axios
    .post(`/picture/update/${this.picture.id}`, form, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
      onUploadProgress: (progressEvent) => {
        uploadableFile.fileProgress = Math.round(
          (progressEvent.loaded / progressEvent.total) * 100
        );
      },
    })
    .then((res) => {
      this.picture.id = res.data.id;
      this.picture.path = res.data.path;

      this.$snotify.success(null, "Изображение изменено успешно", {
        showProgressBar: false,
        timeout: 1200,
      });
    })
    .catch((err) => {
      console.error(err);
      return this.$snotify.success(
        `Ошибка серевера(${err.status})`,
        "Загрузка фото"
      );
    });
  this.isUploading = false;
  this.$forceUpdate();
}
</script>

<template>
  <div
    class="flex flex-col min-w-min min-h-min relative rounded px-4 pt-4 bg-secondary-700 overflow-hidden"
  >
    <div
      class="h-10/12 flex justify-center items-center rounded bg-secondary-500"
    >
      <img
        class="relative object-scale-down z-10"
        :src="picture.path"
        alt="Recipe Picture"
      />
    </div>
    <div
      class="h-2/12 flex justify-center items-center bg-secondary-700 px-4 py-2 z-20"
    >
      <button
        type="button"
        class="text-lg text-primary-500 hover:text-black hover:bg-primary-800 transition rounded px-2 py-1"
        @click="$refs.fileInput.click()"
      >
        Сменить фото
      </button>

      <input
        hidden
        type="file"
        ref="fileInput"
        @change="uploadFile($event.target.files[0])"
        :accept="uploadableTypes.join()"
      />
    </div>
  </div>
</template>
