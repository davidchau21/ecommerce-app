<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen bg-surface selection:bg-primary-fixed selection:text-on-primary-fixed">
        <nav class="bg-surface/80 backdrop-blur-md sticky top-0 z-50 border-b border-outline-variant/15 py-4">
            <!-- Primary Navigation Menu -->
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-12 justify-between items-center">
                    <div class="flex items-center gap-12">
                        <!-- Logo -->
                        <Link :href="route('dashboard')" class="text-2xl font-headline font-black tracking-tighter text-on-surface leading-none uppercase">
                            CURATOR
                        </Link>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:flex uppercase font-label tracking-widest text-xs font-bold mt-1">
                            <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="text-on-surface-variant hover:text-primary transition-colors border-none">
                                Dashboard
                            </NavLink>
                            <Link :href="route('products.index')" class="text-on-surface-variant hover:text-primary transition-colors">
                                Browse Store
                            </Link>
                            <Link v-if="$page.props.auth.user.role === 'admin'" :href="route('admin.dashboard')" class="text-primary hover:text-primary-container transition-colors">
                                Admin Console
                            </Link>
                        </div>
                    </div>

                    <div class="hidden sm:ms-6 sm:flex sm:items-center">
                        <!-- Settings Dropdown -->
                        <div class="relative ms-3">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            class="inline-flex items-center gap-2 rounded-full border-none bg-surface-container px-4 py-2 text-[10px] uppercase font-bold tracking-widest text-on-surface transition duration-150 ease-in-out hover:bg-surface-container-high focus:outline-none"
                                        >
                                            <span class="material-symbols-outlined text-sm">person</span>
                                            {{ $page.props.auth.user.name }}
                                            <span class="material-symbols-outlined text-sm opacity-50">expand_more</span>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')" class="font-label text-xs uppercase tracking-widest text-on-surface"> Profile </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button" class="font-label text-xs uppercase tracking-widest text-on-surface"> Log Out </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="inline-flex items-center justify-center rounded-md p-2 text-on-surface-variant transition duration-150 hover:bg-surface-container focus:outline-none"
                        >
                            <span class="material-symbols-outlined text-2xl">
                                {{ showingNavigationDropdown ? 'close' : 'menu' }}
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden bg-surface-container-lowest border-t border-outline-variant/15 absolute w-full left-0 top-full shadow-xl">
                <div class="space-y-1 pb-3 pt-2">
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')" class="font-label text-xs uppercase tracking-widest font-bold"> Dashboard </ResponsiveNavLink>
                </div>
                <div class="border-t border-outline-variant/15 pb-1 pt-4">
                    <div class="px-4">
                        <div class="text-base font-bold text-on-surface">{{ $page.props.auth.user.name }}</div>
                        <div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">{{ $page.props.auth.user.email }}</div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')" class="font-label text-xs uppercase tracking-widest"> Profile </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button" class="font-label text-xs uppercase tracking-widest text-error"> Log Out </ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header v-if="$slots.header" class="bg-surface-container-lowest/50 border-b border-outline-variant/10">
            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <!-- Page Content -->
        <main class="text-on-surface">
            <slot />
        </main>
    </div>
</template>
