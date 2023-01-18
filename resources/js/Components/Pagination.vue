<script>
import { Link } from '@inertiajs/vue3'
export default {
    name: "TableRow",
    props: ["links"],
    components: { Link}
}
</script>

<style scoped>

</style>

<template>
    <div class="">
        <nav aria-label="Page navigation">
            <ul class="inline-flex -space-x-px">
                <li v-for="(link, index) in links" :key="index">
                    <Link :href="link.url"
                       :class="`${link.active ? 'bg-gray-300': 'bg-white' } ${index === 0 ? 'rounded-l-lg' : '' } ${index === links.length - 1 ? 'rounded-r-lg' : ''} border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 leading-tight py-2 px-3`"
                       v-html="link.label"></Link>
                </li>
            </ul>
        </nav>

    </div>
</template>
