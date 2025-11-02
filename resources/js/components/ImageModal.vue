<script>

import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation, EffectFade } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/effect-fade';


export default {
    components: {
        Swiper,
        SwiperSlide,
    },

    props: {
        imagesData: {
            type: Object,
            required: true,
        },
    },
    setup() {
        return {
            modules: [Navigation, EffectFade],
        };
    },

};
</script>

<template>
    <div class="fixed inset-0 bg-black bg-opacity-80 flex flex-col justify-center items-center" @click.self="$emit('close')">
        <div class="h-2/3 sm:w-full bg-black bg-opacity-95">
            <swiper :navigation="true"
                    :modules="modules"
                    class="swiper-container">
                <!-- Use v-for to iterate over the images array and generate SwiperSlide components -->
                <swiper-slide v-for="image in imagesData.images" :key="image.id" class="swiper-slide sm:flex sm:flex-row px-12">
                    <img :src="image.url" :alt="image.alt" class="swiper-img">
                    <div class="p-2 ">
                        <h1 class="mt-4 sm:mt-20 sm:ml-10 text-white text-5xl font-heading">{{ image.title }}</h1>
                        <p class="mt-2 sm:w-1/2 sm:mt-10 sm:ml-10 text-white text-xl font-body">{{ image.alt }} and some extra description</p>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </div>
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