<template>
  <div class="container-fluid">
    <div
      class="row align-items-center justify-content-around py-3"
      v-for="(download, index) in downloads"
      :key="index"
    >
      <input type="hidden" name="downloads[]" v-model="downloads.id" />

      <div class="col-12 text-center my-2" v-if="download.isDownloading">
        <div class="w-100 py-2">
          <span class="text-primary">
            {{ download.name }} :
            {{ download.fileProgress }} %
          </span>
        </div>
        <div class="progress shadow-sm h-100 py-1 px-1">
          <div
            class="progress-bar text-black-50 rounded"
            role="progressbar"
            :style="{ width: download.fileProgress + '%' }"
            style="height: 15px"
            :aria-valuenow="download.fileProgress"
            aria-valuemin="0"
            aria-valuemax="100"
          ></div>
        </div>
      </div>

      <template v-if="download.is_new">
        <div class="col-10 col-sm-10 col-md-9 p-0 m-0">
          <div class="custom-file shadow-sm">
            <input
              type="file"
              class="custom-file-input shadow-none"
              id="file"
              @change="$_PictureDownloading_fileInputChange(download)"
            />
            <label class="custom-file-label m-0" for="file">{{ download.name }}</label>
          </div>
        </div>

        <div class="col-auto p-2 m-0">
          <button
            type="button"
            class="btn btn-success shadow-sm"
            @click="$_PictureDownloading_uploadFile(download)"
          >
            <i class="fas fa-check mr-2"></i>
            <span>Загрузить</span>
          </button>
        </div>
      </template>

      <template v-if="!download.is_new">
        <div
          v-show="!download.isDownloading"
          class="col-11 rounded bg-dark50 border border-primary text-center p-0 m-auto"
        >
          <img class="img-fluid-center" :src="download.path" />
        </div>
      </template>

      <div class="col-auto p-2 m-0">
        <button
          type="button"
          class="btn btn-danger shadow-sm"
          @click="$_PictureDownloading_deleteFile(index)"
        >
          <i class="fas fa-times mr-2"></i>
          <span>Удалить</span>
        </button>
      </div>
    </div>

    <template v-if="isMultipleDownloadMode === true">
      <div class="row my-4 d-flex align-items-baseline justify-content-center">
        <div class="col-auto m-0">
          <button type="button" class="btn shadow" @click="$_PictureDownloading_addFile">
            <i class="fas fa-plus mr-1"></i>
            <span>Добавить фото</span>
          </button>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
export default {
  data() {
    return {
      downloads: [
        { id: 0, is_new: true, fileProgress: 0, isDownloading: false }
      ],
      uploadableTypes: ["image/jpeg", "image/png", "image/bmp"]
    };
  },

  props: {
    isMultipleDownloadMode: {
      type: Boolean,
      default: false
    }
  },

  updated: function() {
    this.$nextTick(function() {
      if (this.downloads.length === 0) this.$_PictureDownloading_addFile();
    });
  },

  methods: {
    $_PictureDownloading_addFile: function() {
      this.downloads.push({
        id: 0,
        is_new: true,
        fileProgress: 0,
        isDownloading: false
      });
    },

    $_PictureDownloading_deleteFile: function(index) {
      if (this.downloads[index].is_new) {
        this.downloads.splice(index, 1);
        return this.$snotify.success(
          "Выбранный файл для загрузки был сброшен",
          "Загрузка изображения"
        );
      }

      axios
        .delete("/api/p/d/" + this.downloads[index].id)
        .then(res => {
          if (res.data.result === true) {
            this.downloads.splice(index, 1);
            return this.$snotify.success(
              "Файл успешно удален",
              "Загрузка изображения"
            );
          }
        })
        .catch(err => {
          console.error(err);
        });
    },

    $_PictureDownloading_fileInputChange: function(download) {
      download.file = event.target.files[0];
    },

    $_PictureDownloading_uploadFile: async function(download) {
      if (!download.file) {
        return this.$snotify.error(
          "Файл не был выбран",
          "Ошибка загрузки изображения"
        );
      }

      if (this.uploadableTypes.indexOf(download.file.type) === -1) {
        this.$snotify.error(
          "Неверный тип загружаемого файла",
          "Ошибка загрузки изображения"
        );
        return this.$snotify.info(
          "Допустимые форматы для загрузки: jpeg, png, bmp",
          "Загрузка изображения"
        );
      }

      let form = new FormData();
      form.append("file", download.file);

      download.isDownloading = true;
      download.name = download.file.name;

      await axios
        .post("/api/p/s", form, {
          onUploadProgress: progressEvent => {
            download.fileProgress = Math.round(
              (progressEvent.loaded / progressEvent.total) * 100
            );
            download.is_new = false;
          }
        })
        .then(res => {
          download.id = res.data.id;
          download.path = res.data.path;
          this.$snotify.success(null, "Файл заргужен успешно");
        })
        .catch(err => {
          console.error(err);
          this.$snotify.error(
            "Произошла ошибка на стороне серверов. Файл не было загружено",
            "Ошибка загрузки изображения"
          );
        });

      download.isDownloading = false;
    }
  }
};
</script>
