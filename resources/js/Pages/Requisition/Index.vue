<template>
    <AppLayout title="Requicisiones">
        <h1 class="text-sky-800 text-xl mx-6 mt-2">Requicisiones</h1>
    <div class="py-1 w-11/12 mx-auto">
      <div class="flex justify-end mb-3">
        <Link :href="route('requisitions.create')">
          <SecondaryButton class="mr-6">Generar Requicisión</SecondaryButton>
        </Link>
      </div>

      <!-- --- Table --- -->
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
                      <div class="flex items-center gap-x-3">
                        <label class="flex items-center">
                          <Checkbox @click="selectAll" />
                          <span class="ml-2 text-sm text-gray-600 dark:text-gray-400"
                            >ID</span
                          >
                        </label>
                      </div>
                    </th>

                    <th
                      scope="col"
                      class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                      Productos
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
                      precio
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
                          <!-- <input
                            type="checkbox"
                            :id="product.id"
                            :value="product.id"
                            v-model="selections"
                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-sky-600 shadow-sm focus:ring-sky-500 dark:focus:ring-sky-600 dark:focus:ring-offset-gray-800"
                          /> -->
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
                      ${{ 'product.cost' }}
                    </td>
                    <td
                      class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                    >
                      {{ 'product.presentation' }}
                    </td>
                    <td
                      class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"
                    >
                      {{ 'product_types[product.product_type_id - 1].name' }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


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
import Checkbox from '@/Components/Checkbox.vue';

export default {
    data() {
        const form = useForm({
             
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
        Checkbox,
    }, 
    props: {
        inventory: Object,
    },
    methods: {

    }
}
</script>
