<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    products: Object
});
</script>

<template>
    <Head title="Manage Products" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-black text-slate-900 tracking-tight">Products Inventory</h2>
                <Link :href="route('admin.products.create')" class="pill-button bg-slate-900 text-white uppercase text-[10px] tracking-widest font-black shrink-0">
                    Add New Product
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="premium-card overflow-hidden">
                    <div class="p-8 border-b border-slate-100 italic">
                        <div class="flex gap-4 items-center">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Filter:</span>
                            <div class="tonal-surface px-4 py-1 flex items-center text-[10px] uppercase font-black tracking-widest text-slate-600">
                                All Categories
                            </div>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 text-[10px] uppercase font-black tracking-widest text-slate-400">
                                <tr>
                                    <th class="px-8 py-4">Product Name</th>
                                    <th class="px-8 py-4">Price</th>
                                    <th class="px-8 py-4">Stock</th>
                                    <th class="px-8 py-4">Status</th>
                                    <th class="px-8 py-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr v-for="product in products.data" :key="product.id" class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 bg-slate-100 rounded-lg overflow-hidden shrink-0">
                                                <img :src="product.image_url" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-900">{{ product.name }}</p>
                                                <p class="text-[10px] uppercase font-bold text-slate-400 italic tracking-widest">{{ product.category?.name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 font-bold text-slate-900">${{ product.price }}</td>
                                    <td class="px-8 py-6">
                                        <span :class="product.stock < 10 ? 'text-red-500' : 'text-slate-600'" class="font-bold">{{ product.stock }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span v-if="product.is_active" class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-[10px] uppercase font-bold">Active</span>
                                        <span v-else class="px-3 py-1 rounded-full bg-slate-100 text-slate-400 text-[10px] uppercase font-bold">Draft</span>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex gap-4 justify-end">
                                            <button class="text-xs font-bold uppercase tracking-widest text-blue-600 hover:text-blue-800 italic">Edit</button>
                                            <button class="text-xs font-bold uppercase tracking-widest text-red-400 hover:text-red-600 italic">Delete</button>
                                        </div>
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
