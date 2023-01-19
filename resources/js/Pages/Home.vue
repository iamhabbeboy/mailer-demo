<template>
    <Layout>
        <div class="flex justify-between mb-3">
            <h1 class="text-2xl font-bold pt-3">Subscription Management</h1>
            <Link href="/subscribe" class="bg-purple-800 p-2 px-4 py-2 text-white rounded-md h-10 hover:bg-purple-600">
                Add Subscriber
            </Link>
        </div>
        <div v-if="subscribers.data.length === 0" class="bg-white rounded-md p-20 text-center">
            <h1 class="text-2xl font-bold text-center">No Record available</h1>
            <p class="text-center text-gray-500">click the add button to create new record. </p>
        </div>
        <div v-else>
            <Table :subscribers="subscribers"/>
            <div class=" py-4">
                <Pagination :links="subscribers.links"/>
            </div>
        </div>

    </Layout>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import Table from "@/Components/Table.vue";
import Layout from "@/Layouts/Layout.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
    name: "Home",
    components: {Link, Layout, Table, Pagination},
    props: ["subscribers"]
}
</script>

<style scoped>

</style>
