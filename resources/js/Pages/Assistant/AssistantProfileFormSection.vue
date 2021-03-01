<template>
    <inline-form-section>
        <template #title>
            Profile Information
        </template>

        <template #description>
            Enter assistant's profile information.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="first_name" value="First name"/>
                <jet-input id="first_name"
                           v-model="form.firstName"
                           type="text"
                           class="mt-1 block w-full text-sm"
                           autocomplete="given-name"
                           required
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <jet-label for="last_name" value="Last name"/>
                <jet-input id="last_name"
                           v-model="form.lastName"
                           type="text"
                           class="mt-1 block w-full text-sm"
                           autocomplete="family-name"
                           required
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <jet-label for="phone_number" value="Phone number"/>
                <jet-input id="phone_number"
                           v-model="form.phone"
                           type="tel"
                           class="mt-1 block w-full text-sm"
                           autocomplete="tel"
                           required
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <jet-label for="email_address" value="Email address"/>
                <jet-input id="email_address"
                           v-model="form.email"
                           type="email"
                           class="mt-1 block w-full text-sm"
                           autocomplete="email"
                           required
                />
            </div>

            <div class="col-span-6">
                <label class="block text-sm font-medium text-gray-700">
                    Photo
                </label>
                <div class="mt-1 flex items-center">
                            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                              <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                              </svg>
                            </span>
                    <button type="button"
                            class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Change
                    </button>
                </div>
            </div>
            <!--                    &lt;!&ndash; Profile Photo &ndash;&gt;-->
            <!--                    <div class="col-span-6 sm:col-span-4" v-if="$page.props.jetstream.managesProfilePhotos">-->
            <!--                        &lt;!&ndash; Profile Photo File Input &ndash;&gt;-->
            <!--                        <input type="file" class="hidden"-->
            <!--                               ref="photo"-->
            <!--                               @change="updatePhotoPreview">-->

            <!--                        <jet-label for="photo" value="Photo"/>-->

            <!--                        &lt;!&ndash; Current Profile Photo &ndash;&gt;-->
            <!--                        <div class="mt-2" v-show="! photoPreview">-->
            <!--                            <img :src="user.profile_photo_url"-->
            <!--                                 :alt="user.name"-->
            <!--                                 class="rounded-full h-20 w-20 object-cover">-->
            <!--                        </div>-->

            <!--                        &lt;!&ndash; New Profile Photo Preview &ndash;&gt;-->
            <!--                        <div class="mt-2" v-show="photoPreview">-->
            <!--                    <span class="block rounded-full w-20 h-20"-->
            <!--                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">-->
            <!--                    </span>-->
            <!--                        </div>-->

            <!--                        <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">-->
            <!--                            Select A New Photo-->
            <!--                        </jet-secondary-button>-->

            <!--                        <jet-secondary-button type="button"-->
            <!--                                              class="mt-2"-->
            <!--                                              @click.prevent="deletePhoto"-->
            <!--                                              v-if="user.profile_photo_path">-->
            <!--                            Remove Photo-->
            <!--                        </jet-secondary-button>-->

            <!--                        <jet-input-error :message="form.errors.photo" class="mt-2"/>-->
            <!--                    </div>-->

            <!--                    &lt;!&ndash; Name &ndash;&gt;-->
            <!--                    <div class="col-span-6 sm:col-span-4">-->
            <!--                        <jet-label for="name" value="Name"/>-->
            <!--                        <jet-input id="name"-->
            <!--                                   type="text"-->
            <!--                                   class="mt-1 block w-full"-->
            <!--                                   v-model="form.name"-->
            <!--                                   autocomplete="name"/>-->
            <!--                        <jet-input-error :message="form.errors.name" class="mt-2"/>-->
            <!--                    </div>-->

            <!--                    &lt;!&ndash; Email &ndash;&gt;-->
            <!--                    <div class="col-span-6 sm:col-span-4">-->
            <!--                        <jet-label for="email" value="Email"/>-->
            <!--                        <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email"/>-->
            <!--                        <jet-input-error :message="form.errors.email" class="mt-2"/>-->
            <!--                    </div>-->
        </template>
    </inline-form-section>
</template>
<script>
import JetInput from "@/Jetstream/Input"
import JetLabel from "@/Jetstream/Label"
import InlineFormSection from "@/Components/InlineFormSection";

export default {
    name: 'assistant-profile-form-section',
    components: {InlineFormSection, JetInput, JetLabel},
    props: {
        form: Object
    }
}
</script>
