<template>
  <div class="flex flex-col mb-5 p-0">
    <!-- Avatar, Usename, Action, Date -->
    <div class="grid grid-cols-12 gap-1 mb-2">
      <!-- Avatar -->
      <div class="post-list__item flex justify-center p-0 m-0">
        <el-avatar
          class="w-full h-full object-cover"
          shape="circle"
          :src="post.user.avatar.path"
          :size="40"
          alt="User picture"
        >
          <img src="/images/icons/user_avacado.svg" />
        </el-avatar>
      </div>

      <!-- Usename -->
      <div class="col-span-6 flex flex-col justify-start">
        <span class="text-lg text-secondary-700 tracking-wide leading-none">
          {{ post.user.username }}
        </span>

        <!-- Action -->
        <span class="text-base text-secondary-700 font-light">
          Добавлен комментарий
        </span>
      </div>

      <!-- Date -->
      <div class="col-span-4 md:col-span-5  flex  justify-start items-end">
        <span class="text-base text-secondary-700 font-light">
          12.12.2014
        </span>
      </div>
    </div>

    <div
      class="grid grid-cols-12 grid-rows-6 gap-0 bg-secondary-50 rounded overflow-hidden"
    >
      <div class="col-span-5 row-span-6">
        <el-image
          class="w-full h-full"
          fit="cover"
          :src="post.pictures.path"
          :preview-src-list="photoList"
          alt="Post picture"
        >
        </el-image>
      </div>

      <!-- Post Title-->
      <div
        class="col-span-7 row-span-2 flex justify-center items-center overflow-x-hidden overflow-y-auto px-2 py-3"
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

      <!-- Post Comment-->
      <div class="col-span-7 row-span-3 px-2 py-3">
        <p
          class="h-24 text-lg text-secondary-700 leading-tight bg-secondary-100 rounded overflow-x-hidden overflow-y-auto px-2 py-1 mb-2"
        >
          {{ testComment }}
          <span class="text-teal-600 font-handwritten">
            / {{ testComment.length }}
          </span>
        </p>
        <button>
          <a
            class="block text-base md:text-lg text-secondary500 bg-primary-300 border border-primary-400 rounded px-2 py-1"
            href="#"
          >
            Ответить
          </a>
        </button>
      </div>

      <!-- Post Like, Share-->
      <div
        class="col-span-7 row-span-1 w-full h-full flex justify-between items-center border-t border-secondary-100 px-2 py-1"
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
      photoList: [this.post.pictures.path],
      testComment:
        "Я в шоке от вашего рецепта! Даже наш кот из дома сбежал в знак протеста против ваших гнилых рецептов. Я потеряла семью, работу, кота и шторы только из-за вашего рецепта. Хотя шторы, наверное, вина. lorem ipsum lorem ipsum"
    };
  },
  props: {
    post: {
      type: Object
    }
  }
};
</script>

<style lang="scss" scoped></style>
