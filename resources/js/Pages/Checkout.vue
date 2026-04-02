<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    cartItems: Array,
    total: Number
});

const form = useForm({
    notes: '',
    shipping_address: '',
    payment_method: 'credit_card'
});

const submitOrder = () => {
    form.post(route('orders.store'), {
        onSuccess: () => {
            // Handled by redirect to dashboard
        },
    });
};
</script>

<template>
    <Head title="Checkout" />

    <div class="min-h-screen bg-surface selection:bg-primary-fixed selection:text-on-primary-fixed">
        <!-- Task Focused Simplified Nav -->
        <nav class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md">
            <div class="flex justify-between items-center px-8 py-6 max-w-7xl mx-auto">
                <Link href="/" class="text-2xl font-bold tracking-tighter text-on-surface uppercase font-headline">
                    CURATOR
                </Link>
                <div class="flex items-center gap-4 text-on-surface-variant font-label text-sm uppercase tracking-widest">
                    <span class="material-symbols-outlined text-sm">lock</span>
                    Secure Checkout
                </div>
            </div>
        </nav>

        <main class="pt-32 pb-24 px-8 max-w-7xl mx-auto min-h-screen text-on-surface">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Left Column: Shipping & Info -->
                <div class="lg:col-span-7">
                    <header class="mb-12">
                        <h1 class="text-4xl font-extrabold tracking-tight text-on-surface mb-2 font-headline">Shipping details</h1>
                        <p class="text-on-surface-variant font-body">Please enter your delivery information to continue.</p>
                    </header>
                    <form @submit.prevent="submitOrder" class="space-y-10">
                        <!-- Identity Section -->
                        <section>
                            <div class="flex items-center gap-3 mb-6">
                                <span class="w-8 h-8 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-sm">1</span>
                                <h2 class="text-xl font-bold font-headline">Contact information</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant font-label px-1">Full Name</label>
                                    <input type="text" class="w-full px-5 py-4 bg-surface-container-high border-none rounded-lg focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all duration-200 outline-none" placeholder="Alex Sterling" />
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant font-label px-1">Phone Number</label>
                                    <input type="tel" class="w-full px-5 py-4 bg-surface-container-high border-none rounded-lg focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all duration-200 outline-none" placeholder="+1 (555) 000-0000" />
                                </div>
                            </div>
                        </section>

                        <!-- Shipping Section -->
                        <section>
                            <div class="flex items-center gap-3 mb-6">
                                <span class="w-8 h-8 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-sm">2</span>
                                <h2 class="text-xl font-bold font-headline">Shipping address</h2>
                            </div>
                            <div class="space-y-6">
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant font-label px-1">Street Address</label>
                                    <input v-model="form.shipping_address" type="text" class="w-full px-5 py-4 bg-surface-container-high border-none rounded-lg focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all duration-200 outline-none" placeholder="123 Gallery Way, Suite 400" required />
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant font-label px-1">Order Notes (Optional)</label>
                                    <textarea v-model="form.notes" rows="3" class="w-full px-5 py-4 bg-surface-container-high border-none rounded-lg focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all duration-200 outline-none" placeholder="Instructions..."></textarea>
                                </div>
                            </div>
                        </section>

                        <!-- Payment Preview -->
                        <section>
                            <div class="flex items-center gap-3 mb-6">
                                <span class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center font-bold text-sm border border-outline-variant/15">3</span>
                                <h2 class="text-xl font-bold font-headline">Payment method</h2>
                            </div>
                            <div class="p-6 border border-outline-variant/15 border-2 rounded-lg text-center bg-surface-container-lowest flex items-center justify-center gap-4 cursor-not-allowed">
                                <span class="material-symbols-outlined text-primary">credit_card</span>
                                <span class="font-bold text-slate-900 text-lg">Digital Credit / Card</span>
                            </div>
                        </section>
                    </form>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="lg:col-span-5">
                    <div class="sticky top-32">
                        <div class="bg-surface-container-lowest rounded-xl p-8 shadow-sm ring-1 ring-outline-variant/10">
                            <h2 class="text-2xl font-bold font-headline mb-8 pb-6 border-b border-outline-variant/10 text-on-surface">Order summary</h2>
                            <!-- Item List -->
                            <div class="space-y-8 mb-8" v-if="cartItems">
                                <div v-for="item in cartItems" :key="item.id" class="flex gap-4">
                                    <div class="w-20 h-24 bg-surface-container rounded-lg overflow-hidden flex-shrink-0">
                                        <img class="w-full h-full object-cover" :src="item.product.image_url" :alt="item.product.name" />
                                    </div>
                                    <div class="flex-grow flex flex-col justify-between py-1">
                                        <div>
                                            <h4 class="font-bold text-on-surface font-headline leading-tight">{{ item.product.name }}</h4>
                                            <p class="text-xs font-label uppercase tracking-widest text-on-surface-variant mt-1">{{ item.product.category?.name }}</p>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-medium text-on-surface-variant">Qty: {{ item.quantity }}</span>
                                            <span class="font-bold text-primary font-headline">${{ item.product.price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Calculations -->
                            <div class="space-y-4 pt-8 border-t border-outline-variant/10">
                                <div class="flex justify-between text-sm">
                                    <span class="text-on-surface-variant font-medium">Subtotal</span>
                                    <span class="text-on-surface font-bold font-headline">${{ total }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-on-surface-variant font-medium">Shipping</span>
                                    <span class="text-green-600 font-bold font-headline uppercase tracking-widest text-[10px]">Free</span>
                                </div>
                                <div class="flex justify-between text-xl font-bold pt-4 text-on-surface">
                                    <span class="font-headline">Total</span>
                                    <span class="font-headline text-primary">${{ total }}</span>
                                </div>
                            </div>
                            
                            <!-- CTA -->
                            <button @click="submitOrder" class="w-full mt-10 bg-gradient-to-br from-primary to-primary-container text-on-primary py-5 rounded-full font-bold uppercase tracking-widest text-sm hover:opacity-90 transition-all duration-300 shadow-lg shadow-primary/20 flex items-center justify-center gap-2 group">
                                Place Final Order
                                <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </button>
                            <div class="mt-6 flex items-center justify-center gap-2 text-[10px] font-label uppercase tracking-[0.2em] text-on-surface-variant opacity-60">
                                <span class="material-symbols-outlined text-xs">verified_user</span>
                                Encrypted 256-bit security
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="w-full border-t border-outline-variant/15 bg-surface-container">
            <div class="px-8 py-6 max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
                <span class="text-[10px] font-label uppercase tracking-widest text-on-surface-variant/60 relative">
                    <Link :href="route('products.index')" class="hover:text-primary transition-colors absolute -top-8 -left-0 md:static p-2 md:p-0 underline">Return to shop</Link>
                    <span class="hidden md:inline mx-4">|</span>
                    © 2026 CURATOR E-COMMERCE. ALL RIGHTS RESERVED.
                </span>
            </div>
        </footer>
    </div>
</template>
