<template>
  <vs-row vs-type="flex" vs-justify="center">
    <vs-col vs-type="flex" vs-justify="center">
      <vs-avatar size="150px" text="" :src="avatar" />
    </vs-col>
    <vs-col vs-type="flex" vs-justify="center">
      <a :href="`users/${id}`">
        <h5 class="text-center px-1 py-2">
          {{ username }}
        </h5>
      </a>
    </vs-col>
    <vs-col vs-type="flex" vs-justify="center">
      <vs-button :href="`users/${id}`" color="primary" type="line">
        Список рецептов
      </vs-button>
    </vs-col>
  </vs-row>
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
