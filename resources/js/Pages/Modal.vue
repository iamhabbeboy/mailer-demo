<script>
import {reactive, ref} from 'vue'

export default {
    name: "Modal",
    setup(props, {emit}) {

        const field = reactive({
            title: '',
            type: ''
        })

        const closeModal = () => {
            emit('close-modal', false)
        }

        const handleAddField = () => {
            emit('store-field', field)
        }

        return {
            field,
            closeModal,
            handleAddField
        }
    }
}
</script>
<template>
    <div class="relative flex justify-center items-center">
        <div id="menu" class="w-full h-full bg-gray-900 bg-opacity-80 top-0 fixed sticky-0">
            <div class="2xl:container  2xl:mx-auto py-48 px-4 md:px-28 flex justify-center items-center">
                <div
                    class="w-96 md:w-auto dark:bg-gray-800 relative flex flex-col justify-center items-center bg-white py-16 px-4 md:px-24 xl:py-14 xl:px-26">
                    <form @submit.prevent="handleAddField">
                        <div class="mt-2">
                            <h1 role="main"
                                class="text-xl dark:text-white lg:text-xl font-semibold leading-7 lg:leading-9 text-center text-gray-800">
                                Add Field </h1>
                        </div>
                        <div class="mt">
                            <div>
                                <div class="my-3">
                                    <input type="text" name="email" placeholder="Title"
                                           class="rounded-md text-gray-500 w-full border-2 border-gray-200" required
                                           v-model="field.title"/>
                                </div>
                                <div class="my-3">
                                    <select class="rounded-md w-full border-2 border-gray-200 text-gray-500" required
                                            v-model="field.type">
                                        <option value="">select type</option>
                                        <option value="date">date</option>
                                        <option value="number">number</option>
                                        <option value="string">string</option>
                                        <option value="boolean">boolean</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="bg-purple-500 rounded-md p-2 px-5 w-full hover:bg-purple-800 font-bold text-white">
                            Save
                        </button>

                        <button @click="closeModal"
                                class="text-gray-800 dark:text-gray-400 absolute top-8 right-8 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800"
                                aria-label="close">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 6L6 18" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M6 6L18 18" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

