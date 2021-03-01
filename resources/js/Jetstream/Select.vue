<template>
    <select ref="select"
            :value="modelValue" @input="$emit('update:modelValue', $event.target.value)"
            class="py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary shadow-sm border-gray-300 rounded-md sm:text-sm">
        <option disabled value="">Choose</option>
        <slot></slot>
    </select>
</template>

<script>
export default {
    props: ['modelValue'],

    emits: ['update:modelValue'],

    name: "Select"
}
</script>
