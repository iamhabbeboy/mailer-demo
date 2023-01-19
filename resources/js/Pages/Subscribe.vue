<script>
import {ref, computed, reactive} from 'vue'
import Layout from "@/Layouts/Layout.vue";
import Field from "@/Components/Field.vue";
import InputType from "@/Components/InputType.vue";
import { useForm } from "@inertiajs/vue3";

export default {
    props: ["inputFields"],
    components: {
        Field,
        Layout,
        InputType
    },
    setup(props) {
        const showModal = ref(false);
        const hasField = ref(false);
        const fields = useForm({
            name: '',
            email: '',
            inputType: [],
        });

        const handleFields = () => {
            hasField.value = !hasField.value;
        }

        const handleField = (data) => {
            // check if already added.
            // if (fields.inputType.filter(value => value.title === data.title).length > 0) {
            //     return false;
            // }
            // const len = fields.inputType.filter(value => value.title === data.title);
            fields.inputType.push(data);
            hasField.value = false;
        }

        const handleDeleteField = (index) => {
            if(window.confirm('Are you sure?')) {
                fields.inputType.splice(index, 1)
            }
        }

        const handleSubscriber = () => {
            fields.post('/api/subscribe', {
                preserveScroll: true,
                onSuccess: () => {
                    fields.reset()
                }
            })
        }

        const handleValue = (value) => {
            // console.log(fields.inputType)
        }

        return {
            hasField,
            fields,
            showModal,
            handleValue,
            handleField,
            handleFields,
            handleSubscriber,
            handleDeleteField,
            inputFields: props.inputFields,
        }
    }
}
</script>

<template>
    <Layout>
        <div class="bg-white py-10">
            <div class="my-10 w-4/12 mx-auto rounded-md p-5">
                <h1 class="text-2xl font-bold">Add Subscription</h1>
                <div v-if="$page.props.flash.message">{{ $page.props.flash.message }}</div>
                <form @submit.prevent="handleSubscriber">
                    <div>
                        <label class="block">Name</label>
                        <input type="text" required
                               class="rounded-md text-gray-500 w-full border-2 border-gray-200" v-model="fields.name"/>
                    </div>
                    <div>
                        <label class="block">Email Address</label>
                        <input type="email" required v-model="fields.email"
                               class="rounded-md text-gray-500 w-full border-2 border-gray-200"/>
                    </div>
                    <div v-if="fields.inputType.length">
                        <InputType v-for="(value, index) in fields.inputType" :key="index" :index="index" :field="value"
                                   @delete-field="handleDeleteField" @add-field-value="handleValue"/>
                    </div>
                    <div class="mt-3">
                        <button type="button"
                                class="bg-gray-500 rounded-md p-2 px-5 text-white  text-sm hover:bg-gray-800"
                                @click="handleFields">
                            <span v-if="hasField">Close Field</span>
                            <span v-else>Add Extra Field</span>
                        </button>

                        <Field v-show="hasField" @add-field="handleField" :data="inputFields"/>

                    </div>
                    <div class="mt-3 border-t-2 pt-3">
                        <button type="submit"
                                class="bg-purple-500 rounded-md p-2 px-5 w-full hover:bg-purple-800 font-bold text-white">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>
