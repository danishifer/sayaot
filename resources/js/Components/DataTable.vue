<template>
    <table class="table-fixed w-full divide-y divide-gray-200 border-gray-200 rounded-md overflow-hidden shadow">
        <thead class="bg-gray-100 text-gray-500 text-sm">
        <tr class="divide-x divide-gray-300">
            <slot name="header"></slot>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        <slot></slot>
        </tbody>
    </table>
</template>
<script>
import Checkbox from "@/Jetstream/Checkbox";
export default {
    components: {Checkbox},
    props: {
        checkboxes: Boolean
    }
}
</script>
