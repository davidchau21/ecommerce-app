<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex min-h-screen flex-col items-center bg-surface pt-20 px-6 selection:bg-primary-fixed selection:text-on-primary-fixed">
        <div>
            <Link href="/" class="text-3xl font-headline font-black tracking-tighter text-on-surface leading-none uppercase">
                THE DIGITAL CURATOR
            </Link>
        </div>

        <div class="mt-12 w-full max-w-md overflow-hidden bg-surface-container-lowest px-10 py-12 shadow-2xl shadow-primary/5 rounded-[2.5rem] border border-outline-variant/15">
            <slot />
        </div>

        <div class="mt-8 text-center">
            <p class="text-[10px] uppercase font-bold tracking-[0.2em] text-on-surface-variant opacity-60">
                Refined selection. Seamless experience.
            </p>
        </div>
    </div>
</template>
