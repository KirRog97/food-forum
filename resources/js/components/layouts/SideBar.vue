<template>
  <vs-sidebar
    parent="body"
    default-index="1"
    color="primary"
    class="vs-sidebar"
    spacer
    hiddenBackground
    v-model="sidebarStatus"
  >
    <div
      class="header-sidebar border-bottom border-secondary p-0"
      slot="header"
    >
      <div class="logo">
        <a href="/home">Еда</a>
      </div>
      <!-- <vs-avatar
        size="70px"
        src="https://randomuser.me/api/portraits/men/85.jpg"
      />
      <h4>
        My Name
        <vs-button color="primary" icon="more_horiz" type="flat"></vs-button>
      </h4> -->
    </div>

    <vs-sidebar-item index="1" icon="class" href="/posts">
      Книга рецептов
    </vs-sidebar-item>

    <vs-sidebar-item index="2" icon="eco" href="/ingredients">
      Ингредиенты
    </vs-sidebar-item>

    <vs-sidebar-item index="3" icon="add_circle_outline" href="/posts/create">
      Добавить рецепт
    </vs-sidebar-item>

    <vs-sidebar-item index="3" icon="brightness_5" href="/Сезонные_рецепты">
      Сезонные рецепты
    </vs-sidebar-item>
    <vs-sidebar-item index="4" icon="add_box" href="/Здоровье">
      Здоровая пища
    </vs-sidebar-item>
    <vs-sidebar-item index="5" icon="group" href="/users">
      Авторы
    </vs-sidebar-item>

    <div
      class="footer-sidebar border-top border-secondary py-3 px-1"
      slot="footer"
    >
      <vs-row vs-type="flex" vs-justify="space-around">
        <vs-col
          vs-type="flex"
          vs-justify="center"
          vs-lg="3"
          vs-sm="3"
          vs-xs="3"
        >
          <a href="" class="social_icon">
            <i class="fab fa-vk"></i>
          </a>
        </vs-col>

        <vs-col
          vs-type="flex"
          vs-justify="center"
          vs-lg="3"
          vs-sm="3"
          vs-xs="3"
        >
          <a href="" class="social_icon">
            <i class="fab fa-instagram"></i>
          </a>
        </vs-col>

        <vs-col
          vs-type="flex"
          vs-justify="center"
          vs-lg="3"
          vs-sm="3"
          vs-xs="3"
        >
          <a href="" class="social_icon">
            <i class="fab fa-instagram"></i>
          </a>
        </vs-col>

        <vs-col
          vs-type="flex"
          vs-justify="center"
          vs-lg="3"
          vs-sm="3"
          vs-xs="3"
        >
          <a href="" class="social_icon"
            ><i class="fab fa-google-plus-g"></i
          ></a>
        </vs-col>
      </vs-row>

      <vs-button class="w-100 mt-3 p-1" icon="reply" color="danger" type="flat"
        >Log Out</vs-button
      >
    </div>
  </vs-sidebar>
</template>

<script>
export default {
  data() {
    return {
      sidebarStatus: false
    };
  }
};
</script>
