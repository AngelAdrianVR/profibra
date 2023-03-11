<template>
    <AppLayout title="Editar inventario">
        <div class="flex justify-between">
            <div class="flex justify-start cursor-pointer">
                <Link :href="route('inventory.index')" class="flex items-center mt-2 text-sky-700">
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
            <h1 class="text-sky-800 text-xl mx-6 mt-2">Editar inventario de <strong class="text-sky-400">{{ inventory.product.name }}</strong></h1>
        </div>

        <form @submit.prevent="update" class="bg-gray-50 rounded-md shadow-md px-4 py-3 mx-5 my-4">
            <div class="mb-3">
                <InputLabel for="quantity" value="Cantidad" />
                <TextInput id="quantity" v-model="form.quantity" type="number" step="0.1" class="mt-1 block w-full" required autofocus />
                <InputError class="mt-2" :message="form.errors.quantity" />
            </div>
            <div class="mb-3">
                <InputLabel for="last_count_date" value="Fecha de ultimo conteo" />
                <TextInput id="last_count_date" v-model="form.last_count_date" type="date" class="mt-1 block w-full" required />
                <InputError class="mt-2" :message="form.errors.last_count_date" />
            </div>
            <div class="flex space-x-2">
                <PrimaryButton>Guardar cambios</PrimaryButton>
            </div>

        </form>

    </AppLayout>
</template>
<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

export default {
    data() {
        const form = useForm({
            quantity: this.inventory.quantity,
            last_count_date: this.inventory.last_count_date, 
        });

        return {
            form,    
        }
    },
    components: {
        AppLayout,
        Link,
        SecondaryButton,
        PrimaryButton,
        TextInput,
        InputLabel,
        InputError,
    }, 
    props: {
        inventory: Object,
    },
    methods: {
        update() {
            this.form.put(route('inventory.update', this.inventory));
        },
    }
}
</script>
