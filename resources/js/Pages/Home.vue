<template>
    <div class=" my-10 rounded-md">
        <div class="flex justify-between mb-3">
            <h1 class="text-2xl font-bold pt-3">Subscription Management</h1>
            <button class="bg-purple-800 p-2 px-4 py-0 text-white rounded-md h-10 hover:bg-purple-600">Add Subscriber
            </button>
        </div>
        <Table :subscribers="subscribers"/>
        <div class=" py-4">
            <Pagination :links="subscribers.links"/>
        </div>
    </div>
</template>

<script>
import Table from "@/Components/Table.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
    name: "Home",
    components: {Table, Pagination},
    props: ["subscribers"]
}
</script>

<style scoped>

</style>
