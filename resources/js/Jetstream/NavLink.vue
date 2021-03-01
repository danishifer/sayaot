<template>
    <inertia-link :href="href" :class="classes">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    props: ['href', 'active'],

    computed: {
        classes() {
            return this.active
                ? 'w-full rounded-md inline-flex items-center px-3 py-2 ' +
                'font-medium leading-5 text-black bg-white ' +
                'focus:outline-none focus:text-gray-700'
                : 'w-full rounded-md inline-flex items-center px-3 py-2 ' +
                'font-medium leading-5 text-white text-opacity-60 hover:text-gray-100 hover:bg-gray-100 ' +
                'hover:bg-opacity-10 focus:outline-none focus:text-white'
        }
    }
}
</script>
