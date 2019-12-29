<template>
  <div class="recipe-list-item">
    <div class="recipe-list-images">
      <div class="recipe-author w-100 rounded-pill px-2 py-1 mt-2">
        <vs-col
          vs-type="flex"
          vs-justify="center"
          vs-lg="10"
          vs-sm="10"
          vs-xs="10"
        >
          <div class="recipe-author-name p-1">
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
          </div>
        </vs-col>
        <vs-col
          vs-type="flex"
          vs-justify="center"
          vs-lg="3"
          vs-sm="3"
          vs-xs="3"
        >
          <div class="recipe-list-photo-author rounded-circle">
            <img
              class="img-fluid-center"
              :src="useravatarpath"
              alt="User picture"
            />
          </div>
        </vs-col>
      </div>
      <div>
        <a :href="`/posts/${postid}`">
          <img
            class="img-fluid-center"
            :src="postpicturepath"
            alt="Post picture"
          />
        </a>
      </div>
    </div>
    <div class="recipe-list-title">
      <a :href="`/posts/${postid}`">
        <h2>
          {{ posttitle }}
        </h2>
      </a>
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
    <div class="recipe-list-ingredients">
      <vs-button color="primary" type="line" @click="showIngredients = true">
        Ингредиенты
      </vs-button>
      <vs-popup
        style="color: rgba(var(--vs-primary),1)"
        title="Ингредиенты"
        background-color="secondary"
        background-color-popup="rgba(var(--vs-secondary),1)"
        :active.sync="showIngredients"
      >
        <vs-table
          style="background-color: rgba(var(--vs-secondary),1); border: 1px solid rgba(var(--vs-primary),1)"
          :data="ingredients"
          noDataText="Данные не обнаруженны"
        >
          <template slot="thead">
            <vs-th style="background-color: rgba(var(--vs-secondary),1)">
              Название ингредиента
            </vs-th>
            <vs-th style="background-color: rgba(var(--vs-secondary),1)">
              Количество
            </vs-th>
          </template>

          <template slot-scope="{ ingredients }">
            <vs-tr :key="indextr" v-for="(tr, indextr) in ingredients">
              <vs-td :data="data[indextr].ingredient.name">
                {{ data[indextr].ingredient.name }}
              </vs-td>
              <vs-td :data="data[indextr].showIngredients.amount">
                {{ data[indextr].showIngredients.amount }}
              </vs-td>
            </vs-tr>
          </template>
        </vs-table>
      </vs-popup>
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
      showIngredients: false
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
    "postkcal"
  ]
};
</script>
