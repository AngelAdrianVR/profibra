<template>
    <!-- sidebar -->
    <div class="h-screen hidden lg:block shadow-lg relative">
        <div class="bg-white h-full dark:bg-gray-700">
            <div class="flex items-center justify-center pt-12 pb-2">
                <JetApplicationLogo class="px-6" />
            </div>
            <nav class="mt-6">
                <div>
                    <SideMenuLink v-for="(menu, index) in menus" :key="index" :href="menu.route" :active="menu.active">
                        <span v-html="menu.icon"></span>
                        <span class="mx-3 text-sm font-normal">
                            {{ menu.label }}
                        </span>
                    </SideMenuLink>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
import SideMenuLink from "@/Components/MyComponents/SideMenuLink.vue";
import JetApplicationLogo from "@/Components/ApplicationLogo.vue";

export default {
    data() {
        return {
            menus: [
                {
                    label: 'Inicio',
                    icon: '<i class="fa-solid fa-gauge-high"></i>',
                    route: route('dashboard'),
                    active: route().current('dashboard')
                },
                {
                    label: 'Usuarios',
                    icon: '<i class="fa-solid fa-user"></i>',
                    route: route('user.index'),
                    active: route().current('user.*')
                },
                {
                    label: 'Catalogo',
                    icon: '<i class="fa-solid fa-tags"></i>',
                    route: route('catalogue.index'),
                    active: route().current('catalogue.*')
                },
                {
                    label: 'Inventario',
                    icon: '<i class="fa-solid fa-cart-flatbed"></i>',
                    route: route('inventory.index'),
                    active: route().current('inventory.*')
                },
                {
                    label: 'E/S',
                    icon: '<i class="fa-solid fa-list-check"></i>',
                    route: route('movements.index'),
                    active: route().current('movements.*')
                },
                {
                    label: 'Requicisiones',
                    icon: '<i class="fa-solid fa-box"></i>',
                    route: route('requisitions.index'),
                    active: route().current('requisitions.*')
                },
            ],
        }
    },
    components: {
        SideMenuLink,
        JetApplicationLogo,
    }
}
</script>