<template>
    <dashboard-layout>
        <template #headerBack>
            <back-link :href="route('assistants')">
                All Assistants
            </back-link>
        </template>

        <template #header>
            <h2 class="font-medium text-2xl text-black leading-tight">
                Add Assistant
            </h2>
        </template>

        <template #headerActions>
            <button type="submit" :disabled="form.processing"
                    form="create-assistant-form"
                    class="px-3 py-1.5 text-white bg-primary hover:bg-primary-dark text-sm font-medium rounded-md focus:ring focus:ring-primary-lighter focus:outline-none">
                Save
            </button>
        </template>

        <form @submit.prevent="submit"
              id="create-assistant-form"
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
import AssistantProfileFormSection from "@/Pages/Assistant/AssistantProfileFormSection";
import BackLink from "@/Pages/Assistant/BackLink";
import AssistantJobFormSection from "@/Pages/Assistant/AssistantJobFormSection";

export default {
    props: {
        programs: Array,
        strengths: Array,
        students: Array,
        positions: Array
    },
    components: {
        AssistantJobFormSection,
        BackLink,
        AssistantProfileFormSection,
        JetSectionBorder,
        DashboardLayout,
    },
    data() {
        return {
            form: this.$inertia.form({
                firstName: '',
                lastName: '',
                phone: '',
                email: '',
                position: '',
                programs: {},
                strengths: {},
                students: {}
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
                .post(this.route('assistants'));
        }
    }
}
</script>
