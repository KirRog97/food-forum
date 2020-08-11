<template>
  <div class="grid grid-cols-6 rounded h-64" v-loading="isComponentLoading">
    <!-- Post 'image' and Post author 'name' & 'avatar'-->
    <div class="relative col-start-1 col-end-4 row-start-1 row-end-7">
      <!-- Post author 'name' & 'avatar' -->
      <div
        class="absolute bottom-0 w-full flex justify-center items-center bg-b-to-t-vignette overflow-hidden px-2 pt-4 pb-2 z-20"
      >
        <div class="w-auto flex justify-end select-none">
          <el-avatar
            class="img-fluid--cover"
            shape="circle"
            fit="contain"
            :src="useravatarpath"
            :size="40"
            alt="User picture"
          >
            <img src="/images/icons/user_avacado.svg" />
          </el-avatar>
        </div>
        <div
          class="max-w-full flex flex-auto justify-center items-center px-px sm:px-1"
        >
          <el-tooltip
            placement="top"
            :open-delay="700"
            :visible-arrow="false"
            effect="dark"
          >
            <div slot="content">
              <span class="text-base">
                Просмотреть профиль
              </span>
            </div>
            <a
              class="w-full text-base lg:text-lg text-white hover:text-primary-300 text-center tracking-wide font-light leading-tight"
              :href="`/users/${userid}`"
            >
              <span>
                {{ username }}
              </span>
            </a>
          </el-tooltip>
        </div>
      </div>
      <!--
           This h-64 'div' is blockig .el-image built-in class witch
           can sometimes(979 screen width) break(overflow)
           the bottom of PostIndexCard grid.
           This value (h-64) equal to PostIndexCard height.
      -->
      <div class="h-64">
        <el-image
          class="w-full h-full"
          fit="cover"
          :src="postpicturepath"
          :preview-src-list="photoList"
          alt="Post picture"
        >
        </el-image>
      </div>
    </div>

    <!-- Post 'title' -->
    <div
      class="col-span-3 row-span-2 flex flex-auto justify-center items-center  border-t border-r border-secondary-100 overflow-x-hidden overflow-y-auto px-2 py-3"
    >
      <a
        class="w-full max-h-full text-lg xs:text-xl sm:text-2xl text-center font-medium tracking-tight leading-tight whitespace-pre-line"
        :href="`/posts/${post.id}`"
      >
        <!-- max: 64 characters -->
        <!-- <span>Идейные соображения высшего порядка, а также укрепление и развит</span
        > -->
        <span>{{ post.title }}</span>
      </a>
    </div>

    <!-- Post tags: 'COP','TTC', 'Kcal' -->
    <div
      class="col-span-3 row-span-2 flex flex-row flex-no-wrap justify-between items-center border-r border-secondary-100 px-2 py-1 space-x-px"
    >
      <div
        class="flex justify-center items-center text-primary-500 hover:text-primary-300 hover:bg-secondary-700 border border-secondary-100 rounded-full px-2 py-2"
      >
        <span class="text-xs sm:text-sm text-center leading-tight">
          <i class="far fa-clock fa-lg"></i>
          {{ post.TTC }} мин
        </span>
      </div>
      <div
        class="flex justify-center items-center text-primary-500 hover:text-primary-300 hover:bg-secondary-700 border border-secondary-100 rounded-full px-2 py-2"
      >
        <span class="text-xs sm:text-sm text-center leading-tight">
          <i class="fas fa-chart-pie fa-lg"></i>
          {{ post.COP }} порции
        </span>
      </div>
      <div
        class="flex justify-center items-center text-primary-500 hover:text-primary-300 hover:bg-secondary-700 border border-secondary-100 rounded-full px-2 py-2"
      >
        <span class="text-xs sm:text-sm text-center leading-tight">
          <i class="fas fa-running fa-lg"></i>
          {{ post.Kcal }} ккал
        </span>
      </div>
    </div>

    <!-- Post ingredients-->
    <div
      class="col-span-3 row-span-1 w-full flex justify-center items-center border-r border-secondary-100"
    >
      <el-popover placement="right" trigger="click">
        <el-table max-height="250" :data="postingredients" border stripe>
          <el-table-column
            type="index"
            width="40"
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

        <button
          class="text-base sm:text-lg text-primary-500 focus:text-primary-300 focus:bg-secondary-700 text-center leading-normal focus:border focus:border-secondary-200 rounded-full px-3 py-2"
          type="button"
          slot="reference"
        >
          Ингредиенты
        </button>
      </el-popover>
    </div>

    <!-- Post Like, Share-->
    <div
      class="col-span-3 row-span-1 flex flex-row flex-no-wrap justify-center items-end"
    >
      <div
        class="w-full h-full flex justify-between items-center border-t border-r border-b border-secondary-100 px-2 py-1"
      >
        <div class="w-7/12 flex justify-start items-center">
          <like-button :post_id="parseInt(post.id)"></like-button>
        </div>
        <div class="w-5/12 flex justify-end items-center space-x-1">
          <a class="text-secondary-200 hover:text-blue-800 px-2" href="">
            <i class="fab fa-facebook-f fa-lg"></i>
          </a>
          <a class="text-secondary-200 hover:text-blue-800 px-2" href="">
            <i class="fab fa-vk fa-lg"></i>
          </a>
        </div>
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
