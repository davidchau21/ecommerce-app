<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex min-h-screen flex-col items-center bg-[#f8f9fa] pt-20 px-6">
        <div>
            <Link href="/" class="text-3xl font-black tracking-tighter text-slate-900 leading-none">
                THE DIGITAL CURATOR
            </Link>
        </div>

        <div class="mt-12 w-full max-w-md overflow-hidden bg-white px-10 py-12 shadow-2xl shadow-slate-200 rounded-[2.5rem] border border-white">
            <slot />
        </div>

        <div class="mt-8 text-center">
            <p class="text-[10px] uppercase font-black tracking-widest text-slate-300 italic">
                Refined selection. Seamless experience.
            </p>
        </div>
    </div>
</template>
