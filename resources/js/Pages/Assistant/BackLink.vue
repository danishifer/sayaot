<template>
    <inertia-link ref="inertia-link"
                  class="px-2 py-1 inline-flex items-center text-accent text-sm space-x-1 rounded-md hover:bg-accent hover:bg-opacity-5">
        <svg width="18" height="18" viewBox="0 0 18 18">
            <path d="m5.157 9a1.008 1.008 0 0 0 0.344 0.758l5.703 5.578a0.9 0.9 0 0 0 0.672 0.281 0.964 0.964 0 0 0 0.968-0.968 0.976 0.976 0 0 0-0.3-0.7l-5.078-4.949 5.086-4.953a0.99 0.99 0 0 0 0.3-0.7 0.964 0.964 0 0 0-0.969-0.969 0.9 0.9 0 0 0-0.672 0.281l-5.711 5.577a1.053 1.053 0 0 0-0.343 0.764z"
                  fill="currentColor"/>
        </svg>
        <span><slot></slot></span>
    </inertia-link>
</template>

<script>
export default {
    name: 'back-link',
}
</script>
