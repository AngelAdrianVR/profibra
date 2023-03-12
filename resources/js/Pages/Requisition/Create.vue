<template>
  <AppLayout title="Crear Requicisión">
    <div class="flex justify-between">
      <div class="flex justify-start cursor-pointer">
        <Link
          :href="route('requisitions.index')"
          class="flex items-center mt-2 text-sky-700"
        >
          <i
            class="fas fa-long-arrow-alt-left text-lg active:bg-gray-300 bg-opacity-100 rounded-full w-7 h-7 pl-1 ml-2"
          ></i>
          <span class="ml-1">Atrás</span>
        </Link>
      </div>
      <h1 class="text-sky-800 text-xl mx-6 mt-2">Crear Requicisión</h1>
    </div>

    <div class="grid grid-cols-2 bg-gray-50 rounded-md shadow-md px-4 py-3 mx-5 my-4">
      <form @submit.prevent="create">
        <div class="mb-3">
          <InputLabel for="id" value="ID de la requicisión" />
          <TextInput
            id="id"
            v-model="form.id"
            type="number"
            class="mt-1 block w-full"
            autofocus
            disabled
          />
          <InputError class="mt-2" :message="form.errors.id" />
        </div>
        <div class="mb-3">
          <InputLabel for="quantity" value="Cantidad *" />
          <TextInput
            id="quantity"
            v-model="form.quantity"
            type="number"
            step="0.1"
            class="mt-1 block w-full"
            required
          />
          <InputError class="mt-2" :message="form.errors.quantity" />
        </div>
        <div class="mb-3">
          <InputLabel for="description" value="Descripción" />
          <textarea
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm"
            id="description"
            v-model="form.description"
            type="text"
          >
          </textarea>
          <InputError class="mt-2" :message="form.errors.description" />
        </div>
        <!-- ---------------- -->
        <!-- <div>
          <ProductInput
            :products="products"
            v-for="(item, index) in form.items"
            :key="item.id"
            :id="item.id"
            @deleteItem="deleteItem(index)"
            @syncItem="syncItems(index, $event)"
            class="mb-5"
          />
        </div>
        <p v-if="!form.items.length" class="text-sm text-gray-600">
          Click al botón de "+" para empezar a agregar productos
        </p>
        <div class="my-2 text-center">
          <button type="button" @click="addNewItem">
            <i class="fa-solid fa-circle-plus text-2xl text-blue-400"></i>
          </button>
        </div> -->
        <PrimaryButton>Generar</PrimaryButton>
      </form>
    </div>
  </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

export default {
  data() {
    const form = useForm({
      id: null,
      name: null,
      quantity: null,
      description: null,
    });

    return {
      form,
    };
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
    create() {
      this.form.post(route("requisitions.store"));
    },
  },
};
</script>
