<script>
import { ref, computed } from 'vue';
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/layouts/AppLayout.vue";
import ImageModal from "@/components/ImageModal.vue";


export default {
    components: {
        AppLayout,
        Link,
        ImageModal,
    },

    props: { images: Array },
    setup(props) {
        const currentFilter = ref('tattoo');
        const modalOpen = ref(false);

        const filteredImages = computed(() => {
            switch (currentFilter.value) {
                case 'tattoo':
                    return props.images.filter(image => image.type === 'tattoo');
                case 'sketch':
                    return props.images.filter(image => image.type === 'sketch');
                default:
                    return props.images;
            }
        });

        const modalImages = ref([]);

        function setFilter(filter) {
            currentFilter.value = filter;
        }

        function openModalWithSlider(image) {
            const startIndex = filteredImages.value.findIndex(img => img.id === image.id);
            modalImages.value = { images: filteredImages.value, startIndex };
            modalOpen.value = true;
        }

        function setFilter(filter) {
            currentFilter.value = filter;
        }

        return {
            currentFilter,
            filteredImages,
            setFilter,
            modalOpen,
            modalImages,
            openModalWithSlider,
        };
    },

};
</script>

<template>
    <AppLayout>
        <section class="bg-black text-white py-24">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-heading text-center mb-12">Gallery</h2>
                <!-- Tabs or Category Filters -->
                <div class="flex justify-center mb-8">
                    <!-- Assuming you have some method to switch tabs or filter categories -->
                    <button @click="setFilter('tattoo')" class="bg-transparent font-body border-none text-white mr-2 p-2 hover:underline" :class="{ 'underline': currentFilter === 'tattoo' }">Tattoos</button>
                    <button @click="setFilter('sketch')" class="bg-transparent border-none text-white p-2 hover:underline" :class="{ 'underline': currentFilter === 'sketch' }">Available sketches</button>
                </div>
                <!-- Grid of images -->
                <div class="w-2/3 mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                        <!-- Loop to render filtered images -->
                        <div v-for="image in filteredImages" :key="image.id" class="overflow-hidden grayscale">
                            <img :src="image.url" :alt="image.alt" class="w-full h-auto object-cover mx-auto rounded-xl" @click="openModalWithSlider(image)">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <ImageModal v-if="modalOpen" :imagesData="modalImages"  @close="modalOpen = false" />

    </AppLayout>
</template>

<style scoped>

@media  screen and (max-width: 640px) {
    .swiper-container {
        width: 450px;
        height: 300px;
    }
}

@media  screen and (min-width: 640px) {
    .swiper-container {
        width: 100%;
        height: 500px;
    }
}

@media  screen and (min-width: 640px) {
    .swiper-img {
        width: 50%;
        height: 100%;
        object-fit: contain;
    }

    .swiper-slide {
        flex-shrink: 0;
        width: 100%;
        height: 100%;
        position: relative;
        transition-property: transform;
        display: flex;
    }
}

</style>
