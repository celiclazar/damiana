<script>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/layouts/AppLayout.vue";
import GalleryPreview from "@/components/GalleryPreview.vue";

export default {
    props: {
        galleryPreview: Object,
        image: String
    },
    components: {
        GalleryPreview,
        AppLayout,
        Link
    },
    data() {
        return {
            // your data properties
        };
    },
    methods: {
        // your methods
    }
}
</script>

<template>
    <AppLayout>
        <div class="bg-black text-white py-28">
            <div class="flex flex-col sm:flex-row w-full sm:w-3/5 mx-auto px-10 py-8 relative">
                <div class="flex-1">
                    <div class="relative w-full flex justify-center content-center">
                        <img class="rounded-lg sm:mr-16" :src="image" style="bottom: 50%;">
                    </div>
                </div>
                <div class="p-2 sm:mt-0 sm:ml-0 sm:flex-1 mt-6">
                    <h1 class="font-about text-4xl uppercase mb-6">About Me</h1>
                    <p class="mb-4 font-body text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p class="font-signature mb">lorem ipsum dolor sit amet</p>
                    <h2 class="font-heading uppercase text-2xl sm:text-left mb-4 mt-6">My Style</h2>
                    <p class="mb-4 font-body text-justify sm:text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <h2 class="font-heading uppercase text-2xl mt-6">My Process</h2>
                    <p class="font-body mt-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p class="font-body mt-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p class="font-body mt-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>

            <GalleryPreview :galleryPreview="galleryPreview" class="px-8 sm:mt-16 sm:w-2/3 sm:mx-auto"/>
        </div>
    </AppLayout>
</template>
