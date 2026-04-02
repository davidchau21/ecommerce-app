<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

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

    <MainLayout>
        <main class="pt-32 pb-24 max-w-7xl mx-auto px-8">
            <div class="mb-16">
                <p class="font-label text-xs uppercase tracking-widest text-primary font-bold mb-2">Shopping Bag</p>
                <h1 class="text-5xl font-extrabold tracking-tighter text-on-surface">Your Selection</h1>
            </div>

            <div v-if="!cartItems || cartItems.length === 0" class="text-center py-20">
                <p class="text-on-surface-variant text-lg mb-8 uppercase tracking-widest font-bold">Your bag is empty.</p>
                <Link :href="route('products.index')" class="bg-gradient-to-br from-primary to-primary-container text-white py-4 px-6 rounded-full font-bold tracking-tight inline-block hover:opacity-90 transition-opacity">Start Shopping</Link>
            </div>

            <div v-else class="flex flex-col lg:flex-row gap-16">
                <!-- Cart Items List -->
                <div class="flex-grow space-y-12">
                    <div v-for="item in cartItems" :key="item.id" class="flex flex-col md:flex-row gap-8 items-start md:items-center group border-b border-surface-container-high pb-8">
                        <div class="w-full md:w-32 aspect-[3/4] bg-surface-container rounded-lg overflow-hidden shrink-0">
                            <img :src="item.product.image_url" :alt="item.product.name" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                        </div>
                        <div class="flex-grow w-full">
                            <div class="flex justify-between items-start mb-1">
                                <h3 class="text-xl font-bold tracking-tight">{{ item.product.name }}</h3>
                                <span class="text-lg font-semibold">${{ item.product.price }}</span>
                            </div>
                            <p class="text-on-surface-variant text-sm mb-6 max-w-sm">{{ item.product.category?.name }}</p>
                            <div class="flex items-center space-x-8">
                                <!-- Quantity Selector -->
                                <div class="flex items-center bg-surface-container-high rounded-full px-4 py-2">
                                    <button @click="updateQuantity(item.id, item.quantity - 1)" class="hover:text-primary transition-colors flex items-center">
                                        <span class="material-symbols-outlined text-lg">remove</span>
                                    </button>
                                    <span class="mx-6 font-bold text-sm">{{ item.quantity }}</span>
                                    <button @click="updateQuantity(item.id, item.quantity + 1)" class="hover:text-primary transition-colors flex items-center">
                                        <span class="material-symbols-outlined text-lg">add</span>
                                    </button>
                                </div>
                                <!-- Remove Button -->
                                <button @click="removeItem(item.id)" class="flex items-center text-on-surface-variant hover:text-tertiary transition-colors text-xs uppercase tracking-widest font-bold">
                                    <span class="material-symbols-outlined text-sm mr-2">delete</span>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Checkout Sidebar -->
                <aside class="w-full lg:w-[400px]">
                    <div class="sticky top-32 bg-surface-container-lowest p-8 rounded-xl shadow-sm border border-outline-variant/15">
                        <h2 class="text-2xl font-bold tracking-tight mb-8">Order Summary</h2>
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between items-center text-on-surface-variant">
                                <span class="text-sm font-medium">Subtotal</span>
                                <span class="text-sm font-bold">${{ total }}</span>
                            </div>
                            <div class="flex justify-between items-center text-on-surface-variant">
                                <span class="text-sm font-medium">Shipping</span>
                                <span class="text-sm font-bold">Calculated at checkout</span>
                            </div>
                            <div class="pt-4 border-t border-outline-variant/15 flex justify-between items-center">
                                <span class="text-lg font-bold">Total</span>
                                <span class="text-2xl font-extrabold tracking-tighter text-primary">${{ total }}</span>
                            </div>
                        </div>
                        <Link :href="route('checkout.index')" class="w-full bg-gradient-to-br from-primary to-primary-container text-white py-4 px-6 rounded-full font-bold tracking-tight hover:opacity-90 transition-opacity flex items-center justify-center space-x-2 block text-center">
                            <span>Proceed to Checkout</span>
                            <span class="material-symbols-outlined text-lg">arrow_forward</span>
                        </Link>
                        <div class="mt-8 pt-8 border-t border-outline-variant/15">
                            <div class="flex items-center space-x-4 mb-4">
                                <span class="material-symbols-outlined text-primary">verified</span>
                                <p class="text-xs font-medium leading-relaxed">Secure transaction with 256-bit SSL encryption. We accept all major cards and digital wallets.</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="material-symbols-outlined text-primary">local_shipping</span>
                                <p class="text-xs font-medium leading-relaxed">Complimentary climate-neutral shipping on all orders over $500.</p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </main>
    </MainLayout>
</template>
