<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ProductCard from '@/Components/ProductCard.vue';

defineProps({
    products: Object,
    categories: Array
});
</script>

<template>
    <Head title="Products" />

    <div class="min-h-screen bg-[#f8f9fa]">
        <!-- Navbar -->
        <nav class="bg-white/80 backdrop-blur-xl sticky top-0 z-50 py-6 border-b border-white/20">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center text-slate-900">
                <Link href="/" class="text-2xl font-black tracking-tighter">THE DIGITAL CURATOR</Link>
                <div class="flex gap-8 items-center uppercase text-[10px] tracking-widest font-bold">
                    <Link :href="route('products.index')" class="text-blue-600">Shop All</Link>
                    <Link href="#" class="hover:text-blue-600">Cart (0)</Link>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-6 py-12">
            <div class="flex flex-col md:flex-row gap-12">
                <!-- Sidebar / Filter -->
                <aside class="w-full md:w-64 space-y-12">
                    <div>
                        <h3 class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-6">Collections</h3>
                        <ul class="space-y-4">
                            <li><Link :href="route('products.index')" class="text-sm font-bold text-slate-900">All Items</Link></li>
                            <li v-for="category in categories" :key="category.id">
                                <Link href="#" class="text-sm font-medium text-slate-500 hover:text-slate-900">{{ category.name }}</Link>
                            </li>
                        </ul>
                    </div>
                </aside>

                <!-- Product Grid -->
                <div class="flex-1">
                    <div class="flex justify-between items-center mb-10">
                        <h2 class="text-2xl font-bold text-slate-900">Shop All</h2>
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-widest">{{ products.data.length }} Results</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <ProductCard 
                            v-for="product in products.data" 
                            :key="product.id" 
                            :product="product" 
                        />
                    </div>

                    <!-- Simple Pagination -->
                    <div v-if="products.links.length > 3" class="mt-16 flex justify-center">
                        <div class="inline-flex gap-2">
                            <Link 
                                v-for="(link, i) in products.links" 
                                :key="i"
                                :href="link.url || '#'"
                                v-html="link.label"
                                class="px-4 py-2 rounded-lg text-sm font-bold transition-colors"
                                :class="link.active ? 'bg-slate-900 text-white' : 'bg-white text-slate-400 hover:text-slate-900'"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
