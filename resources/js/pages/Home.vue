<script>
import ImageHeaderSection from '@/components/ImageHeaderSection.vue';
import MainHeaderSection from '@/components/MainHeaderSection.vue';
import AboutPreview from '@/components/AboutPreview.vue';
import GalleryPreview from '@/components/GalleryPreview.vue';
import BookingSection from '@/components/BookingSection.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from "@inertiajs/vue3";

export default {
    props: {
        aboutPreview: Object,
        bookingPreview: Object,
        galleryPreview: Object,
        headerImageUrl: String,
        imageHeaderSection: Object,
    },
    components: {
        AppLayout,
        Link,
        ImageHeaderSection,
        MainHeaderSection,
        AboutPreview,
        GalleryPreview,
        BookingSection
    },

}
</script>

<template>
    <AppLayout>
        <ImageHeaderSection :imageHeaderSection />
        <MainHeaderSection class="move-up" />
        <AboutPreview :aboutPreview class="sm:py-28" />
        <GalleryPreview :galleryPreview="galleryPreview" class="py-26" />
        <BookingSection id="booking" />
    </AppLayout>
</template>

<style>

.move-up {
  background-color: transparent;
  box-shadow: 5px;
}

@media only screen and (min-width: 768px) {
    /* Apply styles for medium screens and above */
    .move-up {
      width: 100%;
      height: 100%;
      background-color: transparent;
      position: relative;
      margin: -320px 0 50px 0; /* Default margin for all screen sizes */
    }
}
</style>
