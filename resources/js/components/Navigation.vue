<script>
 import { Link } from "@inertiajs/vue3";
export default {
    components: {
        Link
    },
    data() {
        return {
            menuOpen: false
        };
    },
    methods: {
        toggleMenu() {
            this.menuOpen = !this.menuOpen;
        }
    }
};
</script>

<template>
    <!-- Navigation Header -->
    <nav class="absolute top-0 w-full flex items-center justify-between p-6 bg-black bg-opacity-75">
        <!-- Left Section for Hamburger Menu -->
        <div class="block flex-1">
            <button @click="toggleMenu" class="flex items-center px-3 py-2 text-white hover:text-white">
                <svg class="fill-current h-6 w-6 visible hover:cursor-pointer" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0,3 L20,3 L20,4 L0,4 L0,3 Z M0,9 L20,9 L20,10 L0,10 L0,9 Z M0,15 L20,15 L20,16 L0,16 L0,15 Z"></path></svg>
            </button>
        </div>
        <!-- Center Section for Logo -->
        <div class="flex-1 flex justify-center">
            <span class="font-semibold text-xl tracking-tight text-white">
<!--                <img src="/icons/logo.png" class="h-16 w-auto">-->
                <Link href="/" class="font-heading">DAMIANA INKART</Link>
            </span>
        </div>
        <!-- Right Section as Spacer -->
        <div class="flex-1"></div>
    </nav>

    <transition
        enter-active-class="transition ease-out duration-300"
        enter-from-class="opacity-0 scale-95"
        enter-to-class="opacity-100 scale-100"
        leave-active-class="transition ease-in duration-300"
        leave-from-class="opacity-100 scale-100"
        leave-to-class="opacity-0 scale-95"
    >
        <!-- Menu Overlay -->
        <div v-if="menuOpen" class="fixed inset-0 bg-black bg-opacity-100 flex flex-col items-center">
            <div class="text-white text-center transform translate-y-28">
                <div>
                    <img src="/icons/menu_logo.png" class="pb-8">
                </div>
                <div>
                    <button @click="toggleMenu" class="mb-6">
                        <svg class="h-8 w-8 text-white visible hover:cursor-pointer" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <title>Close menu</title>
                            <path d="M10 10 L30 30" stroke="currentColor" stroke-width="2"/>
                            <path d="M30 10 L10 30" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul class="font-heading text-4xl space-y-6">
                        <li><Link href="/" class="hover:text-gray-300">HOME</Link></li>
                        <li><Link href="/gallery" class="hover:text-gray-300">GALLERY</Link></li>
                        <li><Link href="/about" class="hover:text-gray-300">ABOUT ME</Link></li>
                    </ul>
                </div>

            </div>
        </div>
    </transition>


</template>