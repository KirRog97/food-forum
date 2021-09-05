<template>
  <el-row
    class="flex-wrap justify-center items-center p-3 space-y-1"
    type="flex"
  >
    <el-col class="flex justify-center" :span="24">
      <el-avatar
        fit="cover"
        shape="circle"
        :size="150"
        :src="avatar"
        alt="User picture"
      >
        <img src="/images/icons/user_avacado.svg" />
      </el-avatar>
    </el-col>
    <el-col class="flex justify-center" :span="24">
      <a
        class="text-lg sm:text-xl lg:text-2xl text-center tracking-wide leading-normal font-handwritten p-1"
        :href="`users/${id}`"
      >
        <span>
          {{ username }}
        </span>
      </a>
    </el-col>
    <el-col class="flex justify-center" :span="13">
      <button
        class="text-sm sm:text-lg text-primary-500 focus:text-primary-300 focus:bg-secondary-700 text-center leading-normal focus:border focus:border-secondary-200 rounded-lg px-1 py-2"
        type="button"
      >
        <a :href="`users/${id}/posts`"> Список рецептов</a>
      </button>
    </el-col>
  </el-row>
</template>

<script>
export default {
  data() {
    return {
      show: false
    };
  },
  props: {
    username: {
      type: String,
      default: ""
    },
    avatar: {
      type: String,
      default: ""
    },
    id: {
      type: String,
      default: 0
    }
  }
};
</script>
