<template>
    <AppLayout title="Inventario">
        <h1 class="text-sky-800 text-xl mx-6 mt-2">Inventario</h1>
        <div class="py-1 w-11/12 mx-auto">
            <div class="flex justify-end mb-3">
                <a :href="route('inventory.generate-consumables-report')">
                    <SecondaryButton class="mx-1">
                        <i class="fa-solid fa-file-lines mr-1"></i>
                        Generar reporte
                    </SecondaryButton>
                </a>
                <SecondaryButton @click="show_confirmation = true" class="mx-1" :disabled="selections.length === 0">
                    <i class="fa-solid fa-trash mr-1 text-red-600"></i>
                    Eliminar seleccionados
                </SecondaryButton>
            </div>

            <!-- table -->
            <div class="w-full z-10">
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <div class="flex items-center gap-x-3">
                                                    <label class="flex items-center">
                                                        <Checkbox @click="selectAll" />
                                                        <span
                                                            class="ml-2 text-sm text-gray-600 dark:text-gray-400">ID</span>
                                                    </label>
                                                </div>
                                            </th>

                      <th
                        scope="col"
                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                      >
                        Material
                      </th>

                      <th
                        scope="col"
                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                      >
                        Cantidad
                      </th>

                      <th
                        scope="col"
                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                      >
                        Cantidad maxima
                      </th>

                      <th
                        scope="col"
                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                      >
                        Cantidad minima
                      </th>

                      <th
                        scope="col"
                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                      >
                        Punto de reabastesimiento
                      </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Fecha del ultimo conteo
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        <tr v-for="inventory in inventories.data" :key="inventory.id"
                                        class="hover:bg-sky-200 cursor-pointer">
                                            <td
                                                class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                <div class="inline-flex items-center gap-x-3">
                                                    <label class="flex items-center">
                                                        <input type="checkbox" :id="inventory.id" :value="inventory.id"
                                                            v-model="selections"
                                                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-sky-600 shadow-sm focus:ring-sky-500 dark:focus:ring-sky-600 dark:focus:ring-offset-gray-800">
                                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">#{{
                                                            inventory.id }}</span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td @click="goToEdit(inventory.id)"
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ inventory.product.name }}
                                            </td>
                                            <td @click="goToEdit(inventory.id)" class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                {{ inventory.quantity }}
                                            </td>
                                            <td @click="goToEdit(inventory.id)"
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ inventory.product.max_quantity }}
                                            </td>
                                            <td @click="goToEdit(inventory.id)"
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ inventory.product.min_quantity }}
                                            </td>
                                            <td @click="goToEdit(inventory.id)"
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ inventory.product.supply_point }}
                                            </td>
                                            <td @click="goToEdit(inventory.id)"
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ inventory.last_count_date }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                      </td>
                      <td
                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                      >
                        {{ inventory.product.name }}
                      </td>
                      <td
                        class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                      >
                        {{ inventory.quantity }}
                      </td>
                      <td
                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                      >
                        {{ inventory.product.max_quantity }}
                      </td>
                      <td
                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                      >
                        {{ inventory.product.min_quantity }}
                      </td>
                      <td
                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                      >
                        {{ inventory.product.supply_point }}
                      </td>
                      <td
                        class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                      >
                        {{ inventory.last_count_date }}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <Pagination :pagination="inventories" />
        </div>

        <ConfirmationModal :show="show_confirmation" @close="show_confirmation = false">
            <template #title>
                Eliminar selecciones
            </template>
            <template #content>
                Estas a punto de eliminar elementos del inventario, continuar?
            </template>
            <template #footer>
                <SecondaryButton @click="show_confirmation = false" class="mr-2">Cancelar</SecondaryButton>
                <DangerButton @click="deleteSelections">Si, eliminar</DangerButton>
            </template>
        </ConfirmationModal>
    </AppLayout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Checkbox from '@/Components/Checkbox.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import Pagination from '@/Components/MyComponents/Pagination.vue';

export default {
    data() {
        return {
            selections: [],
            show_confirmation: false,
        }
    },
    components: {
        AppLayout,
        SecondaryButton,
        DangerButton,
        Checkbox,
        ConfirmationModal,
        Link,
        Pagination,
    },
    props: {
        inventories: Object,
    },
    methods: {
        selectAll() {
            const items_selected = this.selections.length
            this.selections = [];
            if (items_selected !== this.inventories.data.length) {
                this.inventories.data.forEach(inventory => this.selections.push(inventory.id));
            }
        },
        deleteSelections() {
            this.$inertia.post(route('inventory.delete'), { selections: this.selections });
            this.show_confirmation = false;
        },
        goToEdit(inventory_id) {
            this.$inertia.get(route('inventory.edit', inventory_id));
        },
    }
}
</script>
