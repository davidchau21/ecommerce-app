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

    <div class="min-h-screen bg-[#f8f9fa]">
        <!-- Navbar -->
        <nav class="bg-white/80 backdrop-blur-xl sticky top-0 z-50 py-6 border-b border-white/20">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center text-slate-900">
                <Link href="/" class="text-2xl font-black tracking-tighter">THE DIGITAL CURATOR</Link>
                <div class="flex gap-8 items-center uppercase text-[10px] tracking-widest font-bold">
                    <Link :href="route('products.index')" class="hover:text-blue-600">Cancel</Link>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-6 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                <!-- Order Form -->
                <div class="space-y-16">
                    <section>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight mb-8">Shipping Details</h2>
                        <div class="space-y-6">
                            <div class="tonal-surface p-1">
                                <input v-model="form.address" placeholder="Shipping Address" class="w-full bg-white rounded-lg border-none focus:ring-2 focus:ring-blue-600 p-4" />
                            </div>
                            <div class="tonal-surface p-1">
                                <textarea v-model="form.notes" placeholder="Order Notes (Optional)" rows="4" class="w-full bg-white rounded-lg border-none focus:ring-2 focus:ring-blue-600 p-4"></textarea>
                            </div>
                        </div>
                    </section>

                    <section>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight mb-8">Payment</h2>
                        <div class="premium-card p-6 border-2 border-blue-600 bg-blue-50/20">
                            <div class="flex items-center gap-4">
                                <div class="w-4 h-4 rounded-full border-4 border-blue-600 bg-white"></div>
                                <span class="font-bold text-slate-900 text-lg">Digital Credit / Card</span>
                            </div>
                        </div>
                    </section>

                    <button 
                        @click="submitOrder"
                        class="pill-button bg-slate-900 text-white w-full py-5 text-xl font-black uppercase tracking-widest shadow-2xl shadow-blue-900/20"
                    >
                        Place Final Order
                    </button>
                </div>

                <!-- Bag Overview -->
                <aside>
                    <div class="premium-card p-10 sticky top-32" v-if="cartItems">
                        <h3 class="text-[10px] uppercase font-black tracking-widest text-slate-400 mb-8 border-b pb-4 border-slate-100">Review Your Selection</h3>
                        <div class="space-y-6 mb-10">
                            <div v-for="item in cartItems" :key="item.id" class="flex justify-between items-center text-sm">
                                <div class="flex gap-4 items-center">
                                    <span class="font-bold text-slate-900">{{ item.quantity }}x</span>
                                    <span class="text-slate-600">{{ item.product.name }}</span>
                                </div>
                                <span class="font-bold text-slate-900 text-xs">${{ item.product.price * item.quantity }}</span>
                            </div>
                        </div>
                        <div class="space-y-4 pt-6 border-t border-slate-100">
                            <div class="flex justify-between text-sm text-slate-500">
                                <span>Subtotal</span>
                                <span>${{ total }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-slate-500 font-bold text-green-600">
                                <span>Shipping</span>
                                <span>FREE</span>
                            </div>
                            <div class="pt-6 flex justify-between font-black text-slate-900 text-2xl">
                                <span>Total</span>
                                <span>${{ total }}</span>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </main>
    </div>
</template>
