<template>
    <nav v-if="pagination.meta.links.length > 3" aria-label="Pagination" class="
        inline-flex
        -space-x-px
        rounded-md
        shadow-sm
        bg-white
      ">
      <template v-for="(link, key) in pagination.meta.links">
        <div :key="key" v-if="link.url == null" class="
            inline-flex
            items-center
            px-3
            py-2
            text-sm
            border
            text-gray-400
          " v-html="link.label"></div>
        <Link :key="'link-' + key" v-else :href="link.url" class="
            inline-flex
            items-center
            px-3
            py-2
            text-sm
            font-semibold
            border
            " :class="link.active ? 'bg-sky-200 text-gray-900  ' : ''" v-html="link.label" />
      </template>
    </nav>
  </template>
  
  <script>

  import { Link } from "@inertiajs/vue3";
  
  export default {
    components: {
      Link,
    },
    props: {
      pagination: Object,
    },
  };
  </script>