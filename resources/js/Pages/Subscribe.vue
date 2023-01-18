<script>
import Modal from './Modal.vue'
import {watchEffect, ref, computed} from 'vue'

export default {
    components: {
        Modal
    },
    setup() {
        const showModal = ref(false);
        const field = ref();
        const fields = [];

        const handleFields = (data) => {
            // if (fields.value.filter(value => value.title === data.title).length > 0) {
            //     return;
            // }
            field.value = data;
            fields.push(field.value);
        }

        const handleSubscriber = () => {

        }

        return {
            fields,
            showModal,
            handleFields,
            handleSubscriber
        }
    }
}
</script>

<template>
    <!--    <Head title="Welcome" />-->

    <div class="bg-white my-10 w-3/12 mx-auto rounded-md p-5">
        <h1 class="text-2xl font-bold">Subscription</h1>
        <form @submit.prevent="handleSubscriber">
            <div>
                <label class="block">Name</label>
                <input type="text" name="name" required class="rounded-md text-gray-500 w-full border-2 border-gray-200"/>
            </div>
            <div>
                <label class="block">Email Address</label>
                <input type="email" name="email" required class="rounded-md text-gray-500 w-full border-2 border-gray-200"/>
            </div>
            <div class="mt-3">
                <button class="bg-gray-500 rounded-md p-2 px-5 text-white  text-sm hover:bg-gray-800"
                        @click="showModal = true">
                    Add Extra Field
                </button>
            </div>
            <div class="mt-3 border-t-2 pt-3">
                <button class="bg-purple-500 rounded-md p-2 px-5 w-full hover:bg-purple-800 font-bold text-white">
                    Subscribe
                </button>
            </div>
        </form>
        <Modal v-show="showModal" @close-modal="showModal = false" @store-field="handleFields"/>

    </div>
</template>
