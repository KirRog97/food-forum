<script setup>
import { NButton, NImage, NPopover, NScrollbar } from "naive-ui";
import { h } from "vue";

defineProps({
  ingredients: {
    type: Object,
    default: {},
  },
});

const ingredientTableColumns = [
  {
    title: "Наименование",
    key: "name",
    render(row) {
      const ingNameWithCard = () => {
        return h(
          NPopover,
          {
            trigger: "click",
            scrollable: true,
            style: "max-width: 400px",
          },
          {
            trigger: () => h("span", row.name),
            default: () => rederCustomIngCard(row),
          }
        );
      };
      return h(ingNameWithCard);
    },
  },
  {
    title: "Грамм",
    key: "pivot.amount",
  },
];

function rederCustomIngCard(row) {
  return h(
    "div",
    { class: " flex flex-col justify-center items-center space-y-2" },
    [
      h(NImage, {
        width: "100%",
        objectFit: "cover",
        circle: true,
        src: row.picture.path,
      }),
      h(NScrollbar, { style: "max-height: 162px", trigger: "none" }, [
        h("p", { class: "text-base overflow-hidden p-1" }, [row.description]),
      ]),
      h(NButton, { primary: true, tag: "a", href: `/ingredients/${row.id}` }, [
        "Перейти к ингредиенту",
      ]),
    ]
  );
}
</script>

<template>
  <div class="w-full">
    <n-data-table
      class="h-fit"
      :columns="ingredientTableColumns"
      :data="ingredients"
    />
  </div>
</template>
