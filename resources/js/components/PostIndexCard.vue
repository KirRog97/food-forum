<template>
  <div class="post-list-item" v-loading="isComponentLoading">
    <div class="post-list-images">
      <div class="post-author w-100 rounded-pill px-2 py-1 mt-2">
        <el-row class="w-100" type="flex" justify="center" align="middle">
          <el-col :span="18">
            <div class="post-author-name p-0">
              <h5>
                <a
                  :href="`/users/${userid}`"
                  data-toggle="tooltip"
                  data-placement="bottom"
                  title="Просмотреть профиль"
                >
                  <span>{{ username }}</span>
                </a>
              </h5>
            </div>
          </el-col>
          <el-col :span="6">
            <div class="post-list-photo-author rounded-circle">
              <el-avatar
                class="img-fluid-center"
                shape="circle"
                fit="contain"
                :src="useravatarpath"
                :size="50"
                alt="User picture"
              >
                <img src="/images/icons/user_avacado.svg" />
              </el-avatar>
            </div>
          </el-col>
        </el-row>
      </div>
      <el-image
        class="img-fluid-center w-100"
        fit="cover"
        :src="postpicturepath"
        :preview-src-list="photoList"
        alt="Post picture"
      >
      </el-image>
    </div>
    <div class="post-list-title">
      <h3>
        <a :href="`/posts/${post.id}`">
          <span>{{ post.title }}</span>
        </a>
      </h3>
    </div>
    <div class="post-list-specification m-auto">
      <div class="post-list-specification-line">
        <span>
          <i class="far fa-clock fa-lg"></i>
          {{ post.TTC }} минут
        </span>
      </div>
      <div class="post-list-specification-line">
        <span>
          <i class="fas fa-chart-pie fa-lg"></i>
          {{ post.COP }} порции
        </span>
      </div>
      <div class="post-list-specification-line">
        <span>
          <i class="fas fa-running fa-lg"></i>
          {{ post.Kcal }} Ккал
        </span>
      </div>
    </div>
    <div class="post-list-ingredients w-100">
      <el-popover
        placement="right"
        :title="`Ингредиенты ${post.title}`"
        trigger="click"
      >
        <el-table max-height="250" :data="postingredients" border stripe>
          <el-table-column
            type="index"
            width="32"
            align="center"
            label="№"
          ></el-table-column>
          <el-table-column
            width="200"
            property="name"
            label="Имя"
          ></el-table-column>
          <el-table-column
            width="100"
            align="center"
            property="pivot.amount"
            label="Грамм"
          ></el-table-column>
        </el-table>
        <el-button
          class="text-primary font-weight-normal"
          type="text"
          slot="reference"
        >
          Ингредиенты
        </el-button>
      </el-popover>
    </div>
    <div class="post-socials-widgets">
      <like-button :post_id="parseInt(post.id)"></like-button>

      <div class="widget-facebook">
        <a href="" class="btn-facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
      </div>
      <div class="widget-vk">
        <a href="" class="btn-vk">
          <i class="fab fa-vk"></i>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showIngredients: false,
      isComponentLoading: true,
      photoList: [this.postpicturepath]
    };
  },
  mounted() {
    this.$nextTick(() => {
      setTimeout(() => {
        this.isComponentLoading = false;
      }, 800);
    });
  },
  props: {
    post: {
      type: Object
    },
    postingredients: {
      type: Array
    },
    postpicturepath: {
      type: String
    },
    userid: {
      type: String
    },
    username: {
      type: String
    },

    username: {
      type: String
    },
    useravatarpath: {
      type: String
    }
  }
};
</script>
