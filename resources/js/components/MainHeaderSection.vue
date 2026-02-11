<script>
export default {
    name: "MainHeaderSection"
}
</script>

<template>
    <div class="h-full flex flex-col justify-end items-center">
        <div class="font-heading text-center lg:mb-20">
            <div class="py-8">
                <a href="#booking" class="inline-block px-2 sm:px-6 py-1 border border-gray-100 text-gray-100 font-button uppercase tracking-wide hover:bg-gray-100 hover:text-black transition-colors duration-300">Book Now &raquo;</a>
            </div>
            <div>
                <h1 class="text-3xl sm:text-7xl font-heading uppercase text-white tracking-wider">Tattoo Studio</h1>
            </div>
            <div>
                <p class="text-lg sm:text-5xl italic text-gray-300 mt-4">pleasure spiked with pain since 2020</p>
            </div>
            <div class="pt-4 pb-">
                <img src="/icons/location.png" class="m-auto h-4" >
                <p class="text-sm text-gray-400 mt-2">Novi Sad, Serbia</p>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
