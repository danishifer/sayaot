<template>
    <dashboard-layout>
        <template #headerBack>
            <back-link :href="route('schedules')">
                All Schedules
            </back-link>
        </template>

        <template #header>
            <h2 class="font-medium text-2xl text-black leading-tight">
                {{ homeroom.name }}
            </h2>
        </template>

        <schedule-calendar />

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
import ScheduleCalendar from "@/Pages/Schedule/ScheduleCalendar";

export default {
    props: {
        homeroom: Object,
    },
    components: {
        ScheduleCalendar,
        StudentAssistantsFormSection,
        DashboardLayout,
        BackLink,
        StudentProfileFormSection,

        JetSectionBorder,
    },
    data() {
        return {
        }
    },
}
</script>
