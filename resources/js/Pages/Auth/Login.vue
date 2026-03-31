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
            <h1 class="text-2xl font-black tracking-tight text-slate-900 mb-2">Welcome Back</h1>
            <p class="text-[10px] uppercase font-black tracking-widest text-slate-400">Enter your credentials to access your curate</p>
        </div>

        <div v-if="status" class="mb-6 rounded-xl bg-green-50 p-4 text-xs font-bold text-green-600">
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
                        class="text-[10px] uppercase font-black tracking-widest text-slate-400 hover:text-slate-900 transition-colors"
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
                <span class="ms-2 text-[10px] uppercase font-black tracking-widest text-slate-400">Keep me signed in</span>
            </div>

            <div class="pt-4">
                <PrimaryButton
                    class="w-full py-4 text-xs tracking-widest"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Sign In to Account
                </PrimaryButton>
            </div>

            <div class="text-center pt-8 border-t border-slate-100">
                <p class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-4">New to the collection?</p>
                <Link
                    :href="route('register')"
                    class="text-[10px] uppercase font-black tracking-widest text-blue-600 hover:text-blue-800 transition-colors"
                >
                    Create an Account
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
