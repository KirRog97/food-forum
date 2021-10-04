<template>
  <div :class="`news-board__item news-board__item--${newsBoardItem.size}`">
    <img
      class="img-fluid--cover absolute"
      :src="newsBoardItem.pictureUrl"
      :alt="`Изображение статьи номер ${newsBoardItem.id}`"
    />
    <div class="news-board__typography news-board__typography--base vignette">
      <div class="news-board__tag-wrapper">
        <div
          class="news-board__tag"
          v-for="(tag, index) in newsBoardItem.tags"
          :key="index"
        >
          <i :class="[tag.icon, 'mr-1']" v-if="tag.icon"></i>
          <h6>
            {{ tag.name }}
          </h6>
        </div>
      </div>

      <span class="news-board__title news-board__title--base">
        {{ newsBoardItem.title }}
      </span>
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
