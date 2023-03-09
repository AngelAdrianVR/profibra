<template>
    <!-- component -->
<section class="relative">
<div class="w-full mb-2 px-4">
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded 
  bg-sky-900 text-white">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
          <h3 class="font-semibold text-lg text-white">CATÁLOGO DE PRODUCTOS</h3>
        </div>
      </div>
    </div>
    <div class="block w-full overflow-x-auto ">
      <table class="items-center w-full bg-transparent border-collapse">
        <thead>
          <tr>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-sky-800 text-sky-300 border-sky-700">ID</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-sky-800 text-sky-300 border-sky-700">Nombre</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-sky-800 text-sky-300 border-sky-700">Costo Unidad</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-sky-800 text-sky-300 border-sky-700">Presentación</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-sky-800 text-sky-300 border-sky-700">Cantidad Max.</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-sky-800 text-sky-300 border-sky-700">Cantidad Min </th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-sky-800 text-sky-300 border-sky-700">Punto de Reposición</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-sky-800 text-sky-300 border-sky-700"></th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="product in products" :key="product.id">
            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
              <span>{{product.id }}</span> </th>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ product.name }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">${{ product.cost }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              {{ product.presentation }}
            </td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              {{ product.max_quantity }}
            </td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                <span>{{ product.min_quantity }}</span>
            </td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              {{ product.supply_point }}
            </td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex">
              <Link :href="route('catalogue.edit', product)" class="text-blueGray-500 block py-1 px-3 space-x-3">
                <i title="Editar" class="fa-solid fa-pencil hover:text-cyan-600"></i>
              </Link>
              <button @click="delete_confirm = true; item_to_delete = product;"  class="text-blueGray-500 block py-1 px-3 space-x-3">
                <i title="Borrar" class="fa fa-trash hover:text-red-600"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>

<ConfirmationModal :show="delete_confirm" @close="delete_confirm = false">
    <template #title>
      <div>¿Deseas continuar?</div>
    </template>
    <template #content>
      <div>
        Estás a punto de eliminar un producto de tu catálogo. Una vez realizado ya no se podrá
        recuperar.
      </div>
    </template>
    <template #footer>
      <div class="flex justify-end">
        <button @click="this.delete()" class="px-2 py-1 font-semibold border rounded border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition duration-200 mr-2">Eliminar</button>
        <button class="px-2 py-1 font-semibold border rounded border-gray-500 text-gray-500 hover:bg-gray-100 transition duration-200" @click="delete_confirm = false">
          Cancelar
        </button>
      </div>
    </template>
  </ConfirmationModal>
</template>


<script>
import ConfirmationModal from "@/Components/ConfirmationModal.vue";
import { Link } from '@inertiajs/vue3';
export default {
  data(){
    return{
      delete_confirm: false,
      item_to_delete: {},
    }
  },
  components: {
    ConfirmationModal,
    Link,
  },
  props: {
    products: Array,
  },
  methods:{
    delete() {
      this.$inertia.delete(
        this.route("catalogue.destroy", this.item_to_delete)
      );
      this.delete_confirm = false;
    },
  },
}
</script>