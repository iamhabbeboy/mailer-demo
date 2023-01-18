<template>
    <div class="bg-gray-100 p-3 mt-3">
        <div class="my-3" v-if="data.length">
            <select class="rounded-md w-full border-2 border-gray-200 text-gray-500" @change="updateField"
            >
                <option value="">Select field</option>
                <option v-for="(value, index) in data" :key="index" :value="value.title"
                        :data-attr="JSON.stringify(value)">{{ value.title }}
                </option>
            </select>
        </div>
        <div class="my-3">
            <h3 class="font-bold text-sm">OR Create New Field</h3>
        </div>
        <div class="my-3">
            <input type="text" name="email" placeholder="Title" v-model="field.title"
                   class="rounded-md text-gray-500 w-full border-2 border-gray-200"
            />
        </div>
        <div class="my-3">
            <select class="rounded-md w-full border-2 border-gray-200 text-gray-500" @change="updateField"
                    v-model="field.type"
            >
                <option value="">Select type</option>
                <option value="date">date</option>
                <option value="number">number</option>
                <option value="string">string</option>
                <option value="boolean">boolean</option>
            </select>
        </div>
    </div>
</template>

<script>
import {reactive} from "vue";

export default {
    name: "Field",
    props: ["data"],
    setup(props, {emit}) {
        const field = reactive({
            title: '',
            type: '',
        });

        const updateField = (event) => {
            const selection = event.target.selectedIndex;
            if (event.target.options[selection].getAttribute('data-attr')) {
                const data = event.target.options[selection].getAttribute('data-attr')
                emit("add-field", JSON.parse(data));
                event.target.selectedIndex = 0;
            }

            if (field.title === '' || field.type === '') {
                return false;
            } else {
                emit("add-field", field);
            }
        }

        return {
            field,
            updateField,
        }
    }

}
</script>

<style scoped>

</style>
