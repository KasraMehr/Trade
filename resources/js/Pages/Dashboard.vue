<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import {formatNumber} from "chart.js/helpers";
</script>

<template>
    <AppLayout title="Dashboard">
            <div class="min-h-screen bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
                <!-- محتوای داشبورد -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <!-- خلاصه وضعیت -->
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
                        <!-- موجودی کیف پول -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Wallet balance</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900 dark:text-white">${{ formatNumber(walletBalance) }}</div>
                                        </dd>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button @click="openDepositModal" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Account recharge
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- سود کلی -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total profit</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900 dark:text-white">${{ formatNumber(totalProfit) }}</div>
                                            <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                                <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="sr-only">Increased by</span>
                                                {{ profitPercentage }}%
                                            </div>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- سرمایه‌گذاری فعال -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Active investments</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900 dark:text-white">${{ formatNumber(activeInvestments) }}</div>
                                        </dd>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <router-link to="/invest" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Capital management
                                    </router-link>
                                </div>
                            </div>
                        </div>

                        <!-- تیکت‌های اخیر -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Recent tickets</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900 dark:text-white">{{ recentTickets }}</div>
                                            <div class="ml-2 flex items-baseline text-sm font-semibold text-red-600" v-if="unreadTickets > 0">
                                                <span class="sr-only">Unread tickets</span>
                                                {{ unreadTickets }} New
                                            </div>
                                        </dd>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button @click="openTicketModal" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                        Submit new ticket
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- نمودار و آمار -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                        <!-- نمودار سود -->
                        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 lg:col-span-2">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Investment performance</h3>
                                <select v-model="chartRange" class="mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="7">7 days ago</option>
                                    <option value="30">30 days ago</option>
                                    <option value="90">3 months ago</option>
                                    <option value="365">1 year ago</option>
                                </select>
                            </div>
                            <div class="h-64">
                                <canvas ref="profitChart" class="w-full h-full"></canvas>
                            </div>
                        </div>

                        <!-- تریدینگ فعال -->
                        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Active trading</h3>
                            <div class="space-y-4">
                                <div v-for="trade in activeTrades" :key="trade.id" class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                    <div class="flex justify-between">
                                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ trade.pair }}</span>
                                        <span :class="{'text-green-600': trade.type === 'buy', 'text-red-600': trade.type === 'sell'}" class="text-sm font-medium">
                                          {{ trade.type === 'buy' ? 'Buy' : 'Sell' }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between mt-1">
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Volume: {{ trade.amount }}</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Price: ${{ trade.price }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400">
                                            <span>Start: {{ formatDate(trade.openTime) }}</span>
                                            <span v-if="trade.status === 'open'">Profit: <span :class="{'text-green-600': trade.profit >= 0, 'text-red-600': trade.profit < 0}">${{ trade.profit }}</span></span>
                                            <span v-else>Closed at: {{ formatDate(trade.closeTime) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <button @click="joinTrading" class="w-full mt-4 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Participate in trading
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- تاریخچه تراکنش‌ها -->
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Transaction history</h3>
                            <div class="flex space-x-3">
                                <select v-model="transactionType" class="mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="all">All transactions</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="withdrawal">Withdraw</option>
                                    <option value="investment">Investment</option>
                                    <option value="profit">Profit</option>
                                </select>
                                <select v-model="transactionPeriod" class="mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="7">7 days ago</option>
                                    <option value="30">30 days ago</option>
                                    <option value="90">3 months ago</option>
                                </select>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Type</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr v-for="transaction in filteredTransactions" :key="transaction.id">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ transaction.id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        <span :class="getTransactionTypeClass(transaction.type)">{{ getTransactionTypeText(transaction.type) }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">${{ formatNumber(transaction.amount) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        <span :class="getStatusClass(transaction.status)">{{ getStatusText(transaction.status) }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ formatDate(transaction.date) }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 text-right">
                            <button class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 text-sm font-medium">
                                View all transactions
                            </button>
                        </div>
                    </div>

                    <!-- مودال شارژ حساب -->
                    <div v-if="depositModalOpen" class="fixed z-10 inset-0 overflow-y-auto">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                <div>
                                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-5">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Account recharge</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Select the desired deposit amount</p>
                                            <div class="mt-4 grid grid-cols-3 gap-3">
                                                <button v-for="amount in depositAmounts" :key="amount" @click="selectDepositAmount(amount)" :class="{'bg-indigo-600 text-white': selectedDepositAmount === amount, 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white': selectedDepositAmount !== amount}" class="py-2 px-4 rounded-md text-sm font-medium">
                                                    ${{ amount }}
                                                </button>
                                            </div>
                                            <div class="mt-4">
                                                <label for="customAmount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Or enter a custom amount</label>
                                                <input v-model="customDepositAmount" type="number" id="customAmount" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
                                            <div class="mt-4">
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Payment method</label>
                                                <div class="mt-2 space-y-2">
                                                    <div v-for="method in paymentMethods" :key="method.id" class="flex items-center">
                                                        <input :id="method.id" v-model="selectedPaymentMethod" :value="method.id" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                        <label :for="method.id" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">{{ method.name }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-10 max-w-lg mx-auto bg-gray-900 rounded-lg shadow overflow-hidden">
                                                <div class="px-4 py-5 sm:p-6">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-200">TRC20 Deposit Address</h3>
                                                    <div class="mt-2 flex rounded-md shadow-sm">
                                                        <div class="relative flex items-stretch flex-grow focus-within:z-10">
                                                            <input type="text" readonly class="focus:ring-indigo-500 focus:border-indigo-500 bg-gray-700 text-gray-100 block w-full rounded-none rounded-l-md pl-3 sm:text-sm border-gray-700 font-mono" value="3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5" id="wallet-address">
                                                        </div>
                                                        <button @click="copyWalletAddress" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-700 text-sm font-medium rounded-r-md text-gray-200 bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                                                                <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                                                            </svg>
                                                            <span>Copy</span>
                                                        </button>
                                                    </div>
                                                    <!-- <p class="mt-2 text-sm text-gray-500">Minimum deposit: 0.001 BTC</p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                    <button @click="processDeposit" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                                        Pay
                                    </button>
                                    <button @click="closeDepositModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-base font-medium text-gray-700 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                        cansel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- مودال ارسال تیکت -->
                    <div v-if="ticketModalOpen" class="fixed z-10 inset-0 overflow-y-auto">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                <div>
                                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                                        <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-5">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Submit New Ticket</h3>
                                        <div class="mt-2">
                                            <div class="mt-4">
                                                <label for="ticketSubject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                                                <input v-model="ticketSubject" type="text" id="ticketSubject" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
                                            <div class="mt-4">
                                                <label for="ticketDepartment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Department</label>
                                                <select v-model="ticketDepartment" id="ticketDepartment" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="support">Support</option>
                                                    <option value="technical">Technical</option>
                                                    <option value="financial">Finance</option>
                                                    <option value="investment">Investment</option>
                                                </select>
                                            </div>
                                            <div class="mt-4">
                                                <label for="ticketMessage" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                                                <textarea v-model="ticketMessage" id="ticketMessage" rows="4" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                            </div>
                                            <div class="mt-4">
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Attachment</label>
                                                <div class="mt-2 flex items-center">
                                                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100 dark:bg-gray-700">
                                                      <svg class="h-full w-full text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                      </svg>
                                                    </span>
                                                    <button type="button" class="ml-5 bg-white dark:bg-gray-700 py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Select File
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                    <button @click="submitTicket" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                                        Submit Ticket
                                    </button>
                                    <button @click="closeTicketModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-base font-medium text-gray-700 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </AppLayout>
</template>

<script>
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

export default {
  name: 'Dashboard',
  data() {
    return {
      darkMode: false,
      profileMenuOpen: false,
      depositModalOpen: false,
      ticketModalOpen: false,
      chartRange: '30',
      transactionType: 'all',
      transactionPeriod: '7',
      selectedDepositAmount: 100,
      customDepositAmount: '',
      selectedPaymentMethod: 'crypto',
      ticketSubject: '',
      ticketDepartment: 'support',
      ticketMessage: '',
      depositAmounts: [50, 100, 200, 500, 1000, 5000],
      paymentMethods: [
        { id: 'crypto', name: 'Digital Currency' },
        { id: 'bank', name: 'Bank Card' },
        { id: 'paypal', name: 'PayPal' }
      ],
      walletBalance: 12500.75,
      totalProfit: 3842.50,
      profitPercentage: 12.5,
      activeInvestments: 8500.00,
      recentTickets: 3,
      unreadTickets: 1,
      activeTrades: [
        {
          id: 1,
          pair: 'BTC/USDT',
          type: 'buy',
          amount: '0.05 BTC',
          price: '48500.50',
          openTime: '2023-05-15T10:30:00',
          status: 'open',
          profit: 1250.75
        },
        {
          id: 2,
          pair: 'ETH/USDT',
          type: 'sell',
          amount: '2.5 ETH',
          price: '3250.75',
          openTime: '2023-05-18T14:45:00',
          status: 'open',
          profit: -320.50
        },
        {
          id: 3,
          pair: 'ADA/USDT',
          type: 'buy',
          amount: '500 ADA',
          price: '1.25',
          openTime: '2023-05-20T09:15:00',
          status: 'closed',
          closeTime: '2023-05-22T16:20:00',
          profit: 125.00
        }
      ],
      transactions: [
        {
          id: 'TX1001',
          type: 'deposit',
          amount: 1000,
          status: 'completed',
          date: '2023-05-22T08:30:00'
        },
        {
          id: 'TX1002',
          type: 'investment',
          amount: 500,
          status: 'completed',
          date: '2023-05-21T14:15:00'
        },
        {
          id: 'TX1003',
          type: 'profit',
          amount: 125.75,
          status: 'completed',
          date: '2023-05-21T09:45:00'
        },
        {
          id: 'TX1004',
          type: 'withdrawal',
          amount: 200,
          status: 'pending',
          date: '2023-05-20T16:20:00'
        },
        {
          id: 'TX1005',
          type: 'profit',
          amount: 87.25,
          status: 'completed',
          date: '2023-05-19T11:10:00'
        }
      ]
    }
  },
  computed: {
    filteredTransactions() {
      let filtered = [...this.transactions];

      if (this.transactionType !== 'all') {
        filtered = filtered.filter(t => t.type === this.transactionType);
      }

      // Filter by period (simplified for demo)
      const days = parseInt(this.transactionPeriod);
      const cutoffDate = new Date();
      cutoffDate.setDate(cutoffDate.getDate() - days);

      return filtered.filter(t => new Date(t.date) >= cutoffDate);
    }
  },
  mounted() {
    this.initChart();
    this.darkMode = localStorage.getItem('darkMode') === 'true';
    this.applyDarkMode();
  },
  methods: {
    copyWalletAddress() {
        const walletAddress = document.getElementById('wallet-address');
        walletAddress.select();
        document.execCommand('copy');
        alert('Wallet address copied to clipboard: ' + walletAddress.value);
    },
    copyReferralLink() {
        const referralLink = document.getElementById('referral-link');
        referralLink.select();
        document.execCommand('copy');
        alert('Referral link copied to clipboard: ' + referralLink.value);
    },
    toggleDarkMode() {
      this.darkMode = !this.darkMode;
      localStorage.setItem('darkMode', this.darkMode);
      this.applyDarkMode();
    },
    applyDarkMode() {
      if (this.darkMode) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    },
    toggleProfileMenu() {
      this.profileMenuOpen = !this.profileMenuOpen;
    },
    logout() {
      // Logout logic here
      this.$router.push('/login');
    },
    initChart() {
      const ctx = this.$refs.profitChart.getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: Array.from({length: 30}, (_, i) => `${i+1} June`),
          datasets: [{
            label: 'Daily Profit',
            data: Array.from({length: 30}, () => Math.floor(Math.random() * 200) + 50),
            backgroundColor: 'rgba(79, 70, 229, 0.1)',
            borderColor: 'rgba(79, 70, 229, 1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              grid: {
                color: 'rgba(0, 0, 0, 0.05)'
              }
            },
            x: {
              grid: {
                display: false
              }
            }
          }
        }
      });
    },
    openDepositModal() {
      this.depositModalOpen = true;
    },
    closeDepositModal() {
      this.depositModalOpen = false;
    },
    selectDepositAmount(amount) {
      this.selectedDepositAmount = amount;
    },
    processDeposit() {
      const amount = this.customDepositAmount || this.selectedDepositAmount;
      alert(` Request for deposit amount registered $${amount}`);
      this.closeDepositModal();
    },
    openTicketModal() {
      this.ticketModalOpen = true;
    },
    closeTicketModal() {
      this.ticketModalOpen = false;
      this.ticketSubject = '';
      this.ticketDepartment = 'support';
      this.ticketMessage = '';
    },
    submitTicket() {
      if (!this.ticketSubject || !this.ticketMessage) {
        alert('Please enter the subject and text of the ticket');
        return;
      }
      alert(`Ticket registered with the subject "${this.ticketSubject}"`);
      this.closeTicketModal();
    },
    joinTrading() {
      this.$router.push('/trading');
    },
    formatNumber(num) {
      return num.toLocaleString('en-US');
    },
    formatDate(dateString) {
      const date = new Date(dateString);
      return date.toLocaleDateString('en-US');
    },
    getTransactionTypeClass(type) {
      return {
        'deposit': 'bg-green-100 text-green-800',
        'withdrawal': 'bg-red-100 text-red-800',
        'investment': 'bg-blue-100 text-blue-800',
        'profit': 'bg-purple-100 text-purple-800'
      }[type] || 'bg-gray-100 text-gray-800';
    },
    getTransactionTypeText(type) {
      return {
        'deposit': 'Deposit',
        'withdrawal': 'Withdrawal',
        'investment': 'Investment',
        'profit': 'Profit'
      }[type] || type;
    },
    getStatusClass(status) {
      return {
        'completed': 'text-green-600',
        'pending': 'text-yellow-600',
        'failed': 'text-red-600'
      }[status] || 'text-gray-600';
    },
    getStatusText(status) {
      return {
        'completed': 'Completed',
        'pending': 'In Review',
        'failed': 'Failed'
      }[status] || status;
    }
  }
}
</script>
