<script setup>
import MessageEmptyCollection from "@/Components/MessageEmptyCollection.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Heading from "@/Layouts/Heading.vue";
import UserActivityRecipeCard from "@/Layouts/UserActivityRecipeCard.vue";
import ShowSidebar from "@/Layouts/UserShowSidebar.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
  user: {
    type: Object,
    default: {},
  },
});
</script>
<template>
  <AppLayout>
    <Head :title="`Профиль ${user.username}`" />

    <div class="grid grid-cols-12 gap-2">
      <div class="col-span-8 md:col-span-9">
        <Heading>
          <template v-if="$page.props.auth.user?.id === user.id">
            Ваша история
          </template>
          <template v-else> История {{ user.username }} </template>
        </Heading>

        <template v-if="user.recipes">
          <div class="space-y-8">
            <template v-for="recipe in user.recipes" :key="recipe.id">
              <UserActivityRecipeCard :recipe="recipe" />
            </template>
          </div>
        </template>
        <template v-else>
          <MessageEmptyCollection>
            Пользователь ещё не написал свою историю
          </MessageEmptyCollection>
        </template>
      </div>

      <div class="relative col-span-4 md:col-span-3">
        <ShowSidebar :user="user" />
      </div>
    </div>
  </AppLayout>
</template>
