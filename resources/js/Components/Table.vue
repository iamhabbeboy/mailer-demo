<script>
import {useForm} from "@inertiajs/vue3";
export default {
    props: ["subscribers"],
    setup() {
        const form = useForm({
        })

        const handleDeleteSubscription = (id) => {
            if (window.confirm("Are you sure ?")) {
                console.log(id)
            }
            form.delete(`subscribe/${id}`)
        }
        return {
            handleDeleteSubscription
        }
    }
}
</script>
<style scoped>

</style>
<template>
    <!-- component -->
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">#</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Extra Fields</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <tr class="hover:bg-gray-50" v-for="(subscriber, index) in subscribers.data" :key="index">
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                    {{ index + 1 }}
                </th>
                <th class="px-6 py-4 font-normal text-gray-900">
                    <div class="text-sm">
                        <div class="font-medium text-gray-700">{{ subscriber.name }}</div>
                        <div class="text-gray-400">{{ subscriber.email }}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
          <span
              class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
          >
            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
            {{ subscriber.state }}
          </span>
                </td>
                <td class="px-6 py-4 w-2/5">
                    <div v-if="!subscriber.fields.length"> -</div>
                    <div class="flex gap-2">
            <span v-for="(value, index) in subscriber.fields" :key="index"
                  class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"
            >
              {{ value.title }}:
                <span v-if="value.pivot.value === '0'">False</span>
                <span v-else-if="value.pivot.value === '1'">True</span>
                <span v-else>{{ value.pivot.value }}</span>
            </span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-end gap-4">
                        <button @click="handleDeleteSubscription(subscriber.id)">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                                x-tooltip="tooltip"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

