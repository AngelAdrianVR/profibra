<template>
    <AppLayout title="Agregar Producto">
        <div class="flex justify-between">
            <div class="flex justify-start cursor-pointer">
                <Link :href="route('catalogue.index')" class="flex items-center mt-2 text-sky-700">
                <i class="
                        fas
                        fa-long-arrow-alt-left
                        text-lg
                        active:bg-gray-300
                        bg-opacity-100
                        rounded-full
                        w-7
                        h-7
                        pl-1
                        ml-2
                      "></i>
                <span class="ml-1">Atrás</span>
                </Link>
            </div>
            <h1 class="text-sky-800 text-xl mx-6 mt-2">Agregar Producto</h1>
        </div>
    </AppLayout>
</template>
<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';

export default {
    components: {
        AppLayout,
        Link,
        SecondaryButton,
    }
}
</script>
