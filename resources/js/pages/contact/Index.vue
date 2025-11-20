<script>
import {Link, router} from "@inertiajs/vue3";
import AppLayout from "@/layouts/AppLayout.vue";

export default {
    components: {
        AppLayout,
        Link
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                message: '',
            },
        };
    },
    methods: {
        submitForm() {
            // Create FormData to handle file upload and other fields
            let formData = new FormData();
            for (const [key, value] of Object.entries(this.form)) {
                formData.append(key, value);
            }

            // Submit the form data using Inertia's post method
            router.post('/contact-send', formData, {
                onSuccess: () => {
                    this.resetForm();
                },
                onError: () => {
                    //error poruku dodati
                }
            });
        },
        resetForm() {
            this.form = {
                name: '',
                email: '',
                message: '',
                photo: null,
            };
        },
        handleFileUpload(event) {
            this.form.photo = event.target.files[0];
        },
    }
}
</script>

<template>
    <AppLayout>
        <div class="py-8"></div>
        <div class="bg-black text-white md:mb-6">
            <div class="flex flex-col lg:flex-row lg:p-12 mx-auto sm:grid-cols-2 gap-8">
                <div class="lg:w-1/2 lg:px-12">
                    <div class="mx-2 p-10 sm:pl-10">
                        <h2 class="text-4xl font-heading uppercase mb-8">Contact Me</h2>
                        <p class="mb-6 font-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="flex mb-4">
                            <img class="invert mr-2" src="/icons/envelope.png">
                            <span class="font-body">crucio@gmail.com</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <img class="invert mr-2" src="/icons/telephone.png">
                            <span class="font-body">0601122233</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <img class="invert mr-2" src="/icons/map-marker.png">
                            <p class="font-body">Radisiceva 34, Sombor</p>
                        </div>
                    </div>
                    <iframe
                        class="w-full h-64 lg:ml-12 lg:h-48 lg:w-4/5 lg:rounded-xl"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.613214152262!2d19.111225676886008!3d45.778941271080896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475cb585f922f447%3A0xb8d0d88f30c5bca5!2z0KDQsNC00LjRiNC40ZvQtdCy0LAgMzQsINCh0L7QvNCx0L7RgA!5e0!3m2!1ssr!2srs!4v1706102909301!5m2!1ssr!2srs"
                        allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0">
                    </iframe>
                </div>
                <!-- Contact Form -->
                <div>
                    <form @submit.prevent="submitForm" class="p-4 section-book bg-black text-white">
                        <div class="bg-black text-white py-12 sm:py-2">
                            <div class="container mx-auto px-4 sm:p-12">
                                <div class="flex flex-col justify-center gap-8 sm:gap-4">
                                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 md:space-x-8 w-full">
                                        <div class="sm:w-1/2">
                                            <input v-model="form.name" class="w-full h-12 border-dimgray border-1 bg-black font-body italic" type="text" placeholder="Name*" required>
                                        </div>
                                        <div class="sm:w-1/2">
                                            <input v-model="form.email" class="w-full h-12 border-dimgray border-1 bg-black font-body italic" type="email" placeholder="E-mail*" required>
                                        </div>
                                    </div>
                                    <div class="flex flex-col space-y-4 w-full">
                                        <textarea v-model="form.message" class="border-dimgray border-1 bg-black booking-input min-h-48 sm:h-3/4 font-body italic" placeholder="Message*" required></textarea>
                                    </div>
                                    <div class="grid sm:flex sm:space-x-4 items-center justify-items-start sm:h-8">
                                        <label for="file-upload" class="text-gray-500 cursor-pointer font-body italic">
                                            <img src="/icons/attach.png" alt="Attach a photo" class="inline-block">
                                            attach a photo*
                                        </label>
                                        <input @change="handleFileUpload" ref="fileInput" id="file-upload" type="file" hidden>
                                    </div>
                                    <div class="text-center lg:text-left">
                                        <div class="flex-1 mb-4 w-1/4"></div>
                                        <button type="submit" class="inline-block right-0 px-6 py-1 send-button font-button uppercase tracking-wide border-dimgray border-2 hover:bg-gray-100 hover:text-black transition-colors duration-300">
                                            Send &raquo;
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
