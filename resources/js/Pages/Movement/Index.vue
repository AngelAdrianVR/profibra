<template>
    <AppLayout title="Entradas y Salidas">
        <div class="flex justify-between">
            <h1 class="text-sky-800 text-xl mx-6 mt-2">Entradas y Salidas</h1>
            <h1 class="text-sky-800 text-xl mx-6 mt-2">Fecha: {{ today + '/' + currentMonth + '/' + currentYear}}</h1>
        </div>

        <div class="py-1 w-11/12 mx-auto">
      <div class="flex justify-end mb-3">
        <!-- <Link :href="route('catalogue.create')">
          <SecondaryButton class="mr-6">Agregar</SecondaryButton>
        </Link> -->
        <!-- <SecondaryButton @click="show_confirmation = true" class="mx-1" :disabled="selections.length === 0">
          <i class="fa-solid fa-trash mr-1 text-red-600"></i>
          Eliminar seleccionados
        </SecondaryButton> -->
      </div>
   

    <!-- --- Table --- -->
    <form @submit.prevent="create">
    <div class="w-full z-10">
      <div class="flex flex-col">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div
              class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg"
            >
              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                  <tr>
                    <th
                      scope="col"
                      class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                      ID
                    </th>

                    <th
                      scope="col"
                      class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >Producto
                    </th>

                    <th
                      scope="col"
                      class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                      Movimiento
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
                      Descripción
                    </th>

                  </tr>
                </thead>
                <tbody
                  class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900"
                >
                  <tr class="hover:bg-sky-200 cursor-pointer">
                    <td
                      class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap"
                    >
                      <div class="inline-flex items-center gap-x-3">
                        <label class="flex items-center">
                          <span class="ml-2 text-sm text-gray-600 dark:text-gray-400"
                            >#{{ 'product.id' }}</span
                          >
                        </label>
                      </div>
                    </td>
                    <td 
                      class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                    >
                      {{ 'product.name' }}
                    </td>
                    <td
                      class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap"
                    >
                        <select v-model="form.product_type_id" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm" name="type" id="type">
                            <option value="" selected disabled>--- Movimiento ---</option>
                            <option value="1">Entrada</option>
                            <option value="0">Salida</option>
                        </select>
                    </td>
                    <td
                      class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                    >
                      {{ 'product.presentation' }}
                    </td>
                    <td
                      class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                    >
                      {{ 'product_types[product.product_type_id - 1].name '}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <PrimaryButton class="mt-3">Enviar</PrimaryButton>
</form>
</div>

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
             
        });
        const fecha = new Date();
        const today = fecha.getDate();
        const currentMonth = fecha.getMonth() + 1;
        const currentYear = fecha.getFullYear();
         

        return {
            form, 
            today,
            currentMonth,
            currentYear,
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

    }
}
</script>
