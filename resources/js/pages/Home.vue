<script>
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from "@inertiajs/vue3";

export default {
    props: {
        aboutPreview: Object,
        bookingPreview: Object,
        galleryPreview: Object,
        headerImageUrl: String,
        merchPreview: Object,
        reviewsPreview: Object,

    },
    components: {
        AppLayout,
        Link,
    },
   
}
</script>

<template>
    <AppLayout>
        
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