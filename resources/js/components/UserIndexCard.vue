<template>
  <el-row class="flex-wrap justify-content-center" type="flex">
    <el-col class="d-flex justify-content-center" :span="24">
      <el-avatar
        fit="contain"
        shape="circle"
        :size="150"
        :src="avatar"
        alt="User picture"
      >
        <img src="/images/icons/user_avacado.svg" />
      </el-avatar>
    </el-col>
    <el-col class="d-flex justify-content-center" :span="24">
      <a :href="`users/${id}`">
        <h5 class="text-center px-1 py-2">
          {{ username }}
        </h5>
      </a>
    </el-col>
    <el-col class="d-flex justify-content-center" :span="13">
      <el-button :href="`users/${id}`" type="warning" plain>
        Список рецептов
      </el-button>
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
