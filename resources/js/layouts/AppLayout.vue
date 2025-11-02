<script setup>
    import Navigation from '@/components/Navigation.vue';
    import Footer from '@/components/Footer.vue';
</script>

<template>
    <div class="min-h-screen flex flex-col bg-black">
        <!-- Shared navigation using Vue/Inertia syntax -->
        <div class="absolute w-full z-10">
        <Navigation />
        </div>


        <!-- Content will be injected here -->
        <main class="flex-grow">
            <slot />
        </main>


        <!-- Shared footer -->
        <Footer />
    </div>
</template>