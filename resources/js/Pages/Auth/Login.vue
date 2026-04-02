<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Sign In" />

        <div class="text-center mb-10">
            <h1 class="text-3xl font-headline font-black tracking-tight text-on-surface mb-2">Welcome Back</h1>
            <p class="text-[10px] font-label uppercase font-bold tracking-[0.2em] text-on-surface-variant">Enter your credentials to access your curate</p>
        </div>

        <div v-if="status" class="mb-6 rounded-xl bg-primary-container p-4 text-xs font-bold text-on-primary-container">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <div>
                <InputLabel for="email" value="Email Address" />

                <TextInput
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="curator@example.com"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <div class="flex justify-between items-center mb-2">
                    <InputLabel for="password" value="Password" class="mb-0" />
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-[10px] font-label uppercase font-bold tracking-[0.2em] text-on-surface-variant hover:text-primary transition-colors"
                    >
                        Forgot?
                    </Link>
                </div>

                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex items-center">
                <Checkbox name="remember" v-model:checked="form.remember" />
                <span class="ms-2 text-[10px] font-label uppercase font-bold tracking-[0.2em] text-on-surface-variant">Keep me signed in</span>
            </div>

            <div class="pt-4">
                <PrimaryButton
                    class="w-full py-5 text-sm tracking-widest"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Sign In to Account
                </PrimaryButton>
            </div>

            <div class="text-center pt-8 border-t border-outline-variant/15">
                <p class="text-[10px] font-label uppercase font-bold tracking-[0.2em] text-on-surface-variant mb-4">New to the collection?</p>
                <Link
                    :href="route('register')"
                    class="text-[10px] font-label uppercase font-bold tracking-[0.2em] text-primary hover:text-primary-container transition-colors"
                >
                    Create an Account
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
