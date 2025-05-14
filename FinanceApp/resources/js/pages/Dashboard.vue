<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DonutChart from '@/Pages/Budget/components/DonutChart.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

// eslint-disable-next-line @typescript-eslint/no-unused-vars
const props = defineProps({
    latestInvoices: Array,
});
</script>

<template>
    <Head title="Homepage" />

    <AuthenticatedLayout
        ><template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>

        <main>
            <div class="py-7">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-gray-100 shadow-sm sm:rounded-lg">
                        <div class="grid grid-cols-1">
                            <div class="col-span-1 grid">
                                <div class="col-span-1 grid place-items-center sm:place-items-start md:place-items-start">
                                    <h1 class="py-6 text-left text-4xl font-bold">Overview</h1>
                                </div>
                                <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                                    <div
                                        class="flex flex-col place-items-center gap-2 rounded-xl bg-gray-200 px-6 py-6 sm:place-items-start md:place-items-start"
                                    >
                                        <span>Current Balance</span>
                                        <span class="text-4xl font-bold">$ 4836</span>
                                    </div>
                                    <div
                                        class="flex flex-col place-items-center gap-2 rounded-xl bg-gray-200 px-6 py-6 sm:place-items-start md:place-items-start"
                                    >
                                        <span>Income</span>
                                        <span class="text-4xl font-extrabold">$ 3836</span>
                                    </div>
                                    <div
                                        class="flex flex-col place-items-center gap-2 rounded-xl bg-gray-200 px-6 py-6 sm:place-items-start md:place-items-start"
                                    >
                                        <span>Expenses</span>
                                        <span class="text-4xl font-extrabold">$ 1700</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                                    <div class="rounded-xl bg-white p-4">
                                        <div class="flex flex-col gap-6">
                                            <div class="flex justify-between px-5">
                                                <span class="text-2xl font-bold">Pots</span>
                                                <span><a :href="route('potsPage')">See Details ></a></span>
                                            </div>
                                            <div class="flex flex-col gap-5 pb-6 md:flex-row">
                                                <div
                                                    class="h-30 ml-5 flex w-full flex-row items-center gap-3 rounded rounded-xl bg-gray-100 px-5 py-2 md:w-60"
                                                >
                                                    <span><img src="/images/dollar.png" alt="Dollar Icon" class="h-10 w-14" /></span>
                                                    <div class="flex h-full w-full flex-col items-center justify-center">
                                                        <span class="ml-5 w-full">Total Saved</span>
                                                        <span class="ml-5 w-full text-2xl font-extrabold">$850</span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-row gap-10">
                                                    <div class="flex flex-col gap-3">
                                                        <div class="flex flex-col border-l-4 border-emerald-700 px-2">
                                                            <span>Savings</span>
                                                            <span class="text-base font-extrabold">$ 159</span>
                                                        </div>
                                                        <div class="flex flex-col border-l-4 border-gray-500 px-2">
                                                            <span>Concert Ticket</span>
                                                            <span class="text-base font-extrabold">$ 110</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col gap-3">
                                                        <div class="flex flex-col border-l-4 border-sky-500 px-2">
                                                            <span>Gift</span>
                                                            <span class="text-base font-extrabold">$ 40</span>
                                                        </div>
                                                        <div class="flex flex-col border-l-4 border-rose-400 px-2">
                                                            <span>New Laptop</span>
                                                            <span class="text-base font-extrabold">$ 10</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-span-2 flex max-h-[500px] flex-col justify-center rounded-xl bg-white">
                                        <div class="flex justify-between p-5">
                                            <span class="text-2xl font-bold">Budgets</span>
                                            <a :href="route('budgetPage')"> See Details > </a>
                                        </div>
                                        <div class="flex flex-1 items-center justify-center">
                                            <div class="flex flex-col items-center justify-between gap-10">
                                                <div class="flex items-center justify-center">
                                                    <DonutChart />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-span-2 max-h-[600px] rounded-xl bg-white">
                                        <div class="rounded-xl bg-white p-4">
                                            <div class="flex justify-between p-5">
                                                <span class="text-2xl font-bold">Invoices</span>
                                                <a :href="route('invoicePage')">View All ></a>
                                            </div>
                                            <div class="flex flex-col gap-6 px-5 pb-5">
                                                <div
                                                    v-for="invoice in latestInvoices"
                                                    :key="invoice.id"
                                                    class="flex items-center justify-between border-b py-2"
                                                >
                                                    <div>
                                                        <p class="font-semibold">{{ invoice.user.firstname }} {{ invoice.user.lastname }}</p>
                                                        <p class="text-sm text-gray-600">Due: {{ invoice.invoice_due_date }}</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <p class="font-bold">${{ invoice.total }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1 flex flex-col rounded-xl bg-white">
                                        <div class="flex justify-between px-5 py-5">
                                            <span class="text-2xl font-bold">Recurring Bills</span>
                                            <a :href="route('billPage')"> See Details > </a>
                                        </div>
                                        <div class="flex flex-col gap-5 px-5 py-5">
                                            <div
                                                class="flex flex-row items-center justify-between rounded rounded-xl border-l-4 border-emerald-500 bg-gray-200 p-4"
                                            >
                                                <span>Paid Bills</span>
                                                <span class="text-base font-extrabold">$ 200</span>
                                            </div>
                                            <div
                                                class="flex flex-row items-center justify-between rounded rounded-xl border-l-4 border-rose-500 bg-gray-200 p-4"
                                            >
                                                <span>Total Upcoming</span>
                                                <span class="text-base font-extrabold">$ 400</span>
                                            </div>
                                            <div
                                                class="flex flex-row items-center justify-between rounded rounded-xl border-l-4 border-sky-500 bg-gray-200 p-4"
                                            >
                                                <span>Due Soon</span>
                                                <span class="text-base font-extrabold">$ 50</span>
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
    </AuthenticatedLayout>
</template>
