<script setup>

import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center my-1 py-2 px-2 bg-gradient-to-r from-slate-700 to-sky-700 font-semibold text-sm leading-5 text-white rounded-lg w-full'
        : 'inline-flex items-center my-1 text-sm font-medium text-gray-700 py-2 px-2 hover:bg-gradient-to-r from-slate-700 to-blue-500 hover:text-white rounded-lg w-full';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
