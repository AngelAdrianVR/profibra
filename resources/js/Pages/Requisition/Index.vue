<template>
    <AppLayout title="Requicisiones">
        <div class="flex justify-between">

            <h1 class="text-sky-800 text-xl mx-6 mt-2">Requicisiones</h1>
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

    }
}
</script>
