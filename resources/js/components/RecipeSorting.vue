<template>
  <div class="recipe-list">
    <div class="recipe-list-item" v-for="(recipe, index) in recipes" :key="index">
      <div class="recipe-list-box">
        <div class="recipe-list-images position-relative d-flex">
          <div class="recipe-author rounded-pill bg-dark50 w-auto px-2 py-1 mt-2">
            <div class="recipe-author-name p-1">
              <a
                :href="userId"
                data-toggle="tooltip"
                data-placement="bottom"
                title="Просмотреть профиль"
              >
                <span>{{ user.name }}</span>
              </a>
            </div>

            <div class="recipe-list-photo-author rounded-circle ml-1">
              <img src="/images/icons/user_avacado.svg" alt="User_avatar">
            </div>
          </div>
          <div class="recipe-list-photo w-100">
            <img src="/images/recipes/блины.jpg" alt="Blin">
          </div>
        </div>
        <div class="recipe-list-title">
          <h2>
            <a
            :href="postId"
            >
              <span>{{ recipe.title }}</span>
            </a>
          </h2>
        </div>
        <div class="recipe-list-specification m-auto">
          <div class="recipe-list-specification-line">
            <i class="far fa-clock fa-lg mr-1"></i>
            <span>{{ recipe.TTC }} минут</span>
          </div>
          <div class="recipe-list-specification-line">
            <i class="fas fa-chart-pie fa-lg mr-1"></i>
            <span>{{ recipe.COP }} порции</span>
          </div>
          <div class="recipe-list-specification-line">
            <i class="fas fa-running fa-lg mr-1"></i>
            <span>{{ recipe.Kcal }} Ккал</span>
          </div>
        </div>
        <div class="recipe-list-ingredients">
          <a href>Редиска</a>
          <a href>Редиска</a>
          <a href>Редиска</a>
          <a href>Редиска</a>
        </div>
        <div class="recipe-socials-widgets">
          <div class="widget-like">
            <a href class="btn-like">
              <i class="far fa-heart"></i>
              <i class="fas fa-heart" hidden></i>
              <span>1923</span>
            </a>
          </div>
          <div class="widget-facebook">
            <a href class="btn-facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
          <div class="widget-vk">
            <a href class="btn-vk">
              <i class="fab fa-vk"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: false,
      //check this method
      userId: `/users/${user.id}`,
      postId: `/posts/${post.id}`,
      urldata: []
    };
  },

  mounted() {
    this.$_RecipeSorting_getData();
  },

  methods: {
    $_RecipeSorting_getData: function() {
      axios
        .get("/recipes/recipe-filter")
        .then(res => {
          console.log(res);
          this.urldata = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>
