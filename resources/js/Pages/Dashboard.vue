<template>
    <dashboard-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <welcome />
                </div>
            </div>
        </div>
    </dashboard-layout>
</template>

<script>
    import Welcome from '@/Jetstream/Welcome'
    import DashboardLayout from "@/Layouts/DashboardLayout";

    export default {
        components: {
            DashboardLayout,
            Welcome,
        },
    }
</script>
