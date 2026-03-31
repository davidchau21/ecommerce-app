<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    product: Object
});

const form = useForm({
    product_id: props.product.id,
    quantity: 1,
});

const addToCart = () => {
    form.post(route('cart.store'), {
        preserveScroll: true,
        onSuccess: () => {
            // Optional: Show toast or animation
        },
    });
};
</script>

<template>
    <Head :title="product.name" />

    <div class="min-h-screen bg-[#f8f9fa]">
        <!-- Navbar -->
        <nav class="bg-white/80 backdrop-blur-xl sticky top-0 z-50 py-6 border-b border-white/20">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center text-slate-900">
                <Link href="/" class="text-2xl font-black tracking-tighter">THE DIGITAL CURATOR</Link>
                <div class="flex gap-8 items-center uppercase text-[10px] tracking-widest font-bold">
                    <Link :href="route('products.index')" class="hover:text-blue-600">Shop All</Link>
                    <Link href="#" class="hover:text-blue-600">Cart (0)</Link>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-6 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                <!-- Image Gallery (Simplified) -->
                <div class="aspect-square bg-white rounded-3xl overflow-hidden shadow-2xl">
                    <img 
                        :src="'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=1000'" 
                        class="w-full h-full object-cover"
                    />
                </div>

                <!-- Info -->
                <div class="py-4">
                    <span class="text-blue-600 uppercase tracking-widest font-bold text-[10px] mb-4 block">{{ product.category?.name }}</span>
                    <h1 class="text-5xl font-black text-slate-900 tracking-tight leading-none mb-6">{{ product.name }}</h1>
                    <p class="text-2xl font-bold text-slate-800 mb-8">${{ product.price }}</p>

                    <div class="prose prose-slate mb-12">
                        <p class="text-slate-500 text-lg leading-relaxed">{{ product.description }}</p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="tonal-surface flex items-center px-4 py-2 gap-4">
                                <button @click="form.quantity--" :disabled="form.quantity <= 1" class="w-8 h-8 rounded-full hover:bg-white transition-colors">-</button>
                                <span class="font-bold text-slate-900 w-4 text-center">{{ form.quantity }}</span>
                                <button @click="form.quantity++" class="w-8 h-8 rounded-full hover:bg-white transition-colors">+</button>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Available Stock: {{ product.stock }}</span>
                        </div>

                        <button 
                            @click="addToCart"
                            class="pill-button bg-slate-900 text-white w-full py-4 uppercase tracking-widest font-black"
                        >
                            Add to Shopping Bag
                        </button>
                    </div>

                    <!-- Tonal details -->
                    <div class="mt-16 grid grid-cols-2 gap-8 pt-8 border-t border-slate-200">
                        <div>
                            <h4 class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-2">Shipping</h4>
                            <p class="text-sm text-slate-600">Standard & Express available worldwide.</p>
                        </div>
                        <div>
                            <h4 class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-2">Returns</h4>
                            <p class="text-sm text-slate-600">Complimentary within 30 days.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
