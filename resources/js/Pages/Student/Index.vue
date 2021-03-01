<template>
    <dashboard-layout>
        <template #header>
            <h2 class="font-medium text-2xl text-black leading-tight">
                Students
            </h2>
        </template>

        <template #headerActions>
            <inertia-link :href="route('students.create')"
                          as="button"
                          class="px-3 py-1.5 text-white bg-primary hover:bg-primary-dark text-sm font-medium rounded-md focus:ring focus:ring-primary-lighter focus:outline-none">
                Add Student
            </inertia-link>
        </template>

        <template #headerNav>
            <!--            <header-nav-item :active="!this.filter.position" @click="this.filter.position = null">-->
            <!--                All Assistants-->
            <!--            </header-nav-item>-->
            <!--            <header-nav-item v-for="position in positions"-->
            <!--                             v-text="position.name"-->
            <!--                             :active="this.filter.position === position.id"-->
            <!--                             @click="this.filter.position = position.id"-->
            <!--            />-->
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!--                <assistants-table-tools/>-->

                <data-table>
                    <template #header>
                        <th class="px-3 py-2 w-12 text-xs text-gray-500">
                            <checkbox/>
                        </th>
                        <th class="w-1/6 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Homeroom</th>
                        <th class="w-40 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Initials</th>
                        <th class="w-40 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Code</th>
                        <th class="w-1/3 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Regular
                                                                                                          Assistants
                        </th>
                    </template>

                    <tr v-if="students.length > 0"
                        v-for="student in students"
                        @click="show(student.id)"
                        class="hover:bg-gray-50 cursor-pointer">

                        <td class="text-center">
                            <div class="flex items-center justify-center">
                                <checkbox />
                            </div>
                        </td>

                        <td class="py-3 px-3">
                            <p class="text-gray-600 text-sm" v-text="student.homeroom.name"/>
                        </td>

                        <td class="px-3">
                            <p class="text-gray-600 text-sm" v-text="student.initials"/>
                        </td>

                        <td class="px-3">
                            <p class="text-gray-600 text-sm" v-text="student.code"/>
                        </td>

                        <td class="px-3">
                            <p class="text-gray-600 text-sm">
                                <span v-for="(assistant, i) in student.regular_assistants">
                                    <span v-if="i !== 0">, </span>
                                    <span>{{ assistant.user.first_name }} {{ assistant.user.last_name }}</span>
                                </span>
                            </p>
                        </td>
                    </tr>
                    <tr v-else>
                        <td colspan="5" class="text-center py-3 text-sm text-gray-500 bg-gray-50">
                            No students
                        </td>
                    </tr>
                </data-table>
            </div>
        </div>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import HeaderNavItem from "@/Components/HeaderNavItem";
import AssistantsTable from "@/Pages/Assistant/AssistantsTable";
import AssistantsTableTools from "@/Pages/AssistantsTableTools";
import DataTable from "@/Components/DataTable";
import Checkbox from "@/Jetstream/Checkbox";

export default {
    props: {
        students: Array,
        positions: Array
    },
    components: {
        Checkbox,
        DataTable,
        AssistantsTableTools,
        AssistantsTable,
        HeaderNavItem,
        DashboardLayout,
    },
    data() {
        return {
            filter: {
                position: null
            }
        }
    },
    methods: {
        show(student) {
            this.$inertia.visit(this.route('student', student));
        }
    }
}
</script>
