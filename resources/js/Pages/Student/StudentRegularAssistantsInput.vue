<template>
    <multi-select :items="assistants"
                  :format-selected="(selected) => selected.name"
                  v-model="form.assistants">
        <template v-slot:item="props">
            <span class="block font-normal truncate"
                  :class="{ 'font-semibold': props.selected }"
                  v-text="props.item.name"/>
        </template>
    </multi-select>
</template>

<script>
import MultiSelect from "@/Components/MultiSelect";

export default {
    components: {MultiSelect},
    props: {
        assistants: Array,
        form: Object
    },
}
</script>
