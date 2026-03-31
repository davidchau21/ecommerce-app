<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    categories: Array
});
</script>

<template>
    <Head title="Manage Categories" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-black text-slate-900 tracking-tight leading-none">Collections & Categories</h2>
                <Link href="#" class="pill-button bg-slate-900 text-white uppercase text-[10px] tracking-widest font-black">
                    New Category
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="space-y-4">
                    <div v-for="category in categories" :key="category.id" class="premium-card p-8 flex justify-between items-center">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">{{ category.name }}</h3>
                            <p class="text-sm text-slate-500 italic mt-1">{{ category.description }}</p>
                            <p class="text-[10px] uppercase font-black tracking-widest text-slate-400 mt-4">{{ category.slug }}</p>
                        </div>
                        <div class="flex gap-6 items-center">
                            <span class="text-xs font-bold text-slate-400">12 Items</span>
                            <div class="flex gap-4">
                                <button class="text-xs font-bold uppercase tracking-widest text-blue-600 hover:underline italic">Edit</button>
                                <button class="text-xs font-bold uppercase tracking-widest text-red-400 hover:underline italic">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
