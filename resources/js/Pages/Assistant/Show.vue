<template>
    <dashboard-layout>
        <template #headerBack>
            <back-link :href="route('assistants')">
                All Assistants
            </back-link>
        </template>

        <template #header>
            <h2 class="font-medium text-2xl text-black leading-tight">
                {{ $props.assistant.user.first_name }} {{ $props.assistant.user.last_name }}
            </h2>
        </template>

        <template #headerActions>
            <button type="submit" :disabled="form.processing"
                    form="update-assistant-form"
                    class="px-3 py-1.5 text-white bg-primary hover:bg-primary-dark text-sm font-medium rounded-md focus:ring focus:ring-primary-lighter focus:outline-none">
                Save
            </button>
        </template>

        <form @submit.prevent="submit"
              id="update-assistant-form"
              class="sm:px-6 lg:px-8 py-6 bg-gray-100 border-t border-gray-200">
            <assistant-profile-form-section :form="form"/>

            <jet-section-border/>

            <assistant-job-form-section :form="form"
                                        :programs="programs"
                                        :students="students"
                                        :strengths="strengths"
                                        :positions="positions"/>
        </form>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import BackLink from "@/Pages/Assistant/BackLink";
import AssistantProfileFormSection from "@/Pages/Assistant/AssistantProfileFormSection";
import AssistantJobFormSection from "@/Pages/Assistant/AssistantJobFormSection";

export default {
    components: {
        AssistantJobFormSection,
        DashboardLayout,
        JetSectionBorder,
        BackLink,
        AssistantProfileFormSection,
    },
    props: {
        assistant: Object,
        positions: Array,
        students: Array,
        programs: Array,
        strengths: Array
    },
    data() {
        return {
            form: this.$inertia.form({
                firstName: this.assistant.user.first_name,
                lastName: this.assistant.user.last_name,
                phone: this.assistant.user.phone,
                email: this.assistant.user.email,
                position: this.assistant.position_id,
                programs: this.assistant.programs.reduce((acc, program) => {
                    acc[program.id] = true;
                    return acc;
                }, {}),
                strengths: this.assistant.strengths.reduce((acc, strength) => {
                    acc[strength.id] = true;
                    return acc;
                }, {}),
                students: this.assistant.regular_students.reduce((acc, student) => {
                    acc[student.id] = student.code;
                    return acc;
                }, {})
            })
        }
    },
    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    programs: Object.keys(data.programs).filter(key => data.programs[key]),
                    strengths: Object.keys(data.strengths).filter(key => data.strengths[key]),
                    students: Object.keys(data.students).filter(key => data.students[key]),
                }))
                .put(this.route('assistant', this.assistant.id));
        }
    }
}
</script>
