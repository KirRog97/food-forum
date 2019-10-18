<template>
  <div class="container-fluid py-2 px-0">
    <template v-if="messages">
      <div
        v-for="message in messages"
        :key="message.id"
        class="alert rounded-pill alert-dismissible shadow-sm fade show"
        :class="[message.type === 'error' ? 'alert-danger' : 'alert-success' ]"
        role="alert"
      >
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ message.text }}</strong>
      </div>
    </template>

    <div
      class="row align-items-center justify-content-around my-2 px-1 py-3"
      v-for="(download, index) in downloads"
      :key="index"
    >
      <input type="hidden" name="downloads[]" v-model="downloads.id">

      <div class="col-12 text-center my-2" v-if="download.isDownloading">
        <div class="w-100 py-2">
          <span class="text-primary">{{ download.name }} : {{ download.fileProgress }} %</span>
        </div>
        <div class="progress shadow-sm h-100 py-1 px-1">
          <div
            class="progress-bar text-black-50 rounded"
            role="progressbar"
            :style="{ width:  download.fileProgress + '%' }"
            style="height: 15px"
            :aria-valuenow="download.fileProgress"
            aria-valuemin="0"
            aria-valuemax="100"
          ></div>
        </div>
      </div>

      <template v-if="download.is_new">
        <div class="col-12 col-sm-12 col-md-9 m-0">
          <div class="custom-file shadow-sm">
            <input
              type="file"
              class="custom-file-input shadow-none"
              id="file"
              @change="$_PictureDownloading_fileInputChange(download)"
            >
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
          <img class="img-fluid-center" :src="download.path">
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
      messages: [],
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
      this.$_PictureDownloading_messageFade();
      if (this.downloads.length === 0) this.$_PictureDownloading_addFile();
    });
  },

  methods: {
    $_PictureDownloading_messageFade: function() {
      $(".alert")
        .delay(2200)
        .slideUp(2000, function() {
          $(this).remove();
        });
    },

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
        return this.messages.push({
          type: "success",
          text: "Удалено"
        });
      }

      axios
        .delete("/picture/" + this.downloads[index].id)
        .then(res => {
          if (res.data.result === true) {
            this.downloads.splice(index, 1);
            return this.messages.push({
              type: "success",
              text: "Файл успешно удален"
            });
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
        return this.messages.push({
          type: "error",
          text: "Файл для загрузки не был выбран"
        });
      }

      if (this.uploadableTypes.indexOf(download.file.type) === -1) {
        return this.messages.push({
          type: "error",
          text: "Неверный тип загружаемого файла"
        });
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
          download.path = `/storage/${res.data.path}`;
        })
        .catch(err => {
          console.error(err);
        });

      download.isDownloading = false;
    }
  }
};
</script>
