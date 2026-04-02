<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    product: Object
});
</script>

<template>
    <div class="group">
        <Link :href="route('products.show', product.id)">
            <div class="relative aspect-[4/5] bg-surface-container-lowest rounded-2xl overflow-hidden mb-6 flex items-center justify-center p-12 transition-all group-hover:shadow-2xl group-hover:shadow-primary/5">
                <img 
                    :src="product.image_url || 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=2000'" 
                    :alt="product.name"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                <button class="absolute bottom-6 right-6 w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center opacity-0 translate-y-4 transition-all group-hover:opacity-100 group-hover:translate-y-0 hover:bg-primary-container z-10" @click.prevent="">
                    <span class="material-symbols-outlined">add</span>
                </button>
            </div>
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-bold text-xl tracking-tight mb-1">{{ product.name }}</h3>
                    <span class="text-xs font-bold text-on-surface-variant/60 uppercase tracking-widest">{{ product.category?.name || 'Category' }}</span>
                </div>
                <span class="text-primary font-bold text-lg">${{ product.price }}</span>
            </div>
        </Link>
    </div>
</template>
