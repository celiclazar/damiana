<script>
export default {
    props: {
    },
    data() {
        return {
            galleryPreview: {
                featuredImages: [
                    { id: 1, url: 'images/gallery1.jpg', alt: 'Image 1' },
                    { id: 2, url: 'images/gallery2.jpg', alt: 'Image 2' },
                    { id: 3, url: 'images/gallery3.jpg', alt: 'Image 3' },
                    { id: 4, url: 'images/gallery4.jpg', alt: 'Image 4' },
                    { id: 5, url: 'images/gallery5.jpg', alt: 'Image 5' },
                    { id: 6, url: 'images/gallery6.jpg', alt: 'Image 6' },
                ]
            }
        }
    }
}
</script>

<template>
    <div class="bg-black text-white py-12">
        <div class="container mx-auto px-4">
            <h2 class="font-heading text-4xl uppercase mb-6 text-center">Gallery</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                <!-- Loop through your gallery images and display them here -->
                <div v-for="image in galleryPreview.featuredImages" :key="image.id" class="overflow-hidden">
                    <img :src="image.url" :alt="image" class="w-full h-auto transform transition duration-500 hover:scale-110 rounded-2xl grayscale ">
                </div>
                <div class="overflow-hidden">
                    <!-- <img :src="image" :alt="image" class="w-full h-auto transform transition duration-500 hover:scale-110 rounded-2xl grayscale ">  -->
                </div>
            </div>
            <div class="text-center pt-4">
                <router-link to="/gallery" class="inline-block right-0 px-6 py-1 border border-gray-100 text-gray-100 font-button uppercase tracking-wide hover:bg-gray-100 hover:text-black transition-colors duration-300">View More &raquo;</router-link>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Container max width can be adjusted if needed */
.container {
    max-width: 1200px; /* Adjust if necessary for your design */
}

/* If you want to add more space between the grid items */
.grid {
    gap: 1rem; /* Adjust the gap size based on your design */
}
</style>
