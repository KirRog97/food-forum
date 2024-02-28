<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PostIngredientsTable from "@/Components/PostIngredientsTable.vue";
import LikeButton from "@/Components/LikeButton.vue";
import PostOptions from "@/Components/PostShowOptions.vue";
import PostShare from "@/Layouts/PostShare.vue";
import PostShowPopularRequests from "@/Layouts/PostShowPopularRequests.vue";
import PostShowSectionLayout from "@/Layouts/PostShowSectionLayout.vue";
import PostShowTags from "@/Layouts/PostShowTags.vue";
import PostShowInstructionCard from "@/Components/PostShowInstructionCard.vue";
import { computed } from "vue";

const props = defineProps({
  post: {
    type: Object,
    default: {},
  },
});

const sortedByOrderInstructions = computed(() => {
  return props.post.instructions.sort((a, b) => a.order - b.order);
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
          <n-image
            class="absolute h-full w-full"
            :img-props="{ class: 'w-full h-full' }"
            object-fit="cover"
            fallback-src="/images/login_background.jpg"
            :src="post.pictures.path"
            alt="Post image"
          />
        </div>

        <div
          class="absolute bottom-0 w-full h-10 sm:h-12 flex justify-between items-center bg-gray-800 bg-opacity-85 px-4 py-2"
        >
          <LikeButton :postId="post.id" :initialLikeCount="post.likes_count" />

          <Link
            v-if="$page.props.auth.user?.id === post.user.id"
            :href="route('posts.edit', { post: post })"
            method="GET"
            class="text-base text-primary-500 hover:text-primary-700"
          >
            <i class="far fa-edit mr-1"></i>
            <span>Редактировать</span>
          </Link>

          <a class="text-base text-primary-500 hover:text-primary-700" href="">
            <i class="far fa-bookmark mr-1"></i>
            <span>Добавить в закладки</span>
          </a>
        </div>
      </div>

      <div
        class="flex flex-auto flex-wrap justify-center bg-gray-300 px-6 py-8 mx-auto space-y-6 sm:space-y-8"
      >
        <div
          class="w-full flex flex-col md:flex-row justify-center align-items-start"
        >
          <PostShowSectionLayout>
            <template #heading>Поделиться рецептом</template>
            <template #content>
              <PostShare />
            </template>
          </PostShowSectionLayout>
          <PostShowSectionLayout>
            <template #heading>Популярные запросы</template>
            <template #content>
              <PostShowPopularRequests />
            </template>
          </PostShowSectionLayout>
        </div>

        <PostShowSectionLayout>
          <template #heading> {{ post.title }}</template>
        </PostShowSectionLayout>

        <PostOptions :post="post" />
        <PostShowTags :post="post" />

        <PostShowSectionLayout>
          <template #heading>Описание рецепта</template>
          <template #content>
            <p
              class="w-full text-lg text-secondary-800 leading-snug sm:leading-normal mt-4"
            >
              {{ post.description }}
            </p>
          </template>
        </PostShowSectionLayout>

        <PostShowSectionLayout>
          <template #heading>Используемые ингредиенты</template>
          <template #content>
            <PostIngredientsTable :ingredients="post.ingredient_posts" />
          </template>
        </PostShowSectionLayout>

        <PostShowSectionLayout>
          <template #heading> Способ приготовления</template>
          <template #content>
            <PostShowInstructionCard
              v-for="instruction in sortedByOrderInstructions"
              :key="instruction.order"
              :instruction="instruction"
            />
          </template>
        </PostShowSectionLayout>
      </div>
    </div>
  </AppLayout>
</template>
