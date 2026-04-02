<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ProductCard from '@/Components/ProductCard.vue';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    featuredProducts: Array,
    categories: Array
});
</script>

<template>
    <Head title="Home" />
    <MainLayout>
        <!-- Hero Section -->
        <section class="px-6 py-12 max-w-7xl mx-auto">
            <div class="relative h-[870px] rounded-[2rem] overflow-hidden group">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" alt="Minimalist high-end interior with a sculptural chair and dramatic soft lighting, neutral tones and deep blue accents for editorial feel" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDKDCydyluYeAqK0hjn48r5yvMUt23EGUIFBphf1j4b78QvQv3Vsf8E_Yv-ifjv2fE5pToarLESRH7MrIZHLwEGbNmXmei42tweIJun25N7doqU_NK8Kn60ouCxkilEdgOs9ZZ0i70slwXAtkS_5nMDeKfj7f71XOjzSRyGlVvXUGzxvlLbQ0sivMW8vhqpsdom-_b6PszlzTV6BuYvtJNNjuPHIkEFQHbZKaZxLTfNqpiZkVi16FcBu_jyMW87p3HmFAVzNBZr7cw"/>
                <div class="absolute inset-0 bg-gradient-to-tr from-on-surface/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-16 left-16 max-w-2xl">
                    <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.2em] uppercase bg-white/10 backdrop-blur-md text-white rounded-full border border-white/20">
                        Season Exhibit 01
                    </span>
                    <h1 class="text-6xl md:text-8xl font-extrabold text-white leading-[0.95] tracking-tighter mb-8">
                        The Silent <br/><span class="text-primary-fixed-dim italic">Collection</span>
                    </h1>
                    <p class="text-white/80 text-lg mb-10 max-w-md font-body leading-relaxed">
                        Curating the intersection of brutalist architecture and textile softness. A limited drop of everyday artifacts.
                    </p>
                    <Link :href="route('products.index')" class="bg-gradient-to-r from-primary to-primary-container text-white px-10 py-4 rounded-full font-bold flex items-center gap-3 transition-all hover:gap-5 hover:shadow-2xl hover:shadow-primary/30 inline-flex w-fit">
                        Shop Now
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Category Grid (The Curated Tray) -->
        <section class="py-24 relative z-10">
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex justify-between items-end mb-16">
                    <div>
                        <span class="text-primary font-bold uppercase tracking-widest text-xs">Categories</span>
                        <h2 class="text-4xl font-extrabold tracking-tight mt-2">Browse by Archive</h2>
                    </div>
                    <Link :href="route('products.index')" class="text-on-surface-variant font-semibold hover:text-primary flex items-center gap-2 group">
                        Explore All <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">east</span>
                    </Link>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    <div v-for="category in categories" :key="category.id" class="bg-surface-container-lowest p-8 rounded-xl flex flex-col items-center justify-center gap-4 transition-all hover:bg-surface-bright hover:shadow-xl hover:shadow-on-surface/5 group cursor-pointer border border-transparent hover:border-outline-variant/15">
                        <div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl">category</span>
                        </div>
                        <span class="font-bold text-sm tracking-wide">{{ category.name }}</span>
                    </div>
                    <div class="hidden lg:flex bg-surface-container-lowest p-8 rounded-xl flex-col items-center justify-center gap-4 transition-all hover:bg-surface-bright hover:shadow-xl hover:shadow-on-surface/5 group cursor-pointer border border-transparent hover:border-outline-variant/15">
                        <div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-3xl">palette</span>
                        </div>
                        <span class="font-bold text-sm tracking-wide">Art Prints</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="bg-surface-container py-24">
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
                    <div class="max-w-xl">
                        <span class="text-tertiary font-bold uppercase tracking-widest text-xs">Featured Exhibition</span>
                        <h2 class="text-5xl font-extrabold tracking-tighter mt-4 leading-none">Essentials for the <br/>Modern Studio</h2>
                    </div>
                    <p class="text-on-surface-variant max-w-xs text-sm leading-relaxed">
                        A curated selection of objects that define productivity through aesthetic clarity and tactile feedback.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <ProductCard
                        v-for="product in featuredProducts" 
                        :key="product.id" 
                        :product="product" 
                    />
                </div>
            </div>
        </section>

        <!-- Trending Section (Bento Grid) -->
        <section class="py-24 max-w-7xl mx-auto px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-bold uppercase tracking-widest text-xs">The Current Pulse</span>
                <h2 class="text-4xl font-extrabold tracking-tight mt-2">Trending Exhibits</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-6 h-[800px]">
                <div class="md:col-span-2 md:row-span-2 bg-surface-container-low rounded-3xl overflow-hidden relative group">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAulDPZLdSEsqzl77yqfg4Lg-zBUeNZys6ykBTHp6dPqiIdKqHuZCvyF1dRt2HekBpBBXhtMpsediuaPrAHbI92bJJu_KM35FIs4LgL1dC_IuLSVrQ6bOP6a5gVvlW8of3aH0dpw2uSx0QrIPHadi4DjXlotmVQZCDelQ7TfNLaAVNQEMUGk8HHR4nWrrWOnmYg5U5Ddx1e0JO-en_bWBT_Tq7h13LrqYhc9HWtn7YQwpxN0gZ5wSNKQYc1J3O0DmFyXnlAp5APquc"/>
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute bottom-10 left-10">
                        <h4 class="text-3xl font-extrabold text-white mb-2">The Orbit Series</h4>
                        <Link :href="route('products.index')" class="text-white text-sm font-bold flex items-center gap-2 underline underline-offset-8">Shop Selection</Link>
                    </div>
                </div>
                <div class="md:col-span-2 bg-surface-container-low rounded-3xl overflow-hidden relative group">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBEtH0CIENh4hRFXPLkp6svgydkgPpTvWszs7qBS2qD49RGe8WnBm7dW4wBygcnIVcoSM5IxEzQLmEO2xZzq27KN79OIT9eIxiZRZDi_0KuVTBCXwt_8cWuhjqM8mNwIe280AL3xLZ9CFuEuNkV--PKs8hD79zWjyBN-zN66XtkGMoTSIInvQBvUMs1p7Kc_FHaCPLzpkJaXNCX_ErDx0vWZWuzr77ywMSOX2KrAL-aEi4P0RqkXJviu1lPEMViDkAy1Qwq3e6pOvc"/>
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute top-8 left-8">
                        <span class="text-[10px] bg-primary text-white px-3 py-1 rounded-full font-black uppercase tracking-widest">New</span>
                        <h4 class="text-2xl font-bold mt-4">Precision 01</h4>
                    </div>
                </div>
                <!-- Static Placeholders for layout completeness -->
                <div class="bg-surface-container-low rounded-3xl overflow-hidden relative group">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpfEEpkspnp3ehgNatKxfhLgh7UHQ-9jvTCeFN3G05is63ZUFsOrM6PdXoPYSNPXLOOf6zU10Gg77CrgXp0QxxQDSydrt_66BtBtKlhHDfdvpfB9O3d-pI86wZW9lqnyYYTGCK_3THnnlUa44Qo6rdACwhAoBopAcdPAJX9TeMYdNWtocHcHD6MbZoZF_mHwivfuKyrcNxPEed_Qy4KBCcSqKNEi1JjrTzGtEetx2he_PWegv_geRLT4ObizX840xIDxPz26-7AXs"/>
                </div>
                <div class="bg-surface-container-low rounded-3xl overflow-hidden relative group">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoF7kmviFzvcDb8eHYr1f54IUaga63Py4mdN0-6G3UUgIoe6rowrv0qRJC_UkGT64Cz9a3DVHRyppVHFtQKSbM0dMfXc_9MS7T2KpEgc1avEoq8Jx2GVW8D1cPHgCDhLEVT05zE63YDVhlAG5wnexruC87glv-IrpWbsHSbS4Jeit6FgiVFJT3sqtsevh3Gpkrv4RppOW0w0RwdSmx_dCmEfRbNL-S8opQTmywZbxuAeJcsEKaUJ2PMhE4yQ93Nkg0C-QLx7fgOvg"/>
                </div>
            </div>
        </section>
    </MainLayout>
</template>
