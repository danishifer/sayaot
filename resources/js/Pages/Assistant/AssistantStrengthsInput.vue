<template>
    <fieldset>
        <legend class="font-medium text-sm text-gray-700">Strengths</legend>
        <div class="mt-4 grid grid-cols-3 gap-4">
            <div class="flex items-start" v-for="strength in strengths">
                <div class="flex items-center h-5">
                    <jet-checkbox :id="'strength-'+strength.id" :checked="form.strengths[strength.id]" v-model="form.strengths[strength.id]" />
                </div>
                <div class="ml-3 text-sm">
                    <label :for="'strength-'+strength.id" class="font-medium text-gray-900" v-text="strength.name"/>
                </div>
            </div>
        </div>
    </fieldset>
</template>
<script>
import JetCheckbox from "@/Jetstream/Checkbox"

export default {
    name: 'assistant-strengths-input',
    components: {JetCheckbox},
    props: {
        strengths: Array,
        form: Object
    }
}
</script>
