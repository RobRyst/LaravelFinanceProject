<template>
    <body>
        <main>
            <div class="grid min-h-screen grid-cols-4">
                <nav class="col-span-1 w-64 bg-stone-900">
                    <div class="grid gap-10">
                        <h1 class="ml-14 text-left text-4xl text-white">Finance</h1>
                        <ul class="ml-14 grid gap-7 text-left text-xl text-gray-400">
                            <li>
                                <a href=""> Overview </a>
                            </li>
                            <li class="hover:bg-gray-600">
                                <Link :href="route('transaction')">
                                    <span>Transactions</span>
                                </Link>
                            </li>
                            <li class="hover:bg-gray-600">
                                <Link :href="route('budget')">
                                    <span>Budgets</span>
                                </Link>
                            </li>
                            <li class="hover:bg-gray-600">
                                <Link :href="route('pot')">
                                    <span>Pots</span>
                                </Link>
                            </li>
                            <li class="hover:bg-gray-600">
                                <Link :href="route('bill')">
                                    <span>Recurring Bills</span>
                                </Link>
                            </li>
                            <li class="hover:bg-gray-600">
                                <Link :href="route('invoice')">
                                    <span>Invoices</span>
                                </Link>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="col-span-3 grid">
                    <h1 class="text-left text-4xl">Overview</h1>
                    <div class="grid grid-cols-3">
                        <div class="flex flex-col gap-2 border-2 border-solid">
                            <span> Current Balance </span>
                            <span class="text-3xl"> 4836 </span>
                        </div>
                        <div class="flex flex-col gap-2 border-2 border-solid">
                            <span> Income </span>
                            <span class="text-3xl"> 3836 </span>
                        </div>
                        <div class="flex flex-col gap-2 border-2 border-solid">
                            <span> Expenses </span>
                            <span class="text-3xl"> 1700 </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-2 grid">
                            <div class="flex flex-col border-2 border-solid">
                                <div class="flex justify-between">
                                    <span class="text-2xl"> Pots </span>
                                    <span><a href="">See Details ></a></span>
                                </div>
                                <div class="flex gap-5">
                                    <div class="flex flex-row content-center">
                                        <span class="content-center">Icon</span>
                                        <div class="flex flex-col">
                                            <span>Total Saved</span>
                                            <span>$850</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-row gap-10">
                                        <div class="flex-row">
                                            <div class="flex flex-col">
                                                <span>Savings</span>
                                                <span>$159</span>
                                            </div>
                                            <div class="flex flex-col">
                                                <span>Concert Ticket</span>
                                                <span>$110</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <div class="flex flex-col">
                                                <span>Gift</span>
                                                <span>$40</span>
                                            </div>
                                            <div class="flex flex-col">
                                                <span>New Laptop</span>
                                                <span>$10</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col border-2 border-solid">
                                <div class="flex flex-row justify-between">
                                    <h1>Transactions</h1>
                                    <a href="">View All ></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2 flex flex-col border-2 border-solid">
                            <div class="flex flex-row justify-between">
                                <h1 class="text-2xl">Budgets</h1>
                                <a href="">See Details ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>
