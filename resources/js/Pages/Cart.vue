<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    cartItems: Array,
    total: Number
});

const form = useForm({});

const removeItem = (id) => {
    form.delete(route('cart.destroy', id), {
        preserveScroll: true,
    });
};

const updateQuantity = (id, quantity) => {
    if (quantity < 1) return;
    form.patch(route('cart.update', id), {
        preserveScroll: true,
        data: { quantity }
    });
};
</script>

<template>
    <Head title="Shopping Bag" />

    <div class="min-h-screen bg-[#f8f9fa]">
        <!-- Navbar -->
        <nav class="bg-white/80 backdrop-blur-xl sticky top-0 z-50 py-6 border-b border-white/20">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center text-slate-900">
                <Link href="/" class="text-2xl font-black tracking-tighter">THE DIGITAL CURATOR</Link>
                <div class="flex gap-8 items-center uppercase text-[10px] tracking-widest font-bold">
                    <Link :href="route('products.index')" class="hover:text-blue-600">Shop All</Link>
                    <Link href="#" class="text-blue-600">Cart ({{ cartItems?.length || 0 }})</Link>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-6 py-20">
            <h1 class="text-5xl font-black text-slate-900 tracking-tight leading-none mb-16">Shopping Bag</h1>

            <div v-if="!cartItems || cartItems.length === 0" class="text-center py-20">
                <p class="text-slate-400 text-lg mb-8 uppercase tracking-widest font-bold">Your bag is empty.</p>
                <Link :href="route('products.index')" class="pill-button bg-slate-900 text-white inline-block">Start Shopping</Link>
            </div>

            <div v-else class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                <!-- Items List -->
                <div class="lg:col-span-2 space-y-10">
                    <div v-for="item in cartItems" :key="item.id" class="flex gap-8 pb-10 border-b border-slate-200">
                        <div class="w-32 h-32 bg-white rounded-2xl overflow-hidden shrink-0 shadow-sm">
                            <img :src="item.product.image_url" class="w-full h-full object-cover" />
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">{{ item.product.name }}</h3>
                                    <p class="text-xs text-slate-400 uppercase font-bold tracking-widest">{{ item.product.category.name }}</p>
                                </div>
                                <span class="font-bold text-slate-900">${{ item.product.price }}</span>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <div class="tonal-surface flex items-center px-3 py-1 gap-4 scale-90 origin-left">
                                    <button @click="updateQuantity(item.id, item.quantity - 1)" class="w-6 h-6 rounded-full hover:bg-white transition-colors">-</button>
                                    <span class="font-bold text-slate-900">{{ item.quantity }}</span>
                                    <button @click="updateQuantity(item.id, item.quantity + 1)" class="w-6 h-6 rounded-full hover:bg-white transition-colors">+</button>
                                </div>
                                <button @click="removeItem(item.id)" class="text-[10px] uppercase font-black tracking-widest text-red-500 hover:text-red-700">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary -->
                <aside class="space-y-8">
                    <div class="premium-card p-8">
                        <h2 class="text-xl font-black text-slate-900 tracking-tight mb-8">Summary</h2>
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between text-sm text-slate-500">
                                <span>Subtotal</span>
                                <span>${{ total }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-slate-500">
                                <span>Shipping</span>
                                <span>Calculated at checkout</span>
                            </div>
                            <div class="pt-4 border-t border-slate-200 flex justify-between font-black text-slate-900 text-lg">
                                <span>Total</span>
                                <span>${{ total }}</span>
                            </div>
                        </div>
                        <Link :href="route('checkout.index')" class="pill-button bg-slate-900 text-white w-full text-center block py-4 uppercase tracking-widest font-black">
                            Checkout
                        </Link>
                    </div>

                    <div class="tonal-surface p-6">
                        <p class="text-xs text-slate-500 leading-relaxed italic">
                            Every item is carefully curated and inspected before shipping. 
                        </p>
                    </div>
                </aside>
            </div>
        </main>
    </div>
</template>
