<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    phone_number: '',
    password: '',
    password_confirmation: '',
    terms: false,
    referred_by: '',
    policy_agreement: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <form @submit.prevent="submit" class="space-y-4">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Create an Account</h2>
                <p class="text-gray-600 dark:text-gray-300 mt-1">Join our platform today</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <InputLabel for="name" value="Full Name" />
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="referred_by" value="Referral Code (6 digits)" />
                    <TextInput
                        id="referred_by"
                        v-model="form.referred_by"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="off"
                        placeholder="123456"
                        maxlength="6"
                    />
                    <InputError class="mt-2" :message="form.errors.referred_by" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <InputLabel for="email" value="Email Address" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full"
                        required
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div>
                    <InputLabel for="phone_number" value="Phone Number" />
                    <TextInput
                        id="phone_number"
                        v-model="form.phone_number"
                        type="tel"
                        class="mt-1 block w-full"
                        required
                        autocomplete="tel"
                    />
                    <InputError class="mt-2" :message="form.errors.phone_number" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div>
                    <InputLabel for="password_confirmation" value="Confirm Password" />
                    <TextInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />
                    </div>
                    <div class="ms-3 text-sm">
                        <label for="terms" class="font-medium text-gray-700 dark:text-gray-300">
                            I agree to the <a target="_blank" :href="route('terms')" class="text-blue-600 dark:text-blue-400 hover:underline">Terms of Service</a>
                        </label>
                        <InputError class="mt-2" :message="form.errors.terms" />
                    </div>
                </div>
            </div>

            <!-- Policy Agreement Checkbox -->
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <Checkbox id="policy_agreement" v-model:checked="form.policy_agreement" name="policy_agreement" required />
                </div>
                <div class="ms-3 text-sm">
                    <label for="policy_agreement" class="font-medium text-gray-700 dark:text-gray-300">
                        I have read and agree to the <Link :href="route('privacy')" class="text-blue-600 dark:text-blue-400 hover:underline">Privacy Policy</Link>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <Link :href="route('login')" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">
                    Already have an account? Login
                </Link>

                <PrimaryButton
                    class="px-6 py-2"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing || !form.policy_agreement"
                >
                    Register Now
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
