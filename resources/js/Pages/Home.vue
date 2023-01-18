<template>
    <Layout>
        <div class="flex justify-between mb-3">
            <h1 class="text-2xl font-bold pt-3">Subscription Management</h1>
            <Link href="/subscribe" class="bg-purple-800 p-2 px-4 py-0 text-white rounded-md h-10 hover:bg-purple-600">Add Subscriber
            </Link>
        </div>
        <Table :subscribers="subscribers"/>
        <div class=" py-4">
            <Pagination :links="subscribers.links"/>
        </div>

    </Layout>
</template>

<script>
import { Link} from "@inertiajs/vue3";
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
