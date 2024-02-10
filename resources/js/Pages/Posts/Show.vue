<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PostIngredientsTable from "@/Components/PostIngredientsTable.vue";
import LikeButton from "@/Components/LikeButton.vue";
import PostOptions from "@/Components/PostShowOptions.vue";
import PostTags from "@/Layouts/PostShowTags.vue";

defineProps({
  post: {
    type: Object,
    default: {},
  },
});
</script>
<template>
  <AppLayout>
    <!-- ToDo: Look at this stuff! Make any similar design! -->
    <!-- https://www.deliciousmagazine.co.uk/recipes/hake-croquetas-with-aioli/ -->

    <Head :title="`Рецепт ${post.title}`" />

    <div class="flex flex-auto flex-wrap mx-auto">
      <div class="relative w-full bg-secondary-300">
        <div class="relative pb-2/3">
          <img
            class="absolute h-full w-full object-cover"
            :src="`${post.pictures.path ?? '/images/login_background.jpg'}`"
            alt="Post image"
          />
        </div>

        <div
          class="absolute bottom-0 w-full h-10 sm:h-12 flex justify-between items-center bg-gray-800 bg-opacity-85 px-4 py-2"
        >
          <LikeButton :postId="post.id" :initialLikeCount="post.likes_count" />

          <template v-if="$page.props.auth.user?.id === post.user.id">
            <Link
              class="text-base text-primary-500 hover:text-primary-700"
              :href="route('posts.edit', { post: post })"
              method="GET"
            >
              <i class="far fa-edit mr-1"></i>
              <span>Редактировать</span>
            </Link>
          </template>

          <a class="text-base text-primary-500 hover:text-primary-700" href="">
            <i class="far fa-bookmark mr-1"></i>
            <span>Добавить в закладки</span>
          </a>
        </div>
      </div>

      <div
        class="flex flex-auto flex-wrap justify-center bg-gray-300 px-6 py-8 mx-auto space-y-6 sm:space-y-8"
      >
        <div class="flex justify-center flex-wrap">
          <h1
            class="text-4xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2"
          >
            {{ post.title }}
          </h1>

          <PostTags :post="post" />

          <p
            class="w-full text-base sm:text-lg text-secondary-800 leading-snug sm:leading-normal"
          >
            {{ post.description }}
          </p>
        </div>

        <PostOptions :post="post" />

        <div class="flex justify-center flex-wrap">
          <h2
            class="text-3xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2"
          >
            Используемые ингредиенты
          </h2>
          <PostIngredientsTable :ingredients="post.ingredients" />
        </div>

        <div class="flex justify-center flex-wrap">
          <h2
            class="text-3xl text-primary-600 text-center leading-tight font-handwritten mb-1 sm:mb-2"
          >
            Способ приготовления
          </h2>
          <p
            class="w-full text-base sm:text-lg text-secondary-800 leading-snug sm:leading-normal"
          >
            {{ post.instruction }}
          </p>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
