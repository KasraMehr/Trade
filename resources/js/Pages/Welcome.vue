<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Home"></Head>
      <MainLayout>

        <!-- Hero Section -->
        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Professional Crypto</span>
                        <span class="block text-indigo-600">FINVERO Platform</span>
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Let our experts grow your capital with our advanced trading algorithms and market strategies.
                    </p>
                    <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                        <div class="rounded-md shadow">
                            <Link :href="route('login')" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                Start Investing
                            </Link>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <Link :href="route('AboutUs')" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                Learn More
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="bg-indigo-700">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8 lg:py-20">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        Trusted by investors worldwide
                    </h2>
                    <p class="mt-3 text-xl text-indigo-200">
                        Join our growing community of successful investors.
                    </p>
                </div>
                <div class="mt-10 text-center sm:max-w-3xl sm:mx-auto sm:grid sm:grid-cols-4 sm:gap-8">
                    <div class="m-4">
                        <p class="text-5xl font-extrabold text-white">3,000+</p>
                        <p class="mt-2 text-base font-medium text-indigo-200">Active Users</p>
                    </div>
                    <div class="m-4">
                        <p class="text-5xl font-extrabold text-white">$2,5M</p>
                        <p class="mt-2 text-base font-medium text-indigo-200">Assets Managed</p>
                    </div>
                    <div class="m-4">
                        <p class="text-5xl font-extrabold text-white">98%</p>
                        <p class="mt-2 text-base font-medium text-indigo-200">Success Rate</p>
                    </div>
                    <div class="m-4">
                        <p class="text-5xl font-extrabold text-white">24/7</p>
                        <p class="mt-2 text-base font-medium text-indigo-200">Support</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wallet Address Section -->
        <div class="bg-white py-12 sm:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Deposit Funds</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Send Crypto to Your Trading Account
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        Use the wallet address below to deposit funds into your account.
                    </p>
                </div>

                <div class="mt-10 max-w-lg mx-auto bg-gray-50 rounded-lg shadow overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">TRC20 Deposit Address</h3>
                        <div class="mt-2 flex rounded-md shadow-sm">
                            <div class="relative flex items-stretch flex-grow focus-within:z-10">
                                <input type="text" readonly class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md pl-3 sm:text-sm border-gray-300 font-mono" value="3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5" id="wallet-address">
                            </div>
                            <button @click="copyWalletAddress" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
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

        <!-- Investment Plans -->
        <div class="bg-gray-50 py-12 sm:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Investment Plans</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Choose Your Investment Strategy
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        Select the plan that matches your investment goals and risk tolerance.
                    </p>
                </div>

                <div class="mt-10 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-4 lg:gap-x-8">
                    <!-- Basic Plan -->
                    <div class="relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm flex flex-col">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Basic</h3>
                            <p class="mt-4 flex items-baseline text-gray-900">
                                <span class="text-5xl font-extrabold tracking-tight">$70</span>
                                <span class="ml-1 text-xl font-semibold">min</span>
                            </p>
                            <p class="mt-6 text-gray-500">Great for beginners</p>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">2.3% - 2.8% daily profit</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">25 days duration</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Capital return</span>
                                </li>
                            </ul>
                        </div>
                        <Link :href="route('dashboard')" class="bg-indigo-50 text-indigo-700 hover:bg-indigo-100 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium">Get started</Link>
                    </div>

                    <!-- Gold Plan -->
                    <div class="relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm flex flex-col">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Gold</h3>
                            <p class="mt-4 flex items-baseline text-gray-900">
                                <span class="text-5xl font-extrabold tracking-tight">$500</span>
                                <span class="ml-1 text-xl font-semibold">min</span>
                            </p>
                            <p class="mt-6 text-gray-500">For serious investors</p>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">2.8% - 3.4% daily profit</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">28 days duration</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Capital return</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Personal manager</span>
                                </li>
                            </ul>
                        </div>
                        <Link :href="route('dashboard')" class="bg-indigo-600 text-white hover:bg-indigo-700 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium">Get started</Link>
                    </div>

                    <!-- Platinum Plan -->
                    <div class="relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm flex flex-col">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Platinum</h3>
                            <p class="mt-4 flex items-baseline text-gray-900">
                                <span class="text-5xl font-extrabold tracking-tight">$2,000</span>
                                <span class="ml-1 text-xl font-semibold">min</span>
                            </p>
                            <p class="mt-6 text-gray-500">Premium investment</p>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">3.4% - 3.9% daily profit</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">33 days duration</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Capital return</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Personal manager</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Weekly reports</span>
                                </li>
                            </ul>
                        </div>
                        <Link :href="route('dashboard')" class="bg-indigo-50 text-indigo-700 hover:bg-indigo-100 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium">Get started</Link>
                    </div>

                    <!-- Professional Plan -->
                    <div class="relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm flex flex-col">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Professional</h3>
                            <p class="mt-4 flex items-baseline text-gray-900">
                                <span class="text-5xl font-extrabold tracking-tight">$10,000</span>
                                <span class="ml-1 text-xl font-semibold">min</span>
                            </p>
                            <p class="mt-6 text-gray-500">VIP experience</p>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">3.9% - 4.5% daily profit</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">39 days duration</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Capital return</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Dedicated team</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Daily reports</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-500">Priority support</span>
                                </li>
                            </ul>
                        </div>
                        <Link :href="route('dashboard')" class="bg-indigo-50 text-indigo-700 hover:bg-indigo-100 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium">Get started</Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Referral Program -->
        <div class="bg-white py-12 sm:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Referral Program</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Earn $10 for Every Friend You Refer
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        Share your referral link and earn rewards when your friends sign up and invest.
                    </p>
                </div>

                <div class="mt-10 bg-indigo-50 rounded-lg overflow-hidden shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900">Your Referral Link</h3>
                                <div class="mt-2 sm:flex sm:items-start sm:justify-between">
                                    <div class="max-w-xl text-sm text-gray-500">
                                        <p>Earn 5% of your friends' profits for life when they sign up using your link.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0 md:ml-4">
                                <div class="flex rounded-md shadow-sm">
                                    <div class="relative flex items-stretch flex-grow focus-within:z-10">
                                        <input type="text" readonly class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md pl-3 sm:text-sm border-gray-300 font-mono" value="https://tradepro.com/ref/user123" id="referral-link">
                                    </div>
                                    <button @click="copyReferralLink" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
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

                <div class="mt-10 grid gap-10 lg:grid-cols-3 lg:gap-x-8 lg:gap-y-0">
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-indigo-100 rounded-md p-3">
                                        <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">1. Share Your Link</h3>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-sm text-gray-500">
                                        Share your unique referral link with friends, family, or on social media.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-indigo-100 rounded-md p-3">
                                        <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">2. They Invest</h3>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-sm text-gray-500">
                                        Your friend signs up and makes their first investment of at least $500.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-indigo-100 rounded-md p-3">
                                        <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900">3. Earn Rewards</h3>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-sm text-gray-500">
                                        You'll receive $10 instantly plus 5% of their profits for life.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offices Section -->
        <div class="bg-gray-50 py-12 sm:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Our Offices</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Global Presence
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        We operate in multiple jurisdictions to serve our clients worldwide.
                    </p>
                </div>

                <div class="mt-10 grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <h3 class="text-lg font-medium text-gray-900">London, UK</h3>
                                    <p class="mt-1 text-sm text-gray-500">25 Canada Square, Canary Wharf</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <h3 class="text-lg font-medium text-gray-900">Singapore</h3>
                                    <p class="mt-1 text-sm text-gray-500">8 Marina View, Asia Square Tower 1</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <h3 class="text-lg font-medium text-gray-900">New York, USA</h3>
                                    <p class="mt-1 text-sm text-gray-500">One World Trade Center</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Section -->
        <div class="bg-white py-12 sm:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Security</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Your Funds Are Safe With Us
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        We implement the highest security standards to protect your investments.
                    </p>
                </div>

                <div class="mt-10">
                    <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                        <div class="relative">
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="ml-16">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Bank-Level Security</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    All data is encrypted with AES-256 encryption, the same standard used by banks and military organizations.
                                </p>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="ml-16">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Two-Factor Authentication</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Optional 2FA adds an extra layer of security to your account. We support Google Authenticator and SMS verification.
                                </p>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div class="ml-16">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Cold Storage</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    The majority of digital assets are stored offline in cold wallets, protected from online threats.
                                </p>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div class="ml-16">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Regular Audits</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Our systems and security practices are regularly audited by independent third-party firms.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </MainLayout>
</template>

<script>
export default {
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
        }
    }
}
</script>
