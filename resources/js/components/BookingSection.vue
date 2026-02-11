<script>
import { router } from "@inertiajs/vue3";
import { VueDatePicker } from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
export default {
    components: { VueDatePicker},
    data() {
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                budget: '',
                tattooIdea: '',
                preferredDate: '',
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
            };
        },
    },
}

</script>

<template>
    <form @submit.prevent="submitForm" class="section-book bg-black text-white py-12">
        <div class="section-book bg-black text-white py-12">
            <div class="container mx-auto px-4 sm:px-16">
                <h2 class="font-heading text-2xl sm:text-4xl uppercase text-center mb-10">Book an Appointment</h2>
                <div class="flex flex-col lg:flex-row justify-center gap-8">
                    <!-- Left Column -->
                    <div class="flex flex-col space-y-4 w-full lg:w-1/4">
                        <input v-model="form.name" class="booking-input font-body italic" type="text" placeholder="Name*" required>
                        <input v-model="form.email" class="booking-input font-body italic" type="email" placeholder="E-mail*" required>
                        <input v-model="form.phone" class="booking-input font-body italic" type="tel" placeholder="Phone*" required>
                        <input v-model="form.budget" class="booking-input font-body italic" type="text" placeholder="Budget (optional)">
                    </div>
                    <!-- Right Column -->
                    <div class="flex flex-col space-y-4 w-full lg:w-2/4">
                        <textarea v-model="form.tattooIdea" class="booking-input min-h-48 lg:h-3/4 font-body italic" placeholder="Tattoo idea*" required></textarea>

                        <div class="flex flex-row lg:space-x-2 items-center  lg:h-8">
                            <div>
                                <img src="/icons/calendar.png" class="">
                            </div>

                            <VueDatePicker v-model="form.preferredDate" dark model-type="yyyy-MM-dd HH:mm:ss">
                                <template #trigger>

                                    <div class="custom-input-wrapper">

                                        <input
                                            type="text"
                                            :value="form.preferredDate"
                                            placeholder="preferred date*"
                                            class="date-dark-input"
                                        />
                                    </div>
                                </template>
                            </VueDatePicker>

                        </div>

                        <div class="text-center lg:text-right mt-8">
                            <div class="flex-1 w-1/4"></div>
                            <button type="submit" class="inline-block right-0 px-6 py-1 border border-gray-100 text-gray-100 font-button uppercase tracking-wide hover:bg-gray-100 hover:text-black transition-colors duration-300">
                                Send &raquo;
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<style scoped>

input::placeholder{
    color: dimgray;
    font-family: Montserrat;
    font-size: 1rem;
    font-style: italic;
    border: none;
    outline: none;
}

input:hover::placeholder{
    color: white;
}

.booking-input {
    background-color: transparent;
    border: 1px solid dimgray;
    padding: 1rem;
    border-radius: 0.25rem;
}
.booking-input::placeholder {
    color: dimgray;
}
.booking-input:focus {
    outline: none !important;
    background-color: transparent;
    border-radius: 10px;
    transition: all 0.4s ease 50ms;
    color: white;
}

.date-dark-input {
    padding: 10px;
    cursor: pointer;
    background: black;
    width: 200px;
    color: dimgray;
}

</style>
