<template>
    <div v-html="form"></div>
    <button class="text-sm font-bold text-red-500 underline" @click="handleDeleteField">delete</button>
</template>

<script>
import {ref} from "vue";

export default {
    name: "InputType",
    props: ["field", "index"],
    setup(props, { emit }) {
        const form = ref('');
        const input = props.field;
        const className = "rounded-md text-gray-500 w-full border-2 border-gray-200";
        form.value = `<label class="block capitalize">${input.title}</label>`;
        switch (true) {
            case (input.type === "string" || input.type === "number" || input.type === "date"):
                form.value += `<input required type="${props.field.type === 'string' ? 'text' : props.field.type}" class="${className}"/>`;
                break;
            case input.type === "boolean":
                form.value += `<select required class="${className}">`;
                form.value += "<option value=''>Select</option>"
                form.value += "<option value='1'>True</option>"
                form.value += "<option value='0'>False</option>"
                form.value += "</select>"
                break;
            default:
                break;
        }

        const handleDeleteField = () => {
            emit("delete-field", props.index)
        }

        return {
            form,
            handleDeleteField,
        }
    }
}
</script>

<style scoped>

</style>
