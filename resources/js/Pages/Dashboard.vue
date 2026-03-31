<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="My Account" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-3xl font-black text-slate-900 leading-tight">Welcome back, {{ $page.props.auth.user.name }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
                <!-- Overview Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="premium-card p-8">
                        <p class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-2">Total Spent</p>
                        <p class="text-3xl font-black text-slate-900 leading-none tracking-tighter">$1,240.00</p>
                    </div>
                    <div class="premium-card p-8">
                        <p class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-2">Items in Bag</p>
                        <p class="text-3xl font-black text-slate-900 leading-none tracking-tighter">3</p>
                    </div>
                    <div class="premium-card p-8 bg-slate-900 text-white">
                        <p class="text-[10px] uppercase font-black tracking-widest text-slate-300 mb-2">Loyalty Tier</p>
                        <p class="text-3xl font-black leading-none tracking-tighter">CURATOR SILVER</p>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="premium-card overflow-hidden">
                    <div class="p-8 border-b border-slate-100 flex justify-between items-center bg-white">
                        <h3 class="text-xl font-bold text-slate-900">Your Recent Activity</h3>
                        <Link :href="route('products.index')" class="text-[10px] uppercase font-black tracking-widest text-blue-600 hover:text-blue-800">
                            Visit Store
                        </Link>
                    </div>
                    <div class="p-8 italic text-slate-400 text-center py-20">
                        <p class="mb-4">No recent orders found.</p>
                        <Link :href="route('products.index')" class="pill-button bg-slate-900 text-white inline-block">
                            Explore Current Collection
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
