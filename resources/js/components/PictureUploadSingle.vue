<template>
  <div class="flex flex-auto mx-auto px-0 my-3">
    <el-upload
      class="w-64"
      list-type="picture-card"
      action="/p/s/"
      :file-list="fileList"
      :on-exceed="handleExceed"
      :before-upload="beforeAvatarUpload"
      :on-success="handleSuccess"
      :before-remove="beforeRemove"
      :disabled="isLoadedOnServer"
      :auto-upload="false"
      :limit="1"
    >
      <i v-if="!isLoadedOnServer" class="el-icon-plus avatar-uploader-icon"></i>
      <i v-else class="el-icon-plus el-icon-circle-close"></i>
      <div
        class="h-full bg-secondary-300"
        slot="file"
        slot-scope="{ file }"
        v-loading="isLoading"
      >
        <img
          class="el-upload-list__item-thumbnail object-scale-down"
          :src="file.url"
          alt=""
        />
        <span class="el-upload-list__item-actions">
          <span
            class="el-upload-list__item-preview"
            @click="handlePreview(file)"
          >
            <i class="el-icon-zoom-in"></i>
          </span>
          <span
            v-if="!isLoadedOnServer"
            class="el-upload-list__item-delete"
            @click="handleDownload(file)"
          >
            <i class="el-icon-download"></i>
          </span>
          <span
            v-if="!isLoading"
            class="el-upload-list__item-delete"
            @click="handleRemove(file)"
          >
            <i class="el-icon-delete"></i>
          </span>
        </span>
      </div>
    </el-upload>
    <el-dialog :visible.sync="preview.visible" close-on-click-modal>
      <div slot="title">
        <h3>{{ preview.title }}</h3>
      </div>
      <img width="100%" :src="preview.imageUrl" alt="" />
    </el-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      fileList: [],
      preview: {
        title: "",
        imageUrl: "",
        visible: false
      },
      uploadableTypes: ["image/jpeg", "image/png", "image/bmp"],
      isLoadedOnServer: false,
      isLoading: false
    };
  },

  methods: {
    beforeAvatarUpload: function(file) {
      if (!file) {
        this.$snotify.error(
          "Файл не был выбран",
          "Ошибка загрузки изображения",
          { showProgressBar: false, timeout: 700 }
        );
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
    },

    handleDownload: async function(file) {
      this.isLoading = true;
      let form = new FormData();
      form.append("file", file.raw);

      await axios
        .post("/p/s", form)
        .then(res => {
          file.id = res.data.id;
          file.url = res.data.path;
          this.fileList.push(file);
          this.isLoading = false;
          this.isLoadedOnServer = true;
        })
        .catch(err => {
          console.error(err);
          this.isLoading = false;
          this.$snotify.error(
            `Произошла ошибка на стороне серверов. Файл не был загружен. ${err}`,
            "Ошибка загрузки изображения"
          );
        });
    },

    handleSuccess: function(res, file) {
      //   this.fileList = URL.createObjectURL(file.raw);
      this.isLoadedOnServer = true;
      this.$snotify.success(null, "Файл заргужен успешно", {
        showProgressBar: false,
        timeout: 700
      });
    },

    beforeRemove: function(file, fileList) {
      return this.$confirm(`Cancel the transfert of ${file.name} ?`);
    },

    handleRemove: function(file) {
      if (this.isLoadedOnServer === false) {
        this.fileList.splice(_.findIndex(this.fileList, file.id), 1);
        return this.$snotify.success(
          "Выбранный файл для загрузки был сброшен",
          "Загрузка изображения",
          { showProgressBar: false, timeout: 700 }
        );
      }

      axios
        .delete(`/p/d/${file.id}`)
        .then(res => {
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
        .catch(err => {
          console.error(err);
        });
    },

    handleExceed: function(files, fileList) {
      this.$snotify.warning(
        "Попытка превышения колличества заргужаемых файлов",
        "Загрузка изображения",
        { showProgressBar: false, timeout: 1200 }
      );
    },

    handlePreview: function(file) {
      this.preview.title = `Предпросмотр "${file.raw.name}"`;
      this.preview.imageUrl = file.url;
      this.preview.visible = true;
    }
  }
};
</script>

<style>
/* $primary color - #b5904e*/

.el-upload--picture-card {
  width: 100%;
  height: auto;
  border: 2px dashed #b5904e;
  background-color: transparent;
}

.el-upload-list--picture-card .el-upload-list__item {
  width: 350px;
  height: 250px;
  border: 1px solid #b5904e;
}

.avatar-uploader .el-upload {
  border: 1px dashed #b5904e;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.avatar-uploader .el-upload:hover {
  border-color: #b5904e;
}

.avatar-uploader-icon {
  font-size: 28px;
  color: #b5904e;
  width: 100%;
  height: 100%;
  line-height: 178px;
  text-align: center;
}

.el-upload-list--picture-card .el-upload-list__item-actions,
.el-upload--picture-card i {
  color: #b5904e;
}

.el-dialog__wrapper {
  background-color: rgba(0, 0, 0, 0.5);
}

.el-dialog {
  width: 65%;
  /* $secondary color */
  background-color: rgba(91, 91, 91, 0.75);
  margin-top: 10vh !important;
  border-radius: 6px;
}

.el-dialog__body {
  border-radius: 6px;
  padding: 0;
}
</style>
