<template>
    <AppLayout title="Catálogo">
        <h1 class="text-sky-800 text-xl mx-6 mt-2">Catálogo de productos</h1>
        <div class="py-1">
            <div class="flex justify-end mb-3">
                <Link :href="route('catalogue.create')">
                <SecondaryButton class="mr-6">Agregar</SecondaryButton>
                </Link>
            </div>
        </div>

        <ProductTable :products="products"/>
    </AppLayout>
</template>
<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import ProductTable from '@/Components/MyComponents/ProductTable.vue';

export default {
    components: {
        AppLayout,
        Link,
        SecondaryButton,
        ProductTable,
    },
    props: {
        products: Array,
    }
}
</script>
