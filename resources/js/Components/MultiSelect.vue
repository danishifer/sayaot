<template>
    <div class="mt-1 relative">
        <button type="button"
                aria-haspopup="listbox"
                aria-expanded="true"
                aria-labelledby="listbox-label"
                class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm"
                @click="open = !open">

            <span class="flex items-center">
                <span class="block truncate">
                    <span v-if="selectedDisplay.length > 0" v-for="(selected, i) in selectedDisplay">
                        <span v-if="i !== 0">, </span>
                        <span>{{ formatSelected(selected) }}</span>
                    </span>
                    <span v-else class="text-gray-500">
                        Choose
                    </span>
                </span>
            </span>
            <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg width="18" height="18" viewBox="0 0 18 18">
                    <path d="m9.004 12.209a0.67 0.67 0 0 0 0.485-0.217l4.977-5.093a0.635 0.635 0 0 0 0.191-0.458 0.636 0.636 0 0 0-0.653-0.649 0.663 0.663 0 0 0-0.465 0.191l-4.535 4.647-4.547-4.648a0.64 0.64 0 0 0-0.465-0.191 0.641 0.641 0 0 0-0.649 0.649 0.635 0.635 0 0 0 0.191 0.458l4.977 5.094a0.67 0.67 0 0 0 0.493 0.217z"
                          fill="currentColor"/>
                </svg>
            </span>
        </button>

        <!-- Full Screen Dropdown Overlay -->
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false"></div>

        <transition
            enter-active-class=""
            enter-from-class=""
            enter-to-class=""
            leave-active-class="transition ease-in duration-100"
            leave-from-class="transform opacity-100"
            leave-to-class="transform opacity-0">
            <div v-show="open" class="absolute z-50 mt-1 w-full rounded-md bg-white shadow-lg">
                <ul tabindex="-1"
                    role="listbox"
                    aria-labelledby="listbox-label"
                    class="max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">

                    <li v-for="item in items" id="listbox-{{item.id}}"
                        role="option"
                        class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9 cursor-pointer"
                        :class="{'bg-gray-200': hovering === item.id}"
                        @mouseenter="hovering = item.id"
                        @mouseleave="hovering = ''"
                        @click="toggle(item)"
                    >
                        <div class="flex items-center">
                            <slot name="item" v-bind="{item, selected: isSelected(item)}"></slot>
                        </div>

                        <!-- Checkmark -->
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4" v-if="isSelected(item)">
                            <svg width="18" height="18" viewBox="0 0 18 18">
                                <path d="m7.646 14.558a0.806 0.806 0 0 0 0.7-0.383l6.1-9.563a0.963 0.963 0 0 0 0.18-0.514 0.626 0.626 0 0 0-0.663-0.656 0.642 0.642 0 0 0-0.6 0.369l-5.744 9.133-2.967-3.862a0.677 0.677 0 0 0-0.595-0.328 0.644 0.644 0 0 0-0.684 0.663 0.836 0.836 0 0 0 0.205 0.513l3.357 4.245a0.852 0.852 0 0 0 0.711 0.383z"
                                      fill="currentColor"/>
                            </svg>
                        </span>
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>
<script>
import {onMounted, onUnmounted, ref} from "vue";

export default {
    name: 'multi-select',
    props: {
        items: Array,
        formatSelected: Function,
        modelValue: {}
    },
    emits: ['update:modelValue'],
    setup() {
        let open = ref(false)

        const closeOnEscape = (e) => {
            if (open.value && e.keyCode === 27) {
                open.value = false
            }
        }

        onMounted(() => document.addEventListener('keydown', closeOnEscape))
        onUnmounted(() => document.removeEventListener('keydown', closeOnEscape))

        return {
            open,
        }
    },
    data() {
        return {
            hovering: '',
        }
    },
    computed: {
        selectedDisplay() {
            return Object.values(this.modelValue).filter(e => e);
        }
    },
    methods: {
        toggle(item) {
            this.$emit('update:modelValue', {
                ...this.modelValue,
                [item.id]: this.modelValue[item.id] ? false : item
            });
        },
        isSelected(item) {
            return !!this.modelValue[item.id];
        }
    }
}
</script>
