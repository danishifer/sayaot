<template>
    <inline-form-section>
        <template #title>
            Job Position
        </template>

        <template #description>
            Enter assistant's job position information.
        </template>

        <template #form>
            <div class="col-span-6">
                <jet-label for="position" value="Position"/>
                <jet-select id="position"
                            name="position"
                            class="mt-1 block w-full"
                            v-model="form.position"
                            required>
                    <option v-for="position in positions" v-text="position.name" :value="position.id"/>
                </jet-select>
            </div>

            <div class="col-span-6">
                <jet-label for="" value="Regular students"/>
                <regular-students-input :form="form" :students="students"/>
            </div>

            <div class="col-span-6">
                <assistant-programs-input :form="form" :programs="programs"/>
            </div>

            <div class="col-span-6">
                <assistant-strengths-input :form="form" :strengths="strengths"/>
            </div>

        </template>
    </inline-form-section>
</template>
<script>
import AssistantProgramsInput from "@/Pages/Assistant/AssistantProgramsInput"
import AssistantStrengthsInput from "@/Pages/Assistant/AssistantStrengthsInput"
import InlineFormSection from "@/Components/InlineFormSection"
import JetLabel from "@/Jetstream/Label"
import JetSelect from "@/Jetstream/Select"
import RegularStudentsInput from "@/Pages/Assistant/AssistantRegularStudentsInput"

export default {
    name: 'assistant-job-form-section',
    components: {
        AssistantProgramsInput,
        AssistantStrengthsInput,
        InlineFormSection,
        JetLabel,
        JetSelect,
        RegularStudentsInput
    },
    props: {
        form: {},
        positions: {},
        students: [],
        programs: [],
        strengths: []
    }
}
</script>
