<template>
  <div class="recipe-list-item" v-loading="isComponentLoading">
    <div class="recipe-list-images">
      <div class="recipe-author w-100 rounded-pill px-2 py-1 mt-2">
        <el-row class="w-100" type="flex" justify="center" align="middle">
          <el-col :span="18">
            <div class="recipe-author-name p-0">
              <h5>
                <a
                  :href="`/users/${userid}`"
                  data-toggle="tooltip"
                  data-placement="bottom"
                  title="Просмотреть профиль"
                >
                  <span>
                    {{ username }}
                  </span>
                </a>
              </h5>
            </div>
          </el-col>
          <el-col :span="6">
            <div class="recipe-list-photo-author rounded-circle">
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
    <div class="recipe-list-title">
      <h3>
        <a :href="`/posts/${postid}`">
          <span>
            {{ posttitle }}
          </span>
        </a>
      </h3>
    </div>
    <div class="recipe-list-specification m-auto">
      <div class="recipe-list-specification-line">
        <span>
          <i class="far fa-clock fa-lg"></i>
          {{ postttc }} минут
        </span>
      </div>
      <div class="recipe-list-specification-line">
        <span>
          <i class="fas fa-chart-pie fa-lg"></i>
          {{ postcop }} порции
        </span>
      </div>
      <div class="recipe-list-specification-line">
        <span>
          <i class="fas fa-running fa-lg"></i>
          {{ postkcal }} Ккал
        </span>
      </div>
    </div>
    <div class="recipe-list-ingredients w-100">
      <el-popover
        placement="right"
        :title="`Ингредиенты ${posttitle}`"
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
    <div class="recipe-socials-widgets">
      <div class="widget-like">
        <a href="" class="btn-like">
          <i class="far fa-heart"></i>
          <i class="fas fa-heart" hidden></i>
          <span>1923</span>
        </a>
      </div>
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
  props: [
    "userid",
    "username",
    "useravatarpath",
    "postid",
    "postpicturepath",
    "posttitle",
    "postttc",
    "postcop",
    "postkcal",
    "postingredients"
  ]
};
</script>
