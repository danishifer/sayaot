<template>
    <dashboard-layout>
        <template #header>
            <h2 class="font-medium text-2xl text-black leading-tight">
                Schedules
            </h2>
        </template>

        <!--        <template #headerActions>-->
        <!--            <inertia-link :href="route('students.create')"-->
        <!--                          as="button"-->
        <!--                          class="px-3 py-1.5 text-white bg-primary hover:bg-primary-dark text-sm font-medium rounded-md focus:ring focus:ring-primary-lighter focus:outline-none">-->
        <!--                Add Student-->
        <!--            </inertia-link>-->
        <!--        </template>-->

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <data-table>
                    <template #header>
                        <th class="px-3 py-2 w-12 text-xs text-gray-500">
                            <checkbox/>
                        </th>
                        <th class="w-1/6 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Homeroom</th>
                        <th class="w-40 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Code</th>
                        <th class="w-1/3 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Grade</th>
                        <th class="w-40 px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Students</th>
                    </template>

                    <tr v-if="homerooms.length > 0"
                        v-for="homeroom in homerooms"
                        @click="show(homeroom.id)"
                        class="hover:bg-gray-50 cursor-pointer">

                        <td class="text-center">
                            <div class="flex items-center justify-center">
                                <checkbox/>
                            </div>
                        </td>

                        <td class="py-3 px-3">
                            <p class="text-gray-600 text-sm" v-text="homeroom.name"/>
                        </td>

                        <td class="px-3">
                            <p class="text-gray-600 text-sm" v-text="homeroom.code"/>
                        </td>

                        <td class="px-3">
                            <p class="text-gray-600 text-sm" v-text="homeroom.grade.name"/>
                        </td>

                        <td class="px-3">
                            <p class="text-gray-600 text-sm" v-text="homeroom.students.length"/>
                        </td>


<!--                        <td class="px-3">-->
<!--                            <p class="text-gray-600 text-sm">-->
<!--                                <span v-for="(assistant, i) in student.regular_assistants">-->
<!--                                    <span v-if="i !== 0">, </span>-->
<!--                                    <span>{{ assistant.user.first_name }} {{ assistant.user.last_name }}</span>-->
<!--                                </span>-->
<!--                            </p>-->
<!--                        </td>-->
                    </tr>
                    <tr v-else>
                        <td colspan="5" class="text-center py-3 text-sm text-gray-500 bg-gray-50">
                            No schedules
                        </td>
                    </tr>
                </data-table>
            </div>
        </div>
    </dashboard-layout>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import Checkbox from "@/Jetstream/Checkbox";
import DataTable from "@/Components/DataTable";

export default {
    components: {DataTable, Checkbox, DashboardLayout},
    props: {
        homerooms: Array
    },
    methods: {
        show(homeroom) {
            this.$inertia.visit(this.route('schedule', homeroom))
        }
    }
}
</script>
