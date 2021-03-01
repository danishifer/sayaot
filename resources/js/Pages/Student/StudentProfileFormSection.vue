<template>
    <inline-form-section>
        <template #title>
            Profile Information
        </template>

        <template #description>
            Enter student's profile information.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="initials" value="Initials"/>
                <jet-input id="initials"
                           v-model="form.initials"
                           type="text"
                           class="mt-1 block w-full text-sm"
                           required
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <jet-label for="code" value="Code"/>
                <jet-input id="code"
                           :value="code()"
                           type="text"
                           disabled
                           class="mt-1 block w-full text-sm bg-gray-50 text-gray-700"
                />
            </div>

            <div class="col-span-6">
                <jet-label for="homeroom" value="Homeroom"/>
                <jet-select id="homeroom"
                            name="homeroom"
                            class="mt-1 block w-full"
                            v-model="form.homeroom"
                            required>
                    <option v-for="homeroom in homerooms" v-text="homeroom.name" :value="homeroom.code"/>
                </jet-select>
            </div>
        </template>
    </inline-form-section>
</template>
<script>
import JetInput from "@/Jetstream/Input"
import JetLabel from "@/Jetstream/Label"
import InlineFormSection from "@/Components/InlineFormSection";
import JetSelect from "@/Jetstream/Select";

export default {
    name: 'student-profile-form-section',
    components: {JetSelect, InlineFormSection, JetInput, JetLabel},
    props: {
        form: Object,
        homerooms: Array,
    },
    methods: {
        code() {
            if (this.form.homeroom && this.form.initials) {
                return this.form.homeroom + this.form.initials
            }

            return ''
        }
    }
}
</script>
