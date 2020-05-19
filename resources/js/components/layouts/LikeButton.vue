<template>
  <div class="widget-like">
    <el-button
      :class="{ 'el-button--danger': liked }"
      round
      size="small"
      @click="sendReaction()"
    >
      <transition
        enter-active-class="animated zoomIn slow"
        leave-active-class="animated zoomOut slow"
        appear
        css
      >
        <i class="fas fa-heart" v-if="liked"></i>
        <i class="far fa-heart " v-else></i>
      </transition>
      <span>{{ likeCount }}</span>
    </el-button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      likeCount: 0,
      liked: false
    };
  },
  props: {
    post_id: {
      type: Number
    }
  },
  mounted() {
    this.$nextTick(function() {
      this.checkLikeCount();
      this.checkLikeStatus();
    });
  },
  methods: {
    checkLikeCount() {
      axios
        .post(`/api/favorites/${this.post_id}/count`)
        .then(res => {
          this.likeCount = res.data.likeCount;
        })
        .catch(err => {
          console.error(err);
        });
    },
    checkLikeStatus() {
      axios
        .post(`/api/favorites/${this.post_id}/status`)
        .then(res => {
          this.liked = res.data.liked;
        })
        .catch(err => {
          console.error(err);
        });
    },
    sendReaction() {
      axios
        .post(`/api/favorites/${this.post_id}/action`)
        .then(res => {
          if (res.data.reaction === "Like") {
            this.liked = true;
            return this.likeCount++;
          }
          if (res.data.reaction === "UnLike") {
            this.liked = false;
            return this.likeCount--;
          }
        })
        .catch(err => {
          console.error(err);
          //  If our user is a guest
          if (err.response.status === 401) {
            return this.$snotify.simple(
              "Войдите в аккаунт, чтобы поставить отметку.",
              "Понравился рецепт?",
              {
                showProgressBar: true,
                timeout: 2500
              }
            );
          }
          return this.$snotify.error(`${err}`, "sendReaction", {
            showProgressBar: false,
            timeout: 1500
          });
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.widget-like {
  flex-grow: 2;
  margin: 0;
  padding: 0;
  text-align: left;

  button {
    outline: none;
    i {
      margin-right: 0.25em;
    }
  }
}
</style>
