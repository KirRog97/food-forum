<template>
  <div class="news-board__item news-board__item--large">
    <!-- Placeholder -->
    <img
      class="img-fluid--cover"
      src="/images/recipes/пельмени.jpg"
      :alt="`Изображение новости`"
    />

    <!-- <img
      class="img-fluid--cover"
      :src="`${newsBoardItem.picture.path}`"
      alt="Изображение новости"
    /> -->
    <div
      class="news-board__typography news-board__typography--large bg-vignette"
    >
      <span class="news-board__category">
        {{ newsBoardItem.category }}
      </span>
      <span class="news-board__title news-board__title--large">
        {{ newsBoardItem.title }}
      </span>
      <div class="news-board__accessory">
        <div class="news-board__accessory__line"></div>
        <div class="news-board__accessory__logo">
          <i class="fas fa-hotdog fa-2x"></i>
        </div>
        <div class="news-board__accessory__line"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    newsBoardItem: {
      type: Object,
      default: {}
    }
  }
};
</script>
