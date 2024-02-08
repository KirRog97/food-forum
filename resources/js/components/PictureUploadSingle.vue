<script setup>
import { ref } from "vue";
import { ArchiveOutline as ArchiveIcon } from "@vicons/ionicons5";

const props = defineProps({
  picture: Array,
});

const uploadableTypes = ref(".jpeg, .jpg, .png, .bmp");

// const showModalRef = ref(false);
// const previewImageUrlRef = ref("");

function handleUpdate(file) {
  props.picture.push(file[0]);
}

function handlePreview(file) {
  const { url } = file;
  previewImageUrlRef.value = url;
  showModalRef.value = true;
}

// Old Func below
/*
function beforeAvatarUpload(file) {
  if (!file) {
    // this.$snotify.error(
    //   "Файл не был выбран",
    //   "Ошибка загрузки изображения",
    //   { showProgressBar: false, timeout: 700 }
    // );
    return;
  }
      if (this.fileList[0]) {
        this.$snotify.warning(
          "Файл уже был загружен ранее. Для загрузки нового файла удалите предыдущий",
          "Ошибка загрузки изображения",
          { timeout: 1200 }
        );
        return;
      }

      if (this.uploadableTypes.indexOf(file.raw.type) === -1) {
        this.$snotify.error(
          "Неверный тип загружаемого файла",
          "Ошибка загрузки изображения"
        );

        this.$snotify.info(
          "Допустимые форматы для загрузки: jpeg, png, bmp",
          "Загрузка изображения"
        );

        return;
      }
  return file;
}

async function handleDownload(file) {
  this.isLoading = true;
  let form = new FormData();
  form.append("file", file.raw);

  await axios
    .post("/picture/save", form)
    .then((res) => {
      file.id = res.data.id;
      file.url = res.data.path;
      this.fileList.push(file);
      this.isLoading = false;
      this.isLoadedOnServer = true;
    })
    .catch((err) => {
      console.error(err);
      this.isLoading = false;
      this.$snotify.error(
        `Произошла ошибка на стороне серверов. Файл не был загружен. ${err}`,
        "Ошибка загрузки изображения"
      );
    });
}

function handleSuccess(res, file) {
  //   this.fileList = URL.createObjectURL(file.raw);
  this.isLoadedOnServer = true;
  this.$snotify.success(null, "Файл заргужен успешно", {
    showProgressBar: false,
    timeout: 700,
  });
}

function beforeRemove(file, fileList) {
  return this.$confirm(`Cancel the transfert of ${file.name} ?`);
}

function handleRemove(file) {
  if (this.isLoadedOnServer === false) {
    this.fileList.splice(_.findIndex(this.fileList, file.id), 1);
    return this.$snotify.success(
      "Выбранный файл для загрузки был сброшен",
      "Загрузка изображения",
      { showProgressBar: false, timeout: 700 }
    );
  }

  axios
    .delete(`/picture/delete/${file.id}`)
    .then((res) => {
      if (res.data.result === true) {
        this.fileList.splice(_.findIndex(this.fileList, file.id), 1);
        this.isLoadedOnServer = false;
        return this.$snotify.success(
          "Файл успешно удален",
          "Загрузка изображения",
          { showProgressBar: false, timeout: 700 }
        );
      }
    })
    .catch((err) => {
      console.error(err);
    });
}

function handleExceed(files, fileList) {
  this.$snotify.warning(
    "Попытка превышения колличества заргужаемых файлов",
    "Загрузка изображения",
    { showProgressBar: false, timeout: 1200 }
  );
}
*/
</script>

<template>
  <div class="w-full flex flex-col flex-auto justify-center mx-auto px-0 my-3">
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
          Разрешены медиафайлы с раширениями {{ uploadableTypes }}
        </n-p>
      </n-upload-dragger>
    </n-upload>
  </div>
</template>
