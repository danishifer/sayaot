<template>
    <div class="shadow-md grid grid-cols-calendar items-center py-1.5 text-sm text-center relative">
        <div></div>
        <div class="font-medium">
            <span class="mr-2">Sunday</span>
            <div class="px-3 h-8 bg-primary text-white rounded-full inline-flex items-center">
                Feb 28
            </div>
        </div>
        <div>Monday 29</div>
        <div>Tuesday 30</div>
    </div>

    <div class="grid grid-cols-calendar divide-x divide-y border-b">
        <div class="flex items-center justify-end pr-3 leading-tight relative" style="border:0">
            <div class="absolute -bottom-2 text-xs text-gray-500">08:30</div>
        </div>
        <div class="bg-gray-100 h-6" v-for="_ in 6" />

        <template v-for="i in [1,2]">
            <div class="flex items-center justify-end pr-3 text-sm leading-tight relative" style="border:0">
                <span class="font-medium" v-text="i" />
                <div class="absolute -bottom-2 text-xs text-gray-500">09:15</div>
            </div>
            <div class="h-16">Math lesson</div>
            <div>Math lesson</div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </template>

        <div style="border:0"></div>
        <div class="bg-gray-100 h-6" v-for="_ in 6" />
    </div>
</template>
