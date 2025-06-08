<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';
import { ref, watch, onMounted, computed } from 'vue';
import { Chart, registerables } from 'chart.js';
import { toast } from 'vue3-toastify'
import Swal from 'sweetalert2';

Chart.register(...registerables);

// Props ارسالی از کنترلر
const props = defineProps({
    walletBalance: String,
    totalProfit: String,
    profitPercentage: Number,
    activeInvestments: String,
    recentTickets: Number,
    unreadTickets: Number,
    activeTrades: Array,
    transactions: Array,
    flash: Object // برای پیام‌های موفقیت و خطا
});

// متغیرهای reactive
const depositModalOpen = ref(false);
const withdrawModalOpen = ref(false);
const ticketModalOpen = ref(false);
const transactionType = ref('all');
const transactionPeriod = ref('7');
const selectedDepositAmount = ref(100);
const customDepositAmount = ref('');
const selectedWithdrawAmount = ref(100);
const customWithdrawAmount = ref('');
const selectedPaymentMethod = ref('crypto');
const ticketSubject = ref('');
const ticketDepartment = ref('support');
const ticketMessage = ref('');
const depositAmounts = [50, 100, 200, 500, 1000, 5000];
const withdrawAmounts = [50, 100, 200, 500, 1000, 5000];
const paymentMethods = [
    { id: 'crypto', name: 'Digital Currency' }
];

// نمودار
let chartInstance = null;
const initChart = () => {
    const ctx = document.querySelector('canvas').getContext('2d');
    chartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Array.from({ length: 30 }, (_, i) => `${i + 1} June`),
            datasets: [{
                label: 'Daily Profit',
                data: Array.from({ length: 30 }, () => Math.floor(Math.random() * 200) + 50),
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
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: 'rgba(0, 0, 0, 0.05)' } },
                x: { grid: { display: false } }
            }
        }
    });
};

// مدیریت پیام‌های فلش
watch(() => props.flash, (flash) => {
    if (flash.success) {
        alert(flash.success);
    } else if (flash.error) {
        alert(flash.error);
    }
});

// توابع
const copyWalletAddress = () => {
    const walletAddress = document.getElementById('wallet-address');
    walletAddress.select();
    document.execCommand('copy');
    alert('Wallet address copied to clipboard: ' + walletAddress.value);
};

const openDepositModal = () => {
    depositModalOpen.value = true;
};

const closeDepositModal = () => {
    depositModalOpen.value = false;
};

const selectDepositAmount = (amount) => {
    selectedDepositAmount.value = amount;
};

const processDeposit = async () => {
    const amount = customDepositAmount.value || selectedDepositAmount.value;

    try {
        const response = await axios.post(route('deposits.store'), {
            amount,
            payment_method: selectedPaymentMethod.value
        });

        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: response.data.message || 'Deposit request submitted successfully'
        });

        closeDepositModal();
    } catch (error) {
        const message =
            error.response?.data?.message ||
            'There was a problem processing the deposit. Please try again.';

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: message
        });
    }
};

const openWithdrawModal = () => {
    withdrawModalOpen.value = true;
};

const closeWithdrawModal = () => {
    withdrawModalOpen.value = false;
};

const selectWithdrawAmount = (amount) => {
    selectedWithdrawAmount.value = amount;
};

const processWithdraw = async () => {
    const amount = customWithdrawAmount.value || selectedWithdrawAmount.value;

    try {
        const response = await axios.post(route('withdrawals.store'), {
            amount,
            payment_method: selectedPaymentMethod.value
        });

        await Swal.fire({
            icon: 'success',
            title: 'Success',
            text: response.data.message || 'Withdrawal request submitted successfully'
        });

        closeWithdrawModal();
    } catch (error) {
        const message =
            error.response?.data?.message ||
            'There was a problem processing the withdrawal. Please try again.';

        await Swal.fire({
            icon: 'error',
            title: 'Error',
            text: message
        });
    }
};

const openTicketModal = () => {
    ticketModalOpen.value = true;
};

const closeTicketModal = () => {
    ticketModalOpen.value = false;
    ticketSubject.value = '';
    ticketDepartment.value = 'support';
    ticketMessage.value = '';
};

const submitTicket = async () => {
    if (!ticketSubject.value || !ticketMessage.value) {
        Swal.fire({
            icon: 'warning',
            title: 'Missing fields',
            text: 'Please enter the subject and text of the ticket.'
        });
        return;
    }

    try {
        const response = await axios.post(route('tickets.store'), {
            subject: ticketSubject.value,
            department: ticketDepartment.value,
            message: ticketMessage.value
        });

        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: response.data.message || 'Ticket submitted successfully!'
        });

        closeTicketModal();
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.response?.data?.message || 'There was a problem submitting the ticket. Please try again.'
        });
    }
};


const formatNumber = (num) => {
    return parseFloat(num).toLocaleString('en-US', { minimumFractionDigits: 2 });
};

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US');
};

const getTransactionTypeClass = (type) => {
    return {
        'deposit': 'bg-green-100 text-green-800',
        'withdrawal': 'bg-red-100 text-red-800',
        'investment': 'bg-blue-100 text-blue-800',
        'profit': 'bg-purple-100 text-purple-800'
    }[type] || 'bg-gray-100 text-gray-800';
};

const getTransactionTypeText = (type) => {
    return {
        'deposit': 'Deposit',
        'withdrawal': 'Withdrawal',
        'investment': 'Investment',
        'profit': 'Profit'
    }[type] || type;
};

const getStatusClass = (status) => {
    return {
        'completed': 'text-green-600',
        'pending': 'text-yellow-600',
        'failed': 'text-red-600'
    }[status] || 'text-gray-600';
};

const getStatusText = (status) => {
    return {
        'completed': 'Completed',
        'pending': 'In Review',
        'failed': 'Failed'
    }[status] || status;
};

// فیلتر تراکنش‌ها
const filteredTransactions = computed(() => {
    let filtered = [...props.transactions];
    if (transactionType.value !== 'all') {
        filtered = filtered.filter(t => t.type === transactionType.value);
    }
    const days = parseInt(transactionPeriod.value);
    const cutoffDate = new Date();
    cutoffDate.setDate(cutoffDate.getDate() - days);
    return filtered.filter(t => new Date(t.date) >= cutoffDate);
});

onMounted(() => {
    initChart();
});
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
            <!-- محتوای داشبورد -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- خلاصه وضعیت -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 mb-8">
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
<!--                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">-->
<!--                        <div class="px-4 py-5 sm:p-6">-->
<!--                            <div class="flex items-center">-->
<!--                                <div class="flex-shrink-0 bg-green-500 rounded-md p-3">-->
<!--                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
<!--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />-->
<!--                                    </svg>-->
<!--                                </div>-->
<!--                                <div class="ml-5 w-0 flex-1">-->
<!--                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total profit</dt>-->
<!--                                    <dd class="flex items-baseline">-->
<!--                                        <div class="text-2xl font-semibold text-gray-900 dark:text-white">${{ formatNumber(totalProfit) }}</div>-->
<!--                                        <div class="ml-2 flex items-baseline text-sm font-medium text-green-600">-->
<!--                                            <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">-->
<!--                                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />-->
<!--                                            </svg>-->
<!--                                            <span class="sr-only">Increased by</span>-->
<!--                                            {{ profitPercentage }}%-->
<!--                                        </div>-->
<!--                                    </dd>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- برداشت -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2m0-2V7" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Withdraw funds</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900 dark:text-white">${{ formatNumber(walletBalance) }}</div>
                                    </dd>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button @click="openWithdrawModal" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Withdraw now
                                </button>
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
                                        <div class="ml-2 flex items-baseline text-sm font-medium text-red-600" v-if="unreadTickets > 0">
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
                        </div>
                        <div class="h-64">
                            <canvas class="w-full h-full"></canvas>
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
                        </div>
                    </div>
                </div>

                <!-- تاریخچه تراکنش‌ها -->
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-sm">
                    <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Transaction History</h3>
                        <div class="flex space-x-3">
                            <select v-model="transactionType" class="mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="all">All transactions</option>
                                <option value="deposit">Deposit</option>
                                <option value="withdrawal">Withdraw</option>
                            </select>
                            <select v-model="transactionPeriod" class="mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="7">7 days ago</option>
                                <option value="30">30 days ago</option>
                                <option value="90">3 months ago</option>
                            </select>
                        </div>
                    </div>

                    <!-- Desktop Table -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full divide-y divide-gray-100 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-5 py-3 text-right text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-5 py-3 text-right text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            <tr v-for="transaction in filteredTransactions" :key="transaction.id" class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-5 py-4 whitespace-nowrap text-sm font-medium text-gray-700 dark:text-gray-200">{{ transaction.id }}</td>
                                <td class="px-5 py-4 whitespace-nowrap text-sm">
                                    <span :class="transaction.type === 'deposit' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200'"
                                          class="px-2.5 py-1 rounded-full text-xs font-medium">
                                        {{ getTransactionTypeText(transaction.type) }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap text-sm text-right font-medium" :class="transaction.type === 'deposit' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'">
                                    {{ transaction.type === 'deposit' ? '+' : '-' }}${{ formatNumber(transaction.amount) }}
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap text-sm">
                                    <span :class="{
                                        'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': transaction.status === 'accepted',
                                        'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': transaction.status === 'rejected',
                                        'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': transaction.status === 'pending'
                                    }" class="px-2.5 py-1 rounded-full text-xs font-medium">
                                        {{ getStatusText(transaction.status) }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 whitespace-nowrap text-sm text-right text-gray-500 dark:text-gray-400">{{ formatDate(transaction.date) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Cards -->
                    <div class="md:hidden space-y-3 p-4">
                        <div v-for="transaction in filteredTransactions" :key="transaction.id" class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-xs">
                            <div class="flex justify-between items-start">
                                <div>
                                    <span :class="transaction.type === 'deposit' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200'"
                                          class="px-2.5 py-1 rounded-full text-xs font-medium mb-2 inline-block">
                                        {{ getTransactionTypeText(transaction.type) }}
                                    </span>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-200">ID: {{ transaction.id }}</p>
                                </div>
                                <span :class="{
                                    'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': transaction.status === 'accepted',
                                    'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': transaction.status === 'rejected',
                                    'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': transaction.status === 'pending'
                                }" class="px-2.5 py-1 rounded-full text-xs font-medium">
                                    {{ getStatusText(transaction.status) }}
                                </span>
                            </div>

                            <div class="mt-3 flex justify-between items-center">
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ formatDate(transaction.date) }}</p>
                                <p class="text-sm font-medium" :class="transaction.type === 'deposit' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'">
                                    {{ transaction.type === 'deposit' ? '+' : '-' }}${{ formatNumber(transaction.amount) }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Empty State -->
                    <div v-if="filteredTransactions.length === 0" class="p-8 text-center">
                        <div class="mx-auto w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">No transactions found</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Try adjusting your filters</p>
                    </div>
                </div>

                <!-- مودال شارژ حساب -->
                <div v-if="depositModalOpen" class="fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
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
                                                        <input type="text" readonly class="focus:ring-indigo-500 focus:border-indigo-500 bg-gray-700 text-gray-100 block w-full rounded-none rounded-l-md pl-3 sm:text-sm border-gray-700 font-mono" value="TAoWgVwzCSodAWdC33qFu9mRQVCNEhqCE4" id="wallet-address">
                                                    </div>
                                                    <button @click="copyWalletAddress" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-700 text-sm font-medium rounded-r-md text-gray-200 bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                                                            <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                                                        </svg>
                                                        <span>Copy</span>
                                                    </button>
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
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- مودال برداشت -->
                <div v-if="withdrawModalOpen" class="fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
                        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                            <div>
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2m0-2V7" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Withdraw Funds</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Select the desired withdrawal amount</p>
                                        <div class="mt-4 grid grid-cols-3 gap-3">
                                            <button v-for="amount in withdrawAmounts" :key="amount" @click="selectWithdrawAmount(amount)" :class="{'bg-red-600 text-white': selectedWithdrawAmount === amount, 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white': selectedWithdrawAmount !== amount}" class="py-2 px-4 rounded-md text-sm font-medium">
                                                ${{ amount }}
                                            </button>
                                        </div>
                                        <div class="mt-4">
                                            <label for="customWithdrawAmount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Or enter a custom amount</label>
                                            <input v-model="customWithdrawAmount" type="number" id="customWithdrawAmount" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                        </div>
                                        <div class="mt-4">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Payment method</label>
                                            <div class="mt-2 space-y-2">
                                                <div v-for="method in paymentMethods" :key="method.id" class="flex items-center">
                                                    <input :id="'withdraw-' + method.id" v-model="selectedPaymentMethod" :value="method.id" type="radio" class="focus:ring-red-500 h-4 w-4 text-red-600 border-gray-300">
                                                    <label :for="'withdraw-' + method.id" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">{{ method.name }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                    <button @click="processWithdraw" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:col-start-2 sm:text-sm">
                                        Withdraw
                                    </button>
                                    <button @click="closeWithdrawModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-base font-medium text-gray-700 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                        Cancel
                                    </button>
                                </div>
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
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
                        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                            <div>
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                                    <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                </div>
                                <div class="mt-4">
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
        </div>
    </AppLayout>
</template>
