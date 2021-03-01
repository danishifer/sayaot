<template>
    <div class="px-3 py-1.5 bg-blue-200 text-blue-900 text-opacity-75 font-medium text-xs text-center rounded-full uppercase">
        {{ status }}
    </div>
</template>
<script>
export default {
    name: 'assistant-status-tag',
    props: {
        status: String
    }
}
</script>
