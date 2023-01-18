<template>
    <div class=" my-10 rounded-md">
        <h1 class="text-2xl font-bold pb-5">Subscription Management</h1>
        <Table :subscribers="subscribers"/>
        <div class=" py-4">
        <Pagination :links="subscribers.links" />
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
