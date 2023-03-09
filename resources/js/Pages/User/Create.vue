<template>
    <AppLayout title="Crear usuario">
        <div class="flex justify-between">
            <div class="flex justify-start cursor-pointer">
                <Link :href="route('user.index')" class="flex items-center mt-2 text-sky-700">
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
            <h1 class="text-sky-800 text-xl mx-6 mt-2">Crear usuario</h1>
        </div>

        <form @submit.prevent="create" class="bg-gray-50 rounded-md shadow-md px-4 py-3 mx-5 my-4">
            <div class="mb-3">
                <InputLabel for="name" value="Nombre *" />
                <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required autofocus />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="mb-3">
                <InputLabel for="email" value="Correo electronico *" />
                <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div class="mb-3">
                <InputLabel for="employee_number" value="Numero de empleado *" />
                <TextInput id="employee_number" v-model="form.employee_number" type="text" class="mt-1 block w-full" required />
                <InputError class="mt-2" :message="form.errors.employee_number" />
            </div>
            <div class="mb-3">
                <InputLabel for="password" value="Contraseña generada" />
                <TextInput id="password" v-model="form.password" type="text" class="mt-1 block w-full" disabled />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <PrimaryButton>Crear</PrimaryButton>

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
            name: null,
            email: null, 
            employee_number: null,
            password: this.password
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
    props: ['password'],
    methods: {
        create() {
            this.form.post(route('user.store'));
        }
    }
}
</script>
