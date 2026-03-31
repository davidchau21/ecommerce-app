<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    stats: Object,
    recentOrders: Array
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-3xl font-black text-slate-900 leading-tight">Admin Console</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="premium-card p-8">
                        <p class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-2">Total Revenue</p>
                        <p class="text-3xl font-black text-slate-900">${{ stats.revenue.toLocaleString() }}</p>
                    </div>
                    <div class="premium-card p-8">
                        <p class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-2">Orders Processed</p>
                        <p class="text-3xl font-black text-slate-900">{{ stats.orders }}</p>
                    </div>
                    <div class="premium-card p-8 border-t-4 border-blue-600">
                        <p class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-2">Total Products</p>
                        <p class="text-3xl font-black text-slate-900">{{ stats.products }}</p>
                    </div>
                </div>

                <!-- Recent Activity Table -->
                <div class="premium-card overflow-hidden">
                    <div class="p-8 flex justify-between items-center border-b border-slate-100">
                        <h3 class="text-xl font-bold text-slate-900">Recent Transactions</h3>
                        <Link :href="route('products.index')" class="text-xs font-bold uppercase tracking-widest text-blue-600">View All</Link>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 text-[10px] uppercase font-black tracking-widest text-slate-400">
                                <tr>
                                    <th class="px-8 py-4">Order ID</th>
                                    <th class="px-8 py-4">Customer</th>
                                    <th class="px-8 py-4">Total</th>
                                    <th class="px-8 py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 italic">
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-8 py-6 font-bold text-slate-900">#ORD-492</td>
                                    <td class="px-8 py-6 text-slate-600 text-sm">Alex Rivers</td>
                                    <td class="px-8 py-6 font-bold text-slate-900">$299.00</td>
                                    <td class="px-8 py-6 italic text-sm">
                                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-[10px] uppercase font-bold">Processing</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
