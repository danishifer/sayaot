<template>
    <dashboard-layout>
        <template #header>
            <h2 class="font-medium text-2xl text-black leading-tight">
                Assistants
            </h2>
        </template>

        <template #headerActions>
            <inertia-link :href="route('assistants.create')"
                          as="button"
                          class="px-3 py-1.5 text-white bg-primary hover:bg-primary-dark text-sm font-medium rounded-md focus:ring focus:ring-primary-lighter focus:outline-none">
                Add Assistant
            </inertia-link>
        </template>

        <template #headerNav>
            <header-nav-item :active="!this.filter.position" @click="this.filter.position = null">
                All Assistants
            </header-nav-item>
            <header-nav-item v-for="position in positions"
                             v-text="position.name"
                             :active="this.filter.position === position.id"
                             @click="this.filter.position = position.id"
            />
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <assistants-table-tools/>

                <assistants-table :assistants="assistants" :filter="filter"/>
            </div>
        </div>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import HeaderNavItem from "@/Components/HeaderNavItem";
import AssistantsTable from "@/Pages/Assistant/AssistantsTable";
import AssistantsTableTools from "@/Pages/AssistantsTableTools";

export default {
    props: {
        assistants: Array,
        positions: Array
    },
    components: {
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
}
</script>
