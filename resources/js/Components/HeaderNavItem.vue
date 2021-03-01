<template>
    <button :class="classes" ref="button">
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: ['active'],

    computed: {
        classes() {
            return this.active
                ? 'pb-2 font-medium text-black text-sm border-b-2 border-red-500 focus:outline-none'
                : 'pb-2 font-medium text-gray-500 hover:text-gray-700 text-sm border-b-2 border-transparent hover:border-gray-500 focus:outline-none'
        }
    }
}
</script>
