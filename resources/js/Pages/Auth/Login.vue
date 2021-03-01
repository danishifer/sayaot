<template>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo/>
        </template>

        <jet-validation-errors class="mb-4"/>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form id="login-form" @submit.prevent="submit">
            <div v-if="confirming">
                <jet-label for="otc" value="Confirmation Code"/>
                <jet-input id="otc"
                           type="text"
                           autocomplete="one-time-code"
                           class="mt-1 block w-full"
                           v-model="form.otc"
                           required
                           autofocus/>
            </div>
            <div v-else>
                <jet-label for="phone" value="Phone Number"/>
                <phone-input id="phone"
                             class="mt-1 block w-full disabled:bg-gray-200 disabled:opacity-50"
                             v-model="form.phone"
                             required
                             autofocus
                />
            </div>

            <div id="captcha"></div>

            <div class="flex items-center justify-end mt-4">
                <inertia-link v-if="canResetPassword"
                              :href="route('password.request')"
                              class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </inertia-link>

                <jet-button v-if="!confirming" @click="signIn"
                            class="ml-4"
                            :class="{ 'opacity-25': captchaProcessing }"
                            :disabled="captchaProcessing">
                    Log in
                </jet-button>
                <jet-button v-else
                            class="ml-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                    Confirm
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
import JetButton from '@/Jetstream/Button'
import JetInput from '@/Jetstream/Input'
import JetCheckbox from '@/Jetstream/Checkbox'
import JetLabel from '@/Jetstream/Label'
import JetValidationErrors from '@/Jetstream/ValidationErrors'

import * as fb from "../../firebase"
import PhoneInput from "@/Pages/Auth/PhoneInput";

export default {
    components: {
        PhoneInput,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors
    },

    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            confirming: false,
            captchaProcessing: false,
            form: this.$inertia.form({
                password: '',
                phone: '',
                otc: '',
                remember: 'on'
            })
        }
    },

    mounted() {
        window.recaptchaVerifier = new fb.auth.RecaptchaVerifier('captcha', {
            'size': 'invisible',
        });

        window.recaptchaVerifier.render().then((widgetId) => {
            window.recaptchaWidgetId = widgetId;
        });
    },

    computed: {
        intlPhone() {
            return `+972${this.form.phone.substring(1).replace(/\s/g, "")}`;
        }
    },

    methods: {
        signIn() {
            this.captchaProcessing = true;

            window.recaptchaVerifier.verify().then((response) => {
                // reCAPTCHA solved, allow signInWithPhoneNumber.

                const phoneNumber = this.intlPhone;
                fb.auth().signInWithPhoneNumber(phoneNumber, window.recaptchaVerifier)
                    .then((confirmationResult) => {
                        // SMS sent. Prompt user to type the code from the message, then sign the
                        // user in with confirmationResult.confirm(code).
                        window.confirmationResult = confirmationResult;
                        this.confirming = true;
                    }).catch((error) => {
                    // Error; SMS not sent
                    // ...
                    console.error(error)
                });
            })
        },

        submit() {
            const code = this.form.otc;

            confirmationResult.confirm(code).then((result) => {
                // User signed in successfully.
                const user = result.user;
                console.log(user)

                user.getIdToken(true).then(token => {
                    this.form.password = token;
                    console.log(token);

                    this.form
                        .transform(data => ({
                            ...data,
                            phone: this.intlPhone,
                        }))
                        .post(this.route('login'), {
                            onFinish: () => {
                                this.confirming = false;
                                this.form.reset('otc');
                            },
                        });
                }).catch(err => {
                    console.error('failed to get id token:', err)
                });
            }).catch((error) => {
                // TODO: User couldn't sign in (bad verification code?)
                console.error(error)
            });
        }
    }
}
</script>
