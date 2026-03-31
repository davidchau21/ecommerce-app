<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ProductCard from '@/Components/ProductCard.vue';
import NavLink from '@/Components/NavLink.vue';

defineProps({
    featuredProducts: Array,
    categories: Array
});
</script>

<template>
    <Head title="Home" />

    <div class="min-h-screen bg-[#f8f9fa]">
        <!-- High-End Navigation -->
        <nav class="bg-white/80 backdrop-blur-xl sticky top-0 z-50 py-6 border-b border-white/20">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center text-slate-900">
                <Link href="/" class="text-2xl font-black tracking-tighter">THE DIGITAL CURATOR</Link>
                <div class="flex gap-8 items-center uppercase text-[10px] tracking-widest font-bold">
                    <Link :href="route('products.index')" class="hover:text-blue-600">Shop All</Link>
                    <Link href="#" class="hover:text-blue-600">Cart (0)</Link>
                    <Link :href="route('login')" class="hover:text-blue-600">Login</Link>
                </div>
            </div>
        </nav>

        <!-- Kinetic Hero Banner -->
        <section class="max-w-7xl mx-auto px-6 py-20">
            <div class="relative h-[600px] rounded-[2rem] overflow-hidden group shadow-2xl">
                <img 
                    src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2000" 
                    class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105"
                    alt="Hero"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex flex-col justify-end p-16">
                    <div class="max-w-2xl">
                        <span class="text-white/80 uppercase tracking-widest font-bold text-xs mb-4 block">New Season Arrival</span>
                        <h1 class="text-6xl font-black text-white leading-[1.1] tracking-tight mb-8">Curated for the Modern Minimalist.</h1>
                        <Link :href="route('products.index')" class="pill-button bg-white text-slate-900 border-none inline-block">Explore Collection</Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Section -->
        <main class="max-w-7xl mx-auto px-6 pb-20">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-blue-600 uppercase tracking-widest font-bold text-[10px] mb-2 block">Premium Listing</span>
                    <h2 class="text-4xl font-black text-slate-900 tracking-tight">Featured Items</h2>
                </div>
                <Link :href="route('products.index')" class="text-xs font-bold uppercase tracking-widest text-slate-400 hover:text-slate-900 flex items-center gap-2">
                    View Entire Store
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </Link>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <ProductCard 
                    v-for="product in featuredProducts" 
                    :key="product.id" 
                    :product="product" 
                />
            </div>
        </main>
    </div>
</template>
