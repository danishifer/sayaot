<template>
    <dashboard-layout>
        <template #headerBack>
            <back-link :href="route('students')">
                Students
            </back-link>
        </template>

        <template #header>
            <h2 class="font-medium text-2xl text-black leading-tight">
                Add Student
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
              class="sm:px-6 lg:px-8 py-6 bg-gray-100 border-t border-gray-200 min-h-full">
            <student-profile-form-section :form="form" :homerooms="homerooms" />

            <jet-section-border/>

            <student-assistants-form-section :form="form" :assistants="assistants" />
        </form>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import AssistantProfileFormSection from "@/Pages/Assistant/AssistantProfileFormSection";
import BackLink from "@/Pages/Assistant/BackLink";
import AssistantJobFormSection from "@/Pages/Assistant/AssistantJobFormSection";
import StudentProfileFormSection from "@/Pages/Student/StudentProfileFormSection";
import StudentAssistantsFormSection from "@/Pages/Student/StudentAssistantsFormSection";

export default {
    props: {
        assistants: Array,
        homerooms: Array,
    },
    components: {
        StudentAssistantsFormSection,
        DashboardLayout,
        BackLink,
        StudentProfileFormSection,

        JetSectionBorder,
    },
    data() {
        return {
            form: this.$inertia.form({
                initials: '',
                homeroom: '',
                assistants: {},
            })
        }
    },
    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    homeroom: this.homerooms.find(h => h.code === this.form.homeroom).id,
                    assistants: Object.keys(data.assistants).filter(key => data.assistants[key]),
                }))
                .post(this.route('students'));
        }
    }
}
</script>
