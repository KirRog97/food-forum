<template>
  <div class="news-board">
    <template v-for="(newsBoardItem, index) in NewsBoard">
      <template v-if="newsBoardItem.size === 'large'">
        <news-board-item-large
          :newsBoardItem="newsBoardItem"
          :key="index"
        ></news-board-item-large>
      </template>
      <template v-else>
        <news-board-item
          :newsBoardItem="newsBoardItem"
          :key="index"
        ></news-board-item>
      </template>
    </template>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // Delivering fake data until the backend side will be created
      NewsBoard: [
        {
          id: 1762,
          title: "КУРИНЫ НОЖКИ НА ГРИЛЕ",
          pictureUrl: "/images/recipes/пельмени.jpg",
          tags: [{ name: "Вкусно", icon: "fas fa-drumstick-bite" }],
          category: "Рецепт дня",
          size: "large"
        },
        {
          id: 6782,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/recipes/пельмени.jpg",
          tags: [{ name: "Вкусно", icon: "fas fa-drumstick-bite" }],
          category: "Выбор редакции",
          size: "large"
        },
        {
          id: 12723,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/spice.jpg",
          tags: [
            { name: "Остро", icon: "fas fa-drumstick-bite" },
            { name: "Вкусно", icon: "fas fa-drumstick-bite" }
          ],
          size: "small"
        },
        {
          id: 5,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/spice.jpg",
          tags: [{ name: "Вкусно", icon: "fas fa-drumstick-bite" }],
          size: "small"
        },
        {
          id: 8,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/spice.jpg",
          tags: [
            { name: "Вкусно", icon: "fas fa-drumstick-bite" },
            { name: "Остро", icon: "fas fa-drumstick-bite" }
          ],
          size: "medium"
        },
        {
          id: 12,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/spice.jpg",
          tags: [{ name: "Вкусно", icon: "fas fa-drumstick-bite" }],
          size: "small"
        },
        {
          id: 66,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/spice.jpg",
          tags: [{ name: "Вкусно", icon: "fas fa-drumstick-bite" }],
          size: "small"
        },

        {
          id: 12,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/spice.jpg",
          tags: [{ name: "Вкусно", icon: "fas fa-drumstick-bite" }],
          size: "medium"
        },
        {
          id: 12,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/spice.jpg",
          tags: [{ name: "Вкусно", icon: "fas fa-drumstick-bite" }],
          size: "small"
        },
        {
          id: 12,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/spice.jpg",
          tags: [{ name: "Вкусно", icon: "fas fa-drumstick-bite" }],
          size: "small"
        },
        {
          id: 3,
          title: "Как приготовить пирог в одной посуде 5 рецептов",
          pictureUrl: "/images/spice.jpg",
          tags: [{ name: "Вкусно", icon: "fas fa-drumstick-bite" }],
          size: "medium"
        }
      ]
    };
  }
};
</script>
