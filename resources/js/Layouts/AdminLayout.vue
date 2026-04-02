<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
</script>

<template>
    <div class="bg-[#f8f9fa] text-[#191c1d] min-h-screen font-body selection:bg-primary-fixed selection:text-on-primary-fixed">
        <!-- SideNavBar -->
        <aside class="fixed left-0 top-0 h-full w-64 z-50 bg-[#f3f4f5] flex flex-col p-6 space-y-2 border-r border-transparent">
            <div class="mb-8">
                <h1 class="text-lg font-black text-[#003ec7] leading-tight font-headline">The Digital Curator</h1>
                <p class="text-[10px] font-medium uppercase tracking-widest text-[#747686] mt-1 font-label">Editorial Admin</p>
            </div>
            
            <nav class="flex-1 space-y-1">
                <!-- Dashboard Active -->
                <Link :href="route('admin.dashboard')" class="flex items-center gap-3 px-4 py-3 text-[#003ec7] font-bold bg-[#ffffff] rounded-lg scale-[0.98] transition-transform">
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    <span class="text-xs uppercase tracking-widest font-label">Dashboard</span>
                </Link>
                <Link :href="route('products.index')" class="flex items-center gap-3 px-4 py-3 text-[#747686] hover:text-[#003ec7] hover:bg-[#e1e3e4] rounded-lg transition-all">
                    <span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
                    <span class="text-xs uppercase tracking-widest font-label">Store</span>
                </Link>
                <!-- Other links -->
                <a class="flex items-center gap-3 px-4 py-3 text-[#747686] hover:text-[#003ec7] hover:bg-[#e1e3e4] rounded-lg transition-all" href="#">
                    <span class="material-symbols-outlined" data-icon="payments">payments</span>
                    <span class="text-xs uppercase tracking-widest font-label">Sales</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-[#747686] hover:text-[#003ec7] hover:bg-[#e1e3e4] rounded-lg transition-all" href="#">
                    <span class="material-symbols-outlined" data-icon="group">group</span>
                    <span class="text-xs uppercase tracking-widest font-label">Users</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-[#747686] hover:text-[#003ec7] hover:bg-[#e1e3e4] rounded-lg transition-all" href="#">
                    <span class="material-symbols-outlined" data-icon="settings">settings</span>
                    <span class="text-xs uppercase tracking-widest font-label">Settings</span>
                </a>
            </nav>
            
            <div class="mt-auto pt-6 border-t border-slate-200">
                <div class="flex items-center gap-3 px-2">
                    <!-- Standard Profile Avatar -->
                    <div class="w-10 h-10 rounded-full bg-[#primary-container] flex items-center justify-center text-[#ffffff] font-bold overflow-hidden bg-blue-600">
                        <span class="material-symbols-outlined absolute text-white opacity-80">person</span>
                        <img v-if="false" alt="Admin Profile Avatar" class="w-10 h-10 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDhV3BKIpvBQvfI8v9MWNJhAIbWrkXphIY0EMcag9HMlTcS0S_tpLHAsQcNbEVLjAJF75F9ZEknBS_Gi0xASU5GMPwtf544ocNYeEXQKTvFwF3J2AVzYXTTuNVoLO70IZotEcFsvtpxpf9xf2qIcdJrB4Oe_mXDj2MOc90idvW4kLSJ53LVjNX_wB9Gr9FJNCUB6OvRMl6uBNsvXOrVdyaILOI0Fj-gPSvtrYpG06UUIFjwJM0o0ZqD3NWie6WMPNcrPEbvKxciWM" />
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#191c1d]">{{ user.name }}</p>
                        <p class="text-[10px] text-[#747686] uppercase tracking-tighter">Lead Curator</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- TopNavBar -->
        <header class="fixed top-0 right-0 w-full z-40 bg-[#f8f9fa]/80 backdrop-blur-xl flex justify-between items-center h-16 px-8 ml-64 pl-72 border-b border-[#e1e3e4]/50">
            <div class="flex items-center bg-[#edeeef] rounded-full px-4 py-1.5 w-96 transition-all focus-within:bg-white focus-within:shadow-sm">
                <span class="material-symbols-outlined text-[#747686] text-sm" data-icon="search">search</span>
                <input class="bg-transparent border-none focus:ring-0 text-sm w-full placeholder:text-[#747686] outline-none ml-2" placeholder="Search curated collections..." type="text"/>
            </div>
            
            <div class="flex items-center gap-6">
                <button class="text-[#747686] hover:bg-[#e1e3e4] p-2 rounded-full transition-colors relative">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-[#002b92] rounded-full"></span>
                </button>
                <button class="text-[#747686] hover:bg-[#e1e3e4] p-2 rounded-full transition-colors">
                    <span class="material-symbols-outlined" data-icon="help">help</span>
                </button>
                <Link :href="route('logout')" method="post" as="button" class="text-xs uppercase tracking-widest font-label font-bold text-red-600 hover:text-red-800 ml-4">
                    Log out
                </Link>
            </div>
        </header>

        <!-- Main Content Canvas -->
        <main class="ml-64 pt-16 min-h-screen">
            <slot />
        </main>
    </div>
</template>
