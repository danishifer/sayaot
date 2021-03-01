<template>
    <div class="flex items-center justify-between py-2">
        <div class="flex mb-0">
            <button class="flex items-center px-2 py-1.5 space-x-1 text-sm border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                <svg width="18" height="18" viewBox="0 0 18 18">
                    <path d="m9.007 11.235a0.54 0.54 0 0 0 0.54-0.533v-6.6l-0.041-0.964 0.424 0.465 0.957 1.019a0.485 0.485 0 0 0 0.362 0.164 0.476 0.476 0 0 0 0.5-0.479 0.5 0.5 0 0 0-0.157-0.355l-2.181-2.105a0.557 0.557 0 0 0-0.4-0.185 0.536 0.536 0 0 0-0.4 0.185l-2.187 2.108a0.484 0.484 0 0 0-0.164 0.355 0.471 0.471 0 0 0 0.492 0.479 0.514 0.514 0 0 0 0.372-0.164l0.95-1.019 0.424-0.465-0.041 0.964v6.6a0.541 0.541 0 0 0 0.55 0.53zm-3.719 5.1h7.424a1.818 1.818 0 0 0 2.065-2.037v-6.419a1.82 1.82 0 0 0-2.065-2.044h-1.777v1.128h1.743a0.884 0.884 0 0 1 0.978 0.991v6.269a0.884 0.884 0 0 1-0.978 0.991h-7.349a0.881 0.881 0 0 1-0.978-0.991v-6.269a0.881 0.881 0 0 1 0.978-0.991h1.75v-1.128h-1.791a1.823 1.823 0 0 0-2.064 2.044v6.419a1.818 1.818 0 0 0 2.064 2.037z"
                          fill="currentColor"/>
                </svg>

                <span class="pr-0.5">Export</span>
            </button>
        </div>

        <div class="flex items-center justify-end space-x-2">
            <div class="relative text-gray-500 focus-within:text-black">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg width="18" height="18" viewBox="0 0 18 18">
                        <path d="m7.901 12.852a4.98 4.98 0 0 0 2.857-0.9l2.987 2.987a0.8 0.8 0 0 0 0.581 0.232 0.778 0.778 0 0 0 0.785-0.806 0.778 0.778 0 0 0-0.226-0.57l-2.967-2.974a4.971 4.971 0 0 0 0.991-2.98 5.022 5.022 0 0 0-5.008-5.011 5.018 5.018 0 0 0-5.011 5.011 5.022 5.022 0 0 0 5.011 5.011zm0-1.169a3.864 3.864 0 0 1-3.849-3.842 3.864 3.864 0 0 1 3.849-3.842 3.863 3.863 0 0 1 3.84 3.842 3.863 3.863 0 0 1-3.84 3.842z"
                              fill="currentColor"/>
                    </svg>
                </span>

                <input type="text"
                       placeholder="Search"
                       autocomplete="off"
                       class="appearance-none placeholder-gray-500 pl-8 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black"
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'assistants-table-tools'
}
</script>
