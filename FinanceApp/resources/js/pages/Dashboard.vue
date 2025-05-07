<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Homepage" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>

        <body>
            <main>
                <div class="py-12">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="grid min-h-screen grid-cols-4">
                                <div class="col-span-4 grid">
                                    <h1 class="ml-6 py-6 text-left text-4xl font-bold">Overview</h1>
                                    <div class="mx-6 mb-8 grid max-h-32 grid-cols-3 gap-x-6">
                                        <div class="flex flex-col gap-2 rounded bg-gray-900 px-6 py-6">
                                            <span class="text-white"> Current Balance </span>
                                            <span class="text-4xl font-bold text-white"> $ 4836 </span>
                                        </div>
                                        <div class="flex flex-col gap-2 rounded bg-gray-200 px-6 py-6">
                                            <span> Income </span>
                                            <span class="text-4xl font-bold"> $ 3836 </span>
                                        </div>
                                        <div class="flex flex-col gap-2 rounded bg-gray-200 px-6 py-6">
                                            <span> Expenses </span>
                                            <span class="text-4xl font-bold"> $ 1700 </span>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-4">
                                        <div class="col-span-2 grid">
                                            <div class="flex flex-col border-2 border-solid">
                                                <div class="flex justify-between px-5 py-5">
                                                    <span class="text-2xl font-bold"> Pots </span>
                                                    <span><a :href="route('potsPage')">See Details ></a></span>
                                                </div>
                                                <div class="flex gap-5 pb-6">
                                                    <div class="h-30 ml-5 flex w-60 flex-row items-center gap-3 rounded bg-gray-200 px-5 py-2">
                                                        <span class="">Icon</span>
                                                        <div class="flex h-full w-full flex-col items-center justify-center">
                                                            <span class="ml-5 w-full">Total Saved</span>
                                                            <span class="ml-5 w-full text-2xl font-bold">$850</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-row gap-10">
                                                        <div class="flex flex-col gap-3">
                                                            <div class="flex flex-col border-l-4 border-emerald-700 px-2">
                                                                <span>Savings</span>
                                                                <span>$159</span>
                                                            </div>
                                                            <div class="flex flex-col border-l-4 border-gray-500 px-2">
                                                                <span>Concert Ticket</span>
                                                                <span>$110</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col gap-3">
                                                            <div class="flex flex-col border-l-4 border-sky-500 px-2">
                                                                <span>Gift</span>
                                                                <span>$40</span>
                                                            </div>
                                                            <div class="flex flex-col border-l-4 border-rose-400 px-2">
                                                                <span>New Laptop</span>
                                                                <span>$10</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-span-2flex grid flex-col border-2 border-solid">
                                                <div class="flex justify-between px-5 py-5">
                                                    <span class="text-2xl font-bold">Transactions</span>
                                                    <a :href="route('transactionPage')">View All ></a>
                                                </div>
                                                <div class="flex flex-col gap-5">
                                                    <div
                                                        class="h-15 mx-3 flex flex-row items-center justify-between rounded border-b-2 border-gray-200 px-3 pb-3"
                                                    >
                                                        <div class="flex flex-row items-center gap-4">
                                                            <span
                                                                ><img
                                                                    class="h-8 w-8 rounded-full object-scale-down"
                                                                    src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
                                                            /></span>
                                                            <span class="font-bold">Robin Rystad</span>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <span class="font-bold text-black">-$ 1790.00</span>
                                                            <span class="text-xs">05 June 2025</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="h-15 mx-3 flex flex-row items-center justify-between rounded border-b-2 border-gray-200 px-3 pb-3"
                                                    >
                                                        <div class="flex flex-row items-center gap-4">
                                                            <span
                                                                ><img
                                                                    class="h-8 w-8 rounded-full object-scale-down"
                                                                    src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
                                                            /></span>
                                                            <span class="font-bold">Robin Rystad</span>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <span class="font-bold text-green-600">+$ 200.00</span>
                                                            <span class="text-xs">31 May 2025</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="h-15 mx-3 flex flex-row items-center justify-between rounded border-b-2 border-gray-200 px-3 pb-3"
                                                    >
                                                        <div class="flex flex-row items-center gap-4">
                                                            <span
                                                                ><img
                                                                    class="h-8 w-8 rounded-full object-scale-down"
                                                                    src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
                                                            /></span>
                                                            <span class="font-bold">Robin Rystad</span>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <span class="font-bold text-green-600">+$ 50.00</span>
                                                            <span class="text-xs">31 May 2025</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="h-15 mx-3 flex flex-row items-center justify-between rounded border-b-2 border-gray-200 px-3 pb-3"
                                                    >
                                                        <div class="flex flex-row items-center gap-4">
                                                            <span
                                                                ><img
                                                                    class="h-8 w-8 rounded-full object-scale-down"
                                                                    src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
                                                            /></span>
                                                            <span class="font-bold">Robin Rystad</span>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <span class="font-bold text-black">-$ 20.50</span>
                                                            <span class="text-xs">30 May 2025</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-2 flex flex-col border-2 border-solid">
                                            <div class="flex justify-between px-5 py-5">
                                                <span class="text-2xl font-bold">Budgets</span>
                                                <a :href="route('budgetPage')"> View All > </a>
                                            </div>
                                        </div>
                                        <div class="col-span-2 col-start-3 flex flex-col border-2 border-solid pb-8">
                                            <div class="flex justify-between px-5 py-5">
                                                <span class="text-2xl font-bold">Recurring Bills</span>
                                                <a :href="route('billPage')"> View All > </a>
                                            </div>
                                            <div class="flex flex-col gap-5 px-5">
                                                <div
                                                    class="flex h-10 w-80 flex-row items-center justify-between rounded border-l-4 border-emerald-500 bg-gray-200 px-3"
                                                >
                                                    <span class="">Paid Bills</span>
                                                    <span class="">$ 200</span>
                                                </div>
                                                <div
                                                    class="flex h-10 w-80 flex-row items-center justify-between rounded border-l-4 border-rose-500 bg-gray-200 px-3"
                                                >
                                                    <span class="">Total Upcoming</span>
                                                    <span class="">$ 400</span>
                                                </div>
                                                <div
                                                    class="flex h-10 w-80 flex-row items-center justify-between rounded border-l-4 border-sky-500 bg-gray-200 px-3"
                                                >
                                                    <span class="">Due Soon</span>
                                                    <span class="">$ 50</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </body>
    </AuthenticatedLayout>
</template>
