<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    stats: Object,
    recentOrders: Array
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <div class="max-w-7xl mx-auto p-12 space-y-16">
            <!-- Hero Header Section -->
            <section class="flex flex-col md:flex-row md:items-end justify-between gap-8">
                <div>
                    <span class="text-xs font-label uppercase tracking-[0.2em] text-[#002b92] font-semibold mb-2 block">Management Dashboard</span>
                    <h2 class="text-5xl font-headline font-extrabold tracking-tight text-[#191c1d]">Executive Overview</h2>
                </div>
                <div class="flex items-center gap-4 bg-[#f3f4f5] p-2 rounded-xl">
                    <button class="px-4 py-2 text-sm font-medium bg-[#ffffff] text-[#191c1d] rounded-lg shadow-sm">Last 30 Days</button>
                    <button class="px-4 py-2 text-sm font-medium text-[#434654] hover:bg-[#e7e8e9] transition-colors rounded-lg">Last Quarter</button>
                    <button class="p-2 text-[#434654] hover:bg-[#e7e8e9] rounded-lg flex items-center">
                        <span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span>
                    </button>
                </div>
            </section>

            <!-- Metric Bento Grid -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Metric Card 1 -->
                <div class="bg-[#ffffff] p-8 rounded-xl transition-all hover:bg-[#f8f9fa] hover:shadow-2xl hover:shadow-black/5 shadow-sm border border-[#e1e3e4]/50">
                    <div class="flex justify-between items-start mb-6">
                        <div class="p-3 bg-[#003ec7]/10 rounded-lg">
                            <span class="material-symbols-outlined text-[#003ec7]" data-icon="analytics">analytics</span>
                        </div>
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">+12.4%</span>
                    </div>
                    <p class="text-xs font-label uppercase tracking-widest text-[#434654] mb-1">Total Sales</p>
                    <h3 class="text-3xl font-headline font-bold text-[#191c1d] tracking-tighter">${{ stats.revenue?.toLocaleString() || '128,430.00' }}</h3>
                    <div class="mt-6 h-1 w-full bg-[#edeeef] rounded-full overflow-hidden">
                        <div class="h-full bg-[#003ec7] w-[70%]"></div>
                    </div>
                </div>

                <!-- Metric Card 2 -->
                <div class="bg-[#ffffff] p-8 rounded-xl transition-all hover:bg-[#f8f9fa] hover:shadow-2xl hover:shadow-black/5 shadow-sm border border-[#e1e3e4]/50">
                    <div class="flex justify-between items-start mb-6">
                        <div class="p-3 bg-blue-100/50 rounded-lg">
                            <span class="material-symbols-outlined text-[#4e5b92]" data-icon="shopping_cart">shopping_cart</span>
                        </div>
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">+8.2%</span>
                    </div>
                    <p class="text-xs font-label uppercase tracking-widest text-[#434654] mb-1">Total Orders</p>
                    <h3 class="text-3xl font-headline font-bold text-[#191c1d] tracking-tighter">{{ stats.orders || '1,240' }}</h3>
                    <div class="mt-6 h-1 w-full bg-[#edeeef] rounded-full overflow-hidden">
                        <div class="h-full bg-[#4e5b92] w-[45%]"></div>
                    </div>
                </div>

                <!-- Metric Card 3 -->
                <div class="bg-[#ffffff] p-8 rounded-xl transition-all hover:bg-[#f8f9fa] hover:shadow-2xl hover:shadow-black/5 shadow-sm border border-[#e1e3e4]/50">
                    <div class="flex justify-between items-start mb-6">
                        <div class="p-3 bg-red-100/50 rounded-lg">
                            <span class="material-symbols-outlined text-[#952301]" data-icon="person_celebrate">person_celebrate</span>
                        </div>
                        <span class="text-xs font-bold text-rose-600 bg-rose-50 px-2 py-1 rounded-full">-2.1%</span>
                    </div>
                    <p class="text-xs font-label uppercase tracking-widest text-[#434654] mb-1">Active Users</p>
                    <h3 class="text-3xl font-headline font-bold text-[#191c1d] tracking-tighter">8,922</h3>
                    <div class="mt-6 h-1 w-full bg-[#edeeef] rounded-full overflow-hidden">
                        <div class="h-full bg-[#952301] w-[82%]"></div>
                    </div>
                </div>
            </section>

            <!-- Table Section -->
            <section class="space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-2xl font-headline font-bold text-[#191c1d]">Recent Orders</h4>
                        <p class="text-sm text-[#434654]">Real-time update of curation transactions</p>
                    </div>
                    <button class="text-sm font-bold text-[#002b92] hover:underline decoration-2 underline-offset-4">View All Activity</button>
                </div>

                <div class="bg-[#ffffff] rounded-xl overflow-hidden shadow-sm border border-[#e1e3e4]/50">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#f3f4f5]">
                                <th class="px-8 py-5 text-[10px] font-label uppercase tracking-[0.2em] text-[#434654]">Order ID</th>
                                <th class="px-8 py-5 text-[10px] font-label uppercase tracking-[0.2em] text-[#434654]">Curator</th>
                                <th class="px-8 py-5 text-[10px] font-label uppercase tracking-[0.2em] text-[#434654]">Status</th>
                                <th class="px-8 py-5 text-[10px] font-label uppercase tracking-[0.2em] text-[#434654] text-right">Value</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#edeeef]">
                            <tr class="hover:bg-[#f3f4f5] transition-colors group">
                                <td class="px-8 py-6 font-mono text-sm text-[#002b92] font-bold">#DC-98210</td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-[#e7e8e9] overflow-hidden flex items-center justify-center font-bold text-xs">
                                            ER
                                        </div>
                                        <span class="text-sm font-semibold text-[#191c1d]">Elena Rodriguez</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-800">Delivered</span>
                                </td>
                                <td class="px-8 py-6 text-right font-bold text-[#191c1d]">$1,420.00</td>
                            </tr>
                            <tr class="hover:bg-[#f3f4f5] transition-colors group">
                                <td class="px-8 py-6 font-mono text-sm text-[#002b92] font-bold">#DC-98211</td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-[#e7e8e9] overflow-hidden flex items-center justify-center font-bold text-xs">
                                            MT
                                        </div>
                                        <span class="text-sm font-semibold text-[#191c1d]">Marcus Thorne</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-blue-100 text-blue-800">Shipped</span>
                                </td>
                                <td class="px-8 py-6 text-right font-bold text-[#191c1d]">$3,850.00</td>
                            </tr>
                            <tr class="hover:bg-[#f3f4f5] transition-colors group">
                                <td class="px-8 py-6 font-mono text-sm text-[#002b92] font-bold">#DC-98212</td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-[#e7e8e9] overflow-hidden flex items-center justify-center font-bold text-xs">
                                            SJ
                                        </div>
                                        <span class="text-sm font-semibold text-[#191c1d]">Sarah Jenkins</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-100 text-amber-800">Pending</span>
                                </td>
                                <td class="px-8 py-6 text-right font-bold text-[#191c1d]">$940.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Secondary Insight Grid -->
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 pb-12">
                <div class="space-y-6">
                    <h4 class="text-xl font-headline font-bold text-[#191c1d]">Platform Growth</h4>
                    <div class="bg-[#f3f4f5] h-64 rounded-xl flex items-end p-8 gap-4 border border-[#e1e3e4]/50">
                        <div class="flex-1 bg-[#003ec7]/20 rounded-t-lg h-[40%] hover:bg-[#003ec7]/40 transition-colors cursor-pointer"></div>
                        <div class="flex-1 bg-[#003ec7]/20 rounded-t-lg h-[60%] hover:bg-[#003ec7]/40 transition-colors cursor-pointer"></div>
                        <div class="flex-1 bg-[#003ec7]/20 rounded-t-lg h-[45%] hover:bg-[#003ec7]/40 transition-colors cursor-pointer"></div>
                        <div class="flex-1 bg-[#003ec7]/20 rounded-t-lg h-[80%] hover:bg-[#003ec7]/40 transition-colors cursor-pointer"></div>
                        <div class="flex-1 bg-[#003ec7]/20 rounded-t-lg h-[55%] hover:bg-[#003ec7]/40 transition-colors cursor-pointer"></div>
                        <div class="flex-1 bg-[#003ec7]/20 rounded-t-lg h-[90%] hover:bg-[#003ec7]/40 transition-colors cursor-pointer"></div>
                        <div class="flex-1 bg-[#003ec7] rounded-t-lg h-[100%] shadow-lg shadow-[#003ec7]/40 cursor-pointer"></div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h4 class="text-xl font-headline font-bold text-[#191c1d]">Top Categories</h4>
                    <div class="space-y-4">
                        <div class="bg-[#ffffff] p-4 rounded-xl flex items-center justify-between border border-[#e1e3e4]/50 shadow-sm">
                            <div class="flex items-center gap-4">
                                <span class="w-3 h-3 rounded-full bg-[#003ec7]"></span>
                                <span class="text-sm font-semibold text-[#191c1d] font-headline">Minimalist Architecture</span>
                            </div>
                            <span class="text-sm font-mono font-bold text-[#434654]">42%</span>
                        </div>
                        <div class="bg-[#ffffff] p-4 rounded-xl flex items-center justify-between border border-[#e1e3e4]/50 shadow-sm">
                            <div class="flex items-center gap-4">
                                <span class="w-3 h-3 rounded-full bg-[#4e5b92]"></span>
                                <span class="text-sm font-semibold text-[#191c1d] font-headline">Sustainable Textiles</span>
                            </div>
                            <span class="text-sm font-mono font-bold text-[#434654]">28%</span>
                        </div>
                        <div class="bg-[#ffffff] p-4 rounded-xl flex items-center justify-between border border-[#e1e3e4]/50 shadow-sm">
                            <div class="flex items-center gap-4">
                                <span class="w-3 h-3 rounded-full bg-[#952301]"></span>
                                <span class="text-sm font-semibold text-[#191c1d] font-headline">Digital Artifacts</span>
                            </div>
                            <span class="text-sm font-mono font-bold text-[#434654]">30%</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </AdminLayout>
</template>
