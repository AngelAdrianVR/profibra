<template>
    <AppLayout title="Usuarios">
        <h1 class="text-sky-800 text-xl mx-6 mt-2">Lista de usuarios</h1>
        <div class="py-1">
            <div class="flex justify-end mb-3">
                <Link :href="route('user.create')">
                <SecondaryButton class="mr-6">Crear nuevo</SecondaryButton>
                </Link>
            </div>

            <div class="w-full mx-auto z-10">
                <div class="flex flex-col lg:grid grid-cols-2 gap-2">
                    <div v-for="user in users.data" :key="user.id"
                        class="bg-white border border-white shadow-lg rounded-2xl p-2 mx-3 my-1 hover:bg-slate-200">
                        <Link :href="route('user.edit', user.id)">
                        <div class="flex">
                            <div class="relative h-16 w-16 mr-2">
                                <img class="h-16 w-16 rounded-full object-cover border-4"
                                :class="user.is_active ? 'border-green-400' : 'border-red-400'"
                                    :src="user.profile_photo_url" :alt="user.name">
                            </div>
                            <section class="flex flex-col flex-1">
                                <div class="flex justify-between">
                                    <h1 class="text-xs font-bold"># Empleado: {{ user.employee_number }} | {{ user.name }}
                                    </h1>
                                    <span v-if="user.is_active"
                                        class="bg-green-100 text-green-700 text-xs px-2 py-px rounded-lg">Activo</span>
                                    <span v-else
                                        class="bg-red-100 text-red-700 text-xs px-2 py-px rounded-lg">Inactivo</span>
                                </div>
                                <p class="text-xs text-gray-500">
                                    Ingresó el:
                                    {{ user.created_at }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    <i class="fa-regular fa-envelope mr-1"></i>
                                    {{ user.email }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    <i class="fa-solid fa-user-tag"></i>
                                    {{ user.is_admin ? 'Administrador' : 'Trabajador' }}
                                </p>
                            </section>
                        </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';

export default {
    data() {
        return {

        }
    },
    components: {
        AppLayout,
        SecondaryButton,
        Link,
    },
    props: ['users'],
}
</script>