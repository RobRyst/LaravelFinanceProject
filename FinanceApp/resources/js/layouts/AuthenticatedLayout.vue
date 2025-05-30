<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const isCollapsed = ref(false);
const showingNavigationDropdown = ref(false);
</script>

<template>
    <Head title="Dashboard" />

    <div>
        <div class="flex min-h-screen flex-col bg-gray-100 sm:flex-row">
            <nav
                :class="[
                    'fixed top-0 z-30 hidden h-screen flex-shrink-0 border-r border-gray-100 bg-zinc-800 transition-all duration-300 sm:block',
                    isCollapsed ? 'w-20' : 'w-80',
                ]"
            >
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 flex-col">
                        <div class="space-y-6 px-4 py-6">
                            <div class="flex items-center justify-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo class="block h-9 w-auto fill-current text-white" />
                                </Link>
                            </div>

                            <div
                                :class="[
                                    'flex flex-col gap-4 transition-all duration-300 sm:-my-px sm:ms-5 sm:flex',
                                    isCollapsed ? 'items-center text-sm' : 'items-start',
                                ]"
                            >
                                <NavLink
                                    :href="route('dashboard')"
                                    class="text-white"
                                    :class="isCollapsed ? 'text-xs' : 'text-xl'"
                                    :active="route().current('dashboard')"
                                >
                                    <span v-if="!isCollapsed" class="text-xl">Dashboard</span>
                                </NavLink>

                                <NavLink
                                    :href="route('invoicePage')"
                                    class="text-white"
                                    :class="isCollapsed ? 'text-xs' : 'text-xl'"
                                    :active="route().current('invoicePage')"
                                >
                                    <span v-if="!isCollapsed" class="text-xl">Invoices</span>
                                </NavLink>

                                <NavLink
                                    :href="route('billPage')"
                                    class="text-white"
                                    :class="isCollapsed ? 'text-xs' : 'text-xl'"
                                    :active="route().current('billPage')"
                                >
                                    <span v-if="!isCollapsed" class="text-xl">Bills</span>
                                </NavLink>

                                <NavLink
                                    :href="route('budgetPage')"
                                    class="text-white"
                                    :class="isCollapsed ? 'text-xs' : 'text-xl'"
                                    :active="route().current('budgetPage')"
                                >
                                    <span v-if="!isCollapsed" class="text-xl">Budgets</span>
                                </NavLink>

                                <NavLink
                                    :href="route('potsPage')"
                                    class="text-white"
                                    :class="isCollapsed ? 'text-xs' : 'text-xl'"
                                    :active="route().current('potsPage')"
                                >
                                    <span v-if="!isCollapsed" class="text-xl">Pots</span>
                                </NavLink>
                            </div>
                        </div>

                        <button class="absolute right-2 top-2 text-white hover:text-gray-400 lg:block" @click="isCollapsed = !isCollapsed">
                            <svg
                                v-if="!isCollapsed"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div class="flex sm:ml-0 sm:mt-auto sm:flex-col sm:items-start sm:pb-4">
                            <div class="relative">
                                <Dropdown align="left" :width="isCollapsed ? '48' : '48'">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                            >
                                                {{ $page.props.auth.user.name }}
                                                <svg
                                                    class="-me-0.5 ms-2 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button"> Log Out </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Mobile Top Bar -->
            <div class="flex h-16 w-full items-center justify-between bg-zinc-800 px-4 text-white sm:hidden">
                <Link :href="route('dashboard')">
                    <ApplicationLogo class="h-8 w-auto text-white" />
                </Link>
                <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation Dropdown -->
            <div
                :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                class="z-20 w-full bg-white px-4 py-4 shadow sm:hidden"
            >
                <div class="space-y-2">
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')"> Dashboard </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('invoicePage')" :active="route().current('invoicePage')"> Invoices </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('billPage')" :active="route().current('billPage')"> Bills </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('budgetPage')" :active="route().current('budgetPage')"> Budgets </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('potsPage')" :active="route().current('potsPage')"> Pots </ResponsiveNavLink>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <div class="mb-2 text-base font-medium text-gray-800">{{ $page.props.auth.user.name }}</div>
                    <div class="mb-4 text-sm font-medium text-gray-500">{{ $page.props.auth.user.email }}</div>
                    <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('logout')" method="post" as="button"> Log Out </ResponsiveNavLink>
                </div>
            </div>

            <!-- Page Content -->
            <div :class="['w-full flex-1 transition-all duration-300', isCollapsed ? 'md:ml-20' : 'md:ml-80']">
                <header class="bg-white shadow" v-if="$slots.header">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>

                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
