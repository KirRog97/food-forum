<template>
  <div class="mb-8">
    <div class="w-full flex justify-center mb-4">
      <el-button-group>
        <el-button class="hover:bg-secondary-700" @click="switchTabTo(0)">
          Высший рейтинг
        </el-button>
        <el-button class="hover:bg-secondary-700" @click="switchTabTo(1)">
          Новые
        </el-button>
        <el-button class="hover:bg-secondary-700" @click="switchTabTo(2)"
          >Выбор редакции
        </el-button>
      </el-button-group>
    </div>
    <div class="w-full post-list">
      <!--
        Don't use :key="index".
        When u switches between lists count of likes start to bugging
        (staying the same according the order of indexes)
        -->
      <div class="post-list__item" v-for="post in posts" :key="post.id">
        <post-index-card :post="post"></post-index-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: [],
      maxTabs: 3,
      activeTab: 0
    };
  },
  mounted() {
    // Load only viewable first tab
    this.loadPopularPost();
    // this.loadNewPost();
    // this.loadEditorPost();
  },

  watch: {
    activeTab(newValue, oldValue) {
      switch (newValue) {
        case 0:
          this.loadPopularPost();
          break;

        case 1:
          this.loadNewPost();
          break;

        case 2:
          this.loadEditorPost();
          break;

        default:
          this.loadPopularPost();
          break;
      }
    }
  },

  methods: {
    switchTabTo(tabIndex) {
      if (this.activeTab <= this.maxTabs - 1) this.activeTab = tabIndex;
    },

    loadPopularPost() {
      axios
        .get(`/api/posts/favorites/top`)
        .then(res => {
          this.posts = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    },

    loadNewPost() {
      axios
        .get(`/api/posts/new`)
        .then(res => {
          this.posts = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    loadEditorPost() {
      axios
        .get(`/api/posts/favorites/editor-choice`)
        .then(res => {
          this.posts = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>
