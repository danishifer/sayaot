<template>
    <inline-form-section>
        <template #title>
            Assistants
        </template>

        <template #description>
            Enter student's assistants.
        </template>

        <template #form>
            <div class="col-span-6">
                <jet-label for="" value="Regular assistants"/>
                <student-regular-assistants-input :form="form" :assistants="assistants" />
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
import StudentRegularAssistantsInput from "@/Pages/Student/StudentRegularAssistantsInput";

export default {
    name: 'student-assistants-form-section',
    components: {
        StudentRegularAssistantsInput,
        AssistantProgramsInput,
        AssistantStrengthsInput,
        InlineFormSection,
        JetLabel,
        JetSelect,
        RegularStudentsInput
    },
    props: {
        form: {},
        assistants: [],
    }
}
</script>
