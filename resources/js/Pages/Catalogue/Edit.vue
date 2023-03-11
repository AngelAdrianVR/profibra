<template>
    <AppLayout title="Editar Producto">
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
            <h1 class="text-sky-800 text-xl mx-6 mt-2">Editar Producto</h1>
        </div>

        <form @submit.prevent="update" class="bg-gray-50 rounded-md shadow-md px-4 py-3 mx-5 my-4">
            <div class="mb-3">
                <InputLabel for="name" value="Nombre *" />
                <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required autofocus />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="mb-3">
                <InputLabel for="cost" value="Costo por unidad" />
                <TextInput id="cost" v-model="form.cost" type="number" step="0.1" class="mt-1 block w-full" />
                <InputError class="mt-2" :message="form.errors.cost" />
            </div>
            <div class="mb-3">
                <InputLabel for="presentation" value="Presentación *" />
                <TextInput id="presentation" v-model="form.presentation" type="text" class="mt-1 block w-full" required />
                <InputError class="mt-2" :message="form.errors.presentation" />
            </div>
            <div class="mb-3">
                <InputLabel for="product_type" value="Tipo *" />
                <select v-model="form.product_type_id" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm" name="type" id="type">
                  <option value="" selected disabled>--- Selecciona el tipo ---</option>
                  <option v-for="type in product_types" :key="type.id" :value="type.id" >{{ type.name }}</option>
                </select>
                <InputError class="mt-2" :message="form.errors.product_type_id" />
            </div>
            <div class="mb-3">
                <InputLabel for="max_quantity" value="Cantidad Máxima *" />
                <TextInput id="max_quantity" v-model="form.max_quantity" type="number" step="0.1" class="mt-1 block w-full" />
                <InputError class="mt-2" :message="form.errors.max_quantity" />
            </div>
            <div class="mb-3">
                <InputLabel for="min_quantity" value="Cantidad Mínima *" />
                <TextInput id="min_quantity" v-model="form.min_quantity" type="number" step="0.1" class="mt-1 block w-full" />
                <InputError class="mt-2" :message="form.errors.min_quantity" />
            </div>
            <div class="mb-3">
                <InputLabel for="supply_point" value="Punto de reposición *" />
                <TextInput id="supply_point" v-model="form.supply_point" type="number" step="0.1" class="mt-1 block w-full" />
                <InputError class="mt-2" :message="form.errors.supply_point" />
            </div>
            <!-- <div class="mb-3">
                <InputLabel for="initial_inventory" value="Stock de apertura *" />
                <TextInput id="initial_inventory" v-model="form.initial_inventory" type="number" step="0.1" class="mt-1 block w-full" />
                <InputError class="mt-2" :message="form.errors.initial_inventory" />
            </div> -->

            <PrimaryButton>Actualizar</PrimaryButton>
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
     data(){
    const form = useForm({
            name: this.product.name,
            cost: this.product.cost, 
            presentation: this.product.presentation,
            product_type_id: this.product.product_type_id,
            max_quantity: this.product.max_quantity,
            min_quantity: this.product.min_quantity,
            supply_point: this.product.supply_point,
            // initial_inventory: this.product.initial_inventory,
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
        InputLabel,
        TextInput,
        InputError,
    },
    props:{
        product: Object,
        product_types: Array,
    },
    methods: {
        update() {
            this.form.put(route('catalogue.update', this.product));
        }
    }
}
</script>
