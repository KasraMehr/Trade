<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref, onMounted } from 'vue';

const animatedUsers = ref(0);
const animatedAssets = ref(0);
const animatedSuccessRate = ref(0);
const usersAnimating = ref(false);
const assetsAnimating = ref(false);
const successAnimating = ref(false);
const usersComplete = ref(false);
const assetsComplete = ref(false);
const successComplete = ref(false);

const targetValues = {
    users: 3000,
    assets: 2.5,
    successRate: 90
};

const animationDuration = 2500;

function easeOutBack(t) {
    const c1 = 1.70158;
    const c3 = c1 + 1;
    return 1 + c3 * Math.pow(t - 1, 3) + c1 * Math.pow(t - 1, 2);
}

function animateValue(start, end, duration, updateCallback, animatingRef, completeRef) {
    animatingRef.value = true;
    const startTime = performance.now();
    const endTime = startTime + duration;

    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easedProgress = easeOutBack(progress);
        const value = start + (end - start) * easedProgress;

        updateCallback(value);

        if (progress < 1) {
            requestAnimationFrame(update);
        } else {
            animatingRef.value = false;
            completeRef.value = true;
            setTimeout(() => completeRef.value = false, 1000);
        }
    }

    requestAnimationFrame(update);
}

onMounted(() => {
    setTimeout(() => {
        animateValue(0, targetValues.users, animationDuration,
            (val) => { animatedUsers.value = Math.floor(val); },
            usersAnimating, usersComplete);

        animateValue(0, targetValues.assets, animationDuration,
            (val) => { animatedAssets.value = parseFloat(val.toFixed(1)); },
            assetsAnimating, assetsComplete);

        animateValue(0, targetValues.successRate, animationDuration,
            (val) => { animatedSuccessRate.value = Math.floor(val); },
            successAnimating, successComplete);
    }, 500);
});

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

<style scoped>
.rotate-12 {
    transform: rotate(12deg);
}
.rotate-[20deg] {
    transform: rotate(20deg);
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fadeIn 1s ease-out;
}
.animate-fade-in-delayed {
    animation: fadeIn 1s ease-out 0.5s forwards;
    opacity: 0;
}
</style>

<template>
    <Head title="Home" />
    <MainLayout>
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-indigo-900 via-blue-900 to-indigo-900 overflow-hidden">
            <div class="absolute inset-0">
                <svg class="absolute top-0 left-0 w-full h-full opacity-10" fill="none" viewBox="0 0 1200 1200">
                    <path d="M0 0L1200 1200M1200 0L0 1200" stroke="url(#gradient)" stroke-width="2" />
                    <defs>
                        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#4f46e5;stop-opacity:0.5" />
                            <stop offset="100%" style="stop-color:#06b6d4;stop-opacity:0.5" />
                        </linearGradient>
                    </defs>
                </svg>
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1620121692029-d088224ddc74?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center opacity-20"></div>
            </div>
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl animate-fade-in">
                        <span class="block">Empower Your Wealth</span>
                        <span class="block text-cyan-400">with FINVERO Crypto Fund</span>
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-200 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl animate-fade-in-delayed">
                        Join thousands of investors growing their capital with our expert traders and cutting-edge algorithms.
                    </p>
                    <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8 space-y-3 sm:space-y-0 sm:space-x-4">
                        <div class="rounded-md shadow transform transition-transform hover:scale-105">
                            <Link :href="route('login')" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-cyan-500 hover:bg-cyan-600 md:py-4 md:text-lg md:px-10 transition-colors duration-300">
                                Start Investing Now
                            </Link>
                        </div>
                        <div class="rounded-md shadow transform transition-transform hover:scale-105">
                            <Link :href="route('AboutUs')" class="w-full flex items-center justify-center px-8 py-3 border border-cyan-400 text-base font-medium rounded-md text-cyan-400 bg-transparent hover:bg-cyan-400 hover:text-white md:py-4 md:text-lg md:px-10 transition-colors duration-300">
                                Discover How It Works
                            </Link>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center space-x-6 text-gray-300 text-sm animate-fade-in-delayed">
            <span class="flex items-center">
              <svg class="h-5 w-5 mr-1 text-cyan-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              FCA Regulated
            </span>
                        <span class="flex items-center">
              <svg class="h-5 w-5 mr-1 text-cyan-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              24/7 Support
            </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="relative bg-gradient-to-b from-indigo-800 to-blue-900">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" fill="none" viewBox="0 0 1000 1000">
                    <circle cx="500" cy="500" r="400" stroke="url(#circle-gradient)" stroke-width="2" />
                    <defs>
                        <linearGradient id="circle-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#4f46e5" />
                            <stop offset="100%" style="stop-color:#06b6d4" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8 lg:py-20 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl animate-fade-in">
                        Trusted by Investors Worldwide
                    </h2>
                    <p class="mt-3 text-xl text-gray-200 animate-fade-in-delayed">
                        Join our growing community of successful investors.
                    </p>
                </div>
                <div class="mt-10 text-center sm:max-w-4xl sm:mx-auto sm:grid sm:grid-cols-4 sm:gap-8">
                    <div class="m-4 relative overflow-hidden group">
                        <div class="relative z-10 transform transition-transform group-hover:scale-105">
                            <p class="text-5xl font-bold text-white transition-all duration-500" :class="{ 'text-cyan-300': usersAnimating }">
                                {{ animatedUsers.toLocaleString() }}<span class="text-cyan-400">+</span>
                            </p>
                            <p class="mt-2 text-base font-medium text-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 transition-transform duration-300" :class="{ 'rotate-12 scale-110': usersAnimating }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Active Users
                            </p>
                        </div>
                        <div class="absolute inset-0 bg-cyan-500/10 rounded-xl scale-95 transition-all duration-1000" :class="{ 'scale-100 opacity-0': usersComplete }"></div>
                    </div>
                    <div class="m-4 relative overflow-hidden group">
                        <div class="relative z-10 transform transition-transform group-hover:scale-105">
                            <p class="text-5xl font-bold text-white transition-all duration-500" :class="{ 'text-emerald-300': assetsAnimating }">
                                ${{ animatedAssets.toFixed(1) }}<span class="text-emerald-400">M</span>
                            </p>
                            <p class="mt-2 text-base font-medium text-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 transition-transform duration-500" :class="{ 'rotate-[20deg]': assetsAnimating }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Assets Managed
                            </p>
                        </div>
                        <div class="absolute inset-0 bg-emerald-500/10 rounded-xl scale-95 transition-all duration-1000" :class="{ 'scale-100 opacity-0': assetsComplete }"></div>
                    </div>
                    <div class="m-4 relative overflow-hidden group">
                        <div class="relative z-10 transform transition-transform group-hover:scale-105">
                            <p class="text-5xl font-bold text-white transition-all duration-500" :class="{ 'text-amber-300': successAnimating }">
                                {{ animatedSuccessRate }}<span class="text-amber-400">%</span>
                            </p>
                            <p class="mt-2 text-base font-medium text-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 transition-all duration-700" :class="{ 'scale-125 text-amber-400': successAnimating }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Success Rate
                            </p>
                        </div>
                        <div class="absolute inset-0 bg-amber-500/10 rounded-xl scale-95 transition-all duration-1000" :class="{ 'scale-100 opacity-0': successComplete }"></div>
                    </div>
                    <div class="m-4 relative group">
                        <div class="relative z-10 transform transition-transform group-hover:scale-105">
                            <p class="text-5xl font-bold text-white">24/7</p>
                            <p class="mt-2 text-base font-medium text-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Support
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wallet Address Section -->
        <div class="relative bg-gradient-to-t from-gray-900 to-gray-800 py-12 sm:py-16">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" fill="none" viewBox="0 0 1000 1000">
                    <path d="M0 500h1000M500 0v1000" stroke="url(#grid-gradient)" stroke-width="2" />
                    <defs>
                        <linearGradient id="grid-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#4f46e5" />
                            <stop offset="100%" style="stop-color:#06b6d4" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="lg:text-center">
                    <h2 class="text-base text-cyan-400 font-semibold tracking-wide uppercase animate-fade-in">Deposit Funds</h2>
                    <p class="mt-2 text-3xl font-extrabold tracking-tight text-white sm:text-4xl animate-fade-in-delayed">
                        Send Crypto to Your Trading Account
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-300 lg:mx-auto animate-fade-in-delayed">
                        Use the wallet address below to deposit funds securely.
                    </p>
                </div>
                <div class="mt-10 max-w-lg mx-auto bg-gray-900/50 backdrop-blur-sm rounded-lg shadow-lg overflow-hidden transform transition-transform hover:scale-[1.02]">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-white">TRC20 Deposit Address</h3>
                        <div class="mt-2 flex rounded-md shadow-sm">
                            <div class="relative flex items-stretch flex-grow focus-within:z-10">
                                <input type="text" readonly class="block w-full rounded-none rounded-l-md pl-3 sm:text-sm bg-gray-800 text-gray-200 border-gray-700 font-mono focus:ring-cyan-500 focus:border-cyan-500" value="3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5" id="wallet-address">
                            </div>
                            <button @click="copyWalletAddress" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-700 text-sm font-medium rounded-r-md text-gray-200 bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 transition-colors duration-300">
                                <svg class="h-5 w-5 text-cyan-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
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

        <!-- Investment Plans -->
        <div class="relative bg-gradient-to-b from-blue-900 to-indigo-900 py-12 sm:py-16">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" fill="none" viewBox="0 0 1000 1000">
                    <rect x="200" y="200" width="600" height="600" rx="100" stroke="url(#rect-gradient)" stroke-width="2" />
                    <defs>
                        <linearGradient id="rect-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#4f46e5" />
                            <stop offset="100%" style="stop-color:#06b6d4" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="lg:text-center">
                    <h2 class="text-base text-cyan-400 font-semibold tracking-wide uppercase animate-fade-in">Investment Plans</h2>
                    <p class="mt-2 text-3xl font-extrabold tracking-tight text-white sm:text-4xl animate-fade-in-delayed">
                        Choose Your Investment Strategy
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-200 lg:mx-auto animate-fade-in-delayed">
                        Select the plan that matches your goals and risk tolerance.
                    </p>
                </div>
                <div class="mt-10 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-4 lg:gap-x-8">
                    <!-- Basic Plan -->
                    <div class="relative p-8 bg-gray-900/50 backdrop-blur-sm border border-gray-700 rounded-2xl shadow-lg flex flex-col group transform transition-transform hover:scale-[1.02]">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-white">Basic</h3>
                            <p class="mt-4 flex items-baseline text-white">
                                <span class="text-5xl font-extrabold tracking-tight">$70</span>
                                <span class="ml-1 text-xl font-semibold">min</span>
                            </p>
                            <p class="mt-6 text-gray-300">Great for beginners</p>
                            <ul role="list" class="mt-6 space-y-4">
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">2.3% - 2.8% daily profit</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">25 days duration</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Capital return</span>
                                </li>
                            </ul>
                        </div>
                        <Link :href="route('dashboard')" class="bg-cyan-500 text-white hover:bg-cyan-600 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium transition-colors duration-300">Get Started</Link>
                    </div>
                    <!-- Gold Plan -->
                    <div class="relative p-8 bg-gray-900/50 backdrop-blur-sm border border-gray-700 rounded-2xl shadow-lg flex flex-col group transform transition-transform hover:scale-[1.02]">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-white">Gold</h3>
                            <p class="mt-4 flex items-baseline text-white">
                                <span class="text-5xl font-extrabold tracking-tight">$500</span>
                                <span class="ml-1 text-xl font-semibold">min</span>
                            </p>
                            <p class="mt-6 text-gray-300">For serious investors</p>
                            <ul role="list" class="mt-6 space-y-4">
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">2.8% - 3.4% daily profit</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">28 days duration</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Capital return</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Personal manager</span>
                                </li>
                            </ul>
                        </div>
                        <Link :href="route('dashboard')" class="bg-cyan-500 text-white hover:bg-cyan-600 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium transition-colors duration-300">Get Started</Link>
                    </div>
                    <!-- Platinum Plan -->
                    <div class="relative p-8 bg-gray-900/50 backdrop-blur-sm border border-gray-700 rounded-2xl shadow-lg flex flex-col group transform transition-transform hover:scale-[1.02]">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-white">Platinum</h3>
                            <p class="mt-4 flex items-baseline text-white">
                                <span class="text-5xl font-extrabold tracking-tight">$2,000</span>
                                <span class="ml-1 text-xl font-semibold">min</span>
                            </p>
                            <p class="mt-6 text-gray-300">Premium investment</p>
                            <ul role="list" class="mt-6 space-y-4">
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">3.4% - 3.9% daily profit</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">33 days duration</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Capital return</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Personal manager</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Weekly reports</span>
                                </li>
                            </ul>
                        </div>
                        <Link :href="route('dashboard')" class="bg-cyan-500 text-white hover:bg-cyan-600 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium transition-colors duration-300">Get Started</Link>
                    </div>
                    <!-- Professional Plan -->
                    <div class="relative p-8 bg-gray-900/50 backdrop-blur-sm border border-gray-700 rounded-2xl shadow-lg flex flex-col group transform transition-transform hover:scale-[1.02]">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-white">Professional</h3>
                            <p class="mt-4 flex items-baseline text-white">
                                <span class="text-5xl font-extrabold tracking-tight">$10,000</span>
                                <span class="ml-1 text-xl font-semibold">min</span>
                            </p>
                            <p class="mt-6 text-gray-300">VIP experience</p>
                            <ul role="list" class="mt-6 space-y-4">
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">3.9% - 4.5% daily profit</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">39 days duration</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Capital return</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Dedicated team</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Daily reports</span>
                                </li>
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-gray-300">Priority support</span>
                                </li>
                            </ul>
                        </div>
                        <Link :href="route('dashboard')" class="bg-cyan-500 text-white hover:bg-cyan-600 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium transition-colors duration-300">Get Started</Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offices Section -->
        <div class="relative bg-gradient-to-t from-indigo-900 to-blue-900 py-12 sm:py-16">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" fill="none" viewBox="0 0 1000 1000">
                    <path d="M100 100h800M100 900h800M100 100v800M900 100v800" stroke="url(#frame-gradient)" stroke-width="2" />
                    <defs>
                        <linearGradient id="frame-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#4f46e5" />
                            <stop offset="100%" style="stop-color:#06b6d4" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="lg:text-center">
                    <h2 class="text-base text-cyan-400 font-semibold tracking-wide uppercase animate-fade-in">Our Offices</h2>
                    <p class="mt-2 text-3xl font-extrabold tracking-tight text-white sm:text-4xl animate-fade-in-delayed">
                        Global Presence
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-200 lg:mx-auto animate-fade-in-delayed">
                        Serving clients worldwide from our strategic locations.
                    </p>
                </div>
                <div class="mt-10 grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-gray-900/50 backdrop-blur-sm overflow-hidden rounded-lg shadow-lg group transform transition-transform hover:scale-[1.02]">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-cyan-500 rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <h3 class="text-lg font-medium text-white">London, UK</h3>
                                    <p class="mt-1 text-sm text-gray-300">25 Canada Square, Canary Wharf</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900/50 backdrop-blur-sm overflow-hidden rounded-lg shadow-lg group transform transition-transform hover:scale-[1.02]">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-cyan-500 rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <h3 class="text-lg font-medium text-white">Singapore</h3>
                                    <p class="mt-1 text-sm text-gray-300">8 Marina View, Asia Square Tower 1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900/50 backdrop-blur-sm overflow-hidden rounded-lg shadow-lg group transform transition-transform hover:scale-[1.02]">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-cyan-500 rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <h3 class="text-lg font-medium text-white">New York, USA</h3>
                                    <p class="mt-1 text-sm text-gray-300">One World Trade Center</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Section -->
        <div class="relative bg-gradient-to-b from-indigo-900 to-blue-900 py-12 sm:py-16">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" fill="none" viewBox="0 0 1000 1000">
                    <path d="M500 100c220 0 400 180 400 400s-180 400-400 400-400-180-400-400 180-400 400-400" stroke="url(#circle2-gradient)" stroke-width="2" />
                    <defs>
                        <linearGradient id="circle2-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#4f46e5" />
                            <stop offset="100%" style="stop-color:#06b6d4" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="lg:text-center">
                    <h2 class="text-base text-cyan-400 font-semibold tracking-wide uppercase animate-fade-in">Security</h2>
                    <p class="mt-2 text-3xl font-extrabold tracking-tight text-white sm:text-4xl animate-fade-in-delayed">
                        Your Funds Are Safe With Us
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-200 lg:mx-auto animate-fade-in-delayed">
                        Industry-leading security to protect your investments.
                    </p>
                </div>
                <div class="mt-10 space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative group transform transition-transform hover:scale-[1.02]">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div class="ml-16 bg-gray-900/50 backdrop-blur-sm rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-medium text-white">Bank-Level Security</h3>
                            <p class="mt-2 text-base text-gray-300">
                                AES-256 encryption, trusted by banks and military organizations.
                            </p>
                        </div>
                    </div>
                    <div class="relative group transform transition-transform hover:scale-[1.02]">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div class="ml-16 bg-gray-900/50 backdrop-blur-sm rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-medium text-white">Two-Factor Authentication</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Optional 2FA with Google Authenticator or SMS verification.
                            </p>
                        </div>
                    </div>
                    <div class="relative group transform transition-transform hover:scale-[1.02]">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div class="ml-16 bg-gray-900/50 backdrop-blur-sm rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-medium text-white">Cold Storage</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Most assets stored offline, safe from online threats.
                            </p>
                        </div>
                    </div>
                    <div class="relative group transform transition-transform hover:scale-[1.02]">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div class="ml-16 bg-gray-900/50 backdrop-blur-sm rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-medium text-white">Regular Audits</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Independent third-party audits ensure system integrity.
                            </p>
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
