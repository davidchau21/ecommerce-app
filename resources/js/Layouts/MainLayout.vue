<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-surface flex flex-col">
        <!-- TopNavBar -->
        <nav class="fixed top-0 w-full z-50 bg-surface/80 dark:bg-slate-900/80 backdrop-blur-md">
            <div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
                <div class="flex items-center gap-12">
                    <Link href="/" class="text-2xl font-bold tracking-tighter text-on-surface dark:text-white">CURATOR</Link>
                    <div class="hidden md:flex gap-8 items-center">
                        <Link href="/products" class="text-primary dark:text-blue-400 font-bold border-b-2 border-primary transition-colors py-1">New Arrivals</Link>
                        <Link href="/collections" class="text-on-surface-variant dark:text-slate-400 hover:text-primary dark:hover:text-blue-300 transition-colors py-1">Collections</Link>
                        <Link href="/editorial" class="text-on-surface-variant dark:text-slate-400 hover:text-primary dark:hover:text-blue-300 transition-colors py-1">Editorial</Link>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <div class="hidden lg:flex items-center bg-surface-container px-4 py-2 rounded-full w-64">
                        <span class="material-symbols-outlined text-outline text-sm">search</span>
                        <input class="bg-transparent border-none focus:ring-0 text-sm w-full placeholder:text-on-surface-variant/50" placeholder="Search exhibits..." type="text"/>
                    </div>
                    <div class="flex gap-4 items-center">
                        <Link href="/cart" class="text-on-surface hover:text-primary transition-all active:scale-95">
                            <span class="material-symbols-outlined" data-icon="shopping_cart">shopping_cart</span>
                        </Link>
                        <Link href="/profile" class="text-on-surface hover:text-primary transition-all active:scale-95">
                            <span class="material-symbols-outlined" data-icon="person">person</span>
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <main class="pt-20 flex-grow">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="w-full border-t border-outline-variant/15 bg-surface-container dark:bg-slate-950 mt-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-8 py-16 max-w-7xl mx-auto">
                <div class="col-span-1 md:col-span-1">
                    <span class="text-lg font-bold text-on-surface dark:text-white mb-6 block">CURATOR</span>
                    <p class="text-on-surface-variant text-sm leading-relaxed max-w-xs">
                        Elevating the ordinary through thoughtful curation and editorial storytelling. Founded in 2024.
                    </p>
                    <div class="flex gap-4 mt-8">
                        <a class="w-10 h-10 rounded-full border border-outline-variant/30 flex items-center justify-center hover:bg-primary hover:text-white transition-colors" href="#">
                            <span class="material-symbols-outlined text-sm">share</span>
                        </a>
                        <a class="w-10 h-10 rounded-full border border-outline-variant/30 flex items-center justify-center hover:bg-primary hover:text-white transition-colors" href="#">
                            <span class="material-symbols-outlined text-sm">public</span>
                        </a>
                    </div>
                </div>
                <div>
                    <span class="text-xs uppercase tracking-widest font-bold mb-8 block text-primary">Experience</span>
                    <ul class="space-y-4">
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">About</a></li>
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">The Journal</a></li>
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">Sustainability</a></li>
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">Retail Spaces</a></li>
                    </ul>
                </div>
                <div>
                    <span class="text-xs uppercase tracking-widest font-bold mb-8 block text-primary">Client Services</span>
                    <ul class="space-y-4">
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">Help</a></li>
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">Shipping</a></li>
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">Returns</a></li>
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">Order Status</a></li>
                    </ul>
                </div>
                <div>
                    <span class="text-xs uppercase tracking-widest font-bold mb-8 block text-primary">Manifesto</span>
                    <ul class="space-y-4">
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">Terms</a></li>
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">Privacy</a></li>
                        <li><a class="text-on-surface-variant dark:text-slate-500 hover:text-primary transition-opacity text-sm" href="#">Accessibility</a></li>
                    </ul>
                    <div class="mt-8 pt-8 border-t border-outline-variant/15">
                        <p class="text-[10px] text-on-surface-variant/50 font-label uppercase tracking-widest leading-loose">
                            © 2024 CURATOR E-COMMERCE. ALL RIGHTS RESERVED.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
