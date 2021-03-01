<template>
    <fieldset>
        <legend class="font-medium text-sm text-gray-700">Programs</legend>
        <div class="mt-4 space-y-4">
            <div class="flex items-start" v-for="program in programs">
                <div class="flex items-center h-5">
                    <jet-checkbox :id="'program-'+program.id"
                                  :checked="form.programs[program.id]"
                                  v-model="form.programs[program.id]"/>
                </div>
                <div class="ml-3 text-sm">
                    <label :for="'program-'+program.id" class="font-medium text-gray-900" v-text="program.name"/>
                    <p class="text-gray-500" v-text="program.description"/>
                </div>
            </div>
        </div>
    </fieldset>
</template>
<script>
import JetCheckbox from "@/Jetstream/Checkbox"

export default {
    name: 'assistant-programs-input',
    components: {JetCheckbox},
    props: {
        programs: Array,
        form: Object
    },
    mounted() {
        console.log(this.form.programs)
    }
}
</script>
