<script>
export default {
    props: {
        aboutPreview: Object,
    },
    name: "AboutPreview"
}
</script>

<template>
    <section class="bg-black text-white py-12">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between">
            <!-- Decorative circle - adjust size and make it fully round on all screen sizes -->
            <div
                :style="{ backgroundImage: 'url(' + aboutPreview.circleImageUrl + ')',
                        backgroundSize: 'cover',
                        backgroundPosition: 'center',
                        backgroundColor: 'white' }"
                class="rounded-full w-48 h-48 sm:w-64 sm:h-64 mb-8 lg:mb-0 lg:mr-20">
            </div>


            <!-- Text and button - center align text on small screens and left align on larger screens -->
            <div class="text-center lg:text-left lg:max-w-md">
                <h2 class="font-heading text-4xl uppercase mb-6">About Me</h2>
                <p class="font-body mb-4 tracking-wide text-justify">
                    {{ 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ' }}
                </p>
                <p class="font-body italic mb-4">
                    lorem ipsum dolor sit amet
                </p>
                <div class="text-center lg:text-right">
                    <a href="/about" class="inline-block right-0 px-6 py-1 border border-gray-100 text-gray-100 font-button uppercase tracking-wide hover:bg-gray-100 hover:text-black transition-colors duration-300">
                        About Me &raquo;
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* This will ensure that the container is centered on larger screens and that the content within is properly spaced */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
}

@media (min-width: 1024px) {
    .container {
        flex-direction: row;
    }
}

</style>
