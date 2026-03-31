<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    product: Object
});
</script>

<template>
    <div class="group premium-card overflow-hidden">
        <Link :href="route('products.show', product.id)">
            <div class="aspect-square bg-slate-100 overflow-hidden relative">
                <img 
                    :src="product.image_url || 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=1000'" 
                    :alt="product.name"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                />
                <div class="absolute top-4 right-4 h-8 px-3 bg-white/80 backdrop-blur-md rounded-full flex items-center shadow-sm">
                    <span class="text-xs font-bold text-slate-800">${{ product.price }}</span>
                </div>
            </div>
            <div class="p-6">
                <p class="text-[10px] uppercase tracking-widest text-slate-400 mb-2 font-bold">{{ product.category?.name }}</p>
                <h3 class="text-xl font-bold text-slate-900 leading-tight mb-2">{{ product.name }}</h3>
                <p class="text-sm text-slate-500 line-clamp-2 h-10">{{ product.description }}</p>
            </div>
        </Link>
    </div>
</template>
