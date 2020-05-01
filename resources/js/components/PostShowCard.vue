<template>
  <div class="container-fluid mb-5 p-0">
    <div class="row no-gutters mb-1">
      <div
        class="col-4 col-sm-3 col-lg-auto d-flex justify-content-center p-0 m-0"
      >
        <el-avatar
          class="img-fluid-center"
          shape="circle"
          fit="contain"
          :src="useravatarpath"
          :size="72"
          alt="User picture"
        >
          <img src="/images/icons/user_avacado.svg" />
        </el-avatar>
      </div>
      <div class="col-8 col-sm-9 col-lg-10 d-flex flex-wrap">
        <div class="col-12">
          <h5 class="font-weight-light m-0">
            {{ username }}
          </h5>
        </div>
        <div class="col-8 d-flex flex-wrap justify-content-between">
          <p class="w-50 text-wrap font-weight-light m-0">
            Добавлен комментарий
          </p>
          <p class="w-25 font-weight-light m-0">
            12.12.2014
          </p>
        </div>
      </div>
    </div>

    <div class="row no-gutters">
      <div class="col-5">
        <el-image
          class="img-fluid-center w-100"
          fit="cover"
          :src="postpicturepath"
          :preview-src-list="photoList"
          alt="Post picture"
        >
        </el-image>
      </div>
      <div class="col-7 text-center px-2 m-auto">
        <h3>
          <a :href="`/posts/${postid}`">
            <span>
              {{ posttitle }}
            </span>
          </a>
        </h3>
        <div class="recipe-socials-widgets border-0">
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

        <div class="recipe-list-ingredients w-100">
          <el-popover
            placement="right"
            :title="`Ингредиенты ${posttitle}`"
            trigger="click"
          >
            <el-table border max-height="250" :data="postingredients">
              <el-table-column type="index" width="36" label="№">
              </el-table-column>
              <el-table-column width="170" property="name" label="Имя">
              </el-table-column>
              <el-table-column
                width="100"
                align="center"
                property="pivot.amount"
                label="Грамм"
              ></el-table-column>
            </el-table>
            <el-button
              class="text-secondary font-weight-normal"
              type="text"
              slot="reference"
            >
              Ингредиенты
            </el-button>
          </el-popover>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      photoList: [this.postpicturepath]
    };
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

<style lang="scss" scoped></style>
