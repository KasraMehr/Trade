<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { ref, onMounted } from 'vue';
import { Chart, registerables } from 'chart.js';

Chart.register(...registerables);

const performanceChart = ref(null);

onMounted(() => {
    const ctx = performanceChart.value.getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Portfolio Growth (%)',
                    data: [0, 2.5, 4.1, 5.7, 7.2, 8.5, 9.8, 11.2, 12.5, 13.9, 15.2, 16.7],
                    borderColor: '#06b6d4',
                    backgroundColor: 'rgba(6, 182, 212, 0.2)',
                    borderWidth: 3,
                    tension: 0.3,
                    fill: true,
                },
                {
                    label: 'Benchmark (%)',
                    data: [0, 1.8, 2.9, 3.7, 4.5, 5.2, 5.8, 6.3, 6.7, 7.1, 7.4, 7.8],
                    borderColor: '#9ca3af',
                    backgroundColor: 'rgba(156, 163, 175, 0.1)',
                    borderWidth: 2,
                    borderDash: [5, 5],
                    tension: 0.3,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: '#d1d5db',
                    },
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: '#1f2937',
                    titleColor: '#fff',
                    bodyColor: '#d1d5db',
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return value + '%';
                        },
                        color: '#d1d5db',
                    },
                    grid: {
                        color: '#374151',
                    },
                },
                x: {
                    ticks: {
                        color: '#d1d5db',
                    },
                    grid: {
                        color: '#374151',
                    },
                },
            },
        },
    });
});
</script>

<template>
    <MainLayout title="Invest">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-r from-indigo-900 via-blue-900 to-indigo-900 text-white py-20 overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" fill="none" viewBox="0 0 1200 1200">
                    <path d="M0 0L1200 1200M1200 0L0 1200" stroke="url(#gradient)" stroke-width="2" />
                    <defs>
                        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#4f46e5;stop-opacity:0.5" />
                            <stop offset="100%" style="stop-color:#06b6d4;stop-opacity:0.5" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="container mx-auto px-6 text-center relative z-10">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in">Smart Investment Solutions</h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-gray-200 animate-fade-in-delayed">
                    Let our experts grow your capital with professional asset management strategies
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <Link
                        :href="route('dashboard')"
                        class="bg-cyan-500 text-white hover:bg-cyan-600 px-8 py-3 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105"
                    >
                        Get Started
                    </Link>
                    <Link
                        :href="route('AboutUs')"
                        class="bg-transparent border-2 border-cyan-400 hover:bg-cyan-400 hover:bg-opacity-20 text-cyan-400 px-8 py-3 rounded-lg font-semibold text-lg transition duration-300"
                    >
                        Learn More
                    </Link>
                </div>
            </div>
        </section>

        <!-- How We Invest Section -->
        <section class="py-16 bg-gradient-to-b from-gray-900 to-blue-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 animate-fade-in">How We Invest Your Money</h2>
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto animate-fade-in-delayed">
                        Combining diversification with cutting-edge strategies for optimal returns
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div
                        class="bg-gray-900/50 backdrop-blur-sm p-8 rounded-xl border border-gray-700 group transform hover:scale-[1.02] transition duration-300"
                    >
                        <div class="w-16 h-16 bg-cyan-500 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Diversified Portfolio</h3>
                        <p class="text-gray-300">
                            Investments spread across stocks, bonds, commodities, and crypto to minimize risk.
                        </p>
                    </div>
                    <div
                        class="bg-gray-900/50 backdrop-blur-sm p-8 rounded-xl border border-gray-700 group transform hover:scale-[1.02] transition duration-300"
                    >
                        <div class="w-16 h-16 bg-cyan-500 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Algorithmic Trading</h3>
                        <p class="text-gray-300">24/7 market analysis with algorithms for optimal trade execution.</p>
                    </div>
                    <div
                        class="bg-gray-900/50 backdrop-blur-sm p-8 rounded-xl border border-gray-700 group transform hover:scale-[1.02] transition duration-300"
                    >
                        <div class="w-16 h-16 bg-cyan-500 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Risk Management</h3>
                        <p class="text-gray-300">Stop-loss orders and position sizing to protect your capital.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Risk Disclosure Section -->
        <section class="py-16 bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 animate-fade-in">Understanding Investment Risks</h2>
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto animate-fade-in-delayed">
                        Transparency about risks is key to informed investing
                    </p>
                </div>
                <div class="max-w-4xl mx-auto bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-700 p-8">
                    <h3 class="text-2xl font-semibold text-white mb-4">Risk Disclosure Statement</h3>
                    <p class="text-gray-300 mb-6">
                        Investing involves risks, including potential loss of principal. Past performance does not guarantee future
                        results. Investment values may fluctuate, and you may not recover the full amount invested.
                    </p>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                                    />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-lg font-medium text-white">Market Risk</h4>
                                <p class="mt-1 text-gray-300">Potential losses due to market price movements.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                                    />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-lg font-medium text-white">Liquidity Risk</h4>
                                <p class="mt-1 text-gray-300">Difficulty selling investments quickly without price impact.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="h-6 w-6 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-lg font-medium text-white">Volatility</h4>
                                <p class="mt-1 text-gray-300">Rapid price fluctuations increase both risk and potential returns.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 bg-blue-900/50 border-l-4 border-cyan-500 p-4 rounded-r-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-gray-200">
                                    Consider your experience, objectives, and financial situation before investing.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Investment Process Section -->
        <section class="py-16 bg-gradient-to-b from-blue-900 to-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 animate-fade-in">Our Investment Process</h2>
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto animate-fade-in-delayed">
                        A transparent approach to growing your wealth
                    </p>
                </div>
                <div class="max-w-4xl mx-auto relative">
                    <div class="absolute h-full w-0.5 bg-gray-700 left-4 sm:left-1/2 sm:transform sm:-translate-x-1/2"></div>
                    <div class="space-y-12">
                        <div class="relative flex flex-col sm:flex-row items-start sm:items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-white font-bold mb-4 sm:mb-0 sm:mx-6 absolute left-0 sm:left-1/2 sm:transform sm:-translate-x-1/2">
                                1
                            </div>
                            <div class="flex-1 pl-12 sm:pr-12 sm:text-right sm:order-none">
                                <h3 class="text-xl font-semibold text-white">Deposit Funds</h3>
                                <p class="text-gray-300">Securely transfer funds via bank or cryptocurrency.</p>
                            </div>
                            <div class="flex-1 sm:pl-12 sm:text-left sm:order-none mt-4 sm:mt-0">
                                <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg p-4 text-gray-300 text-sm">Visual: Secure deposit interface</div>
                            </div>
                        </div>
                        <div class="relative flex flex-col sm:flex-row items-start sm:items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-white font-bold mb-4 sm:mb-0 sm:mx-6 absolute left-0 sm:left-1/2 sm:transform sm:-translate-x-1/2">
                                2
                            </div>
                            <div class="flex-1 pl-12 sm:pr-12 sm:text-right sm:order-none">
                                <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg p-4 text-gray-300 text-sm">Visual: Strategy dashboard</div>
                            </div>
                            <div class="flex-1 sm:pl-12 sm:text-left sm:order-none mt-4 sm:mt-0">
                                <h3 class="text-xl font-semibold text-white">Strategy Allocation</h3>
                                <p class="text-gray-300">Funds allocated based on your risk profile.</p>
                            </div>
                        </div>
                        <div class="relative flex flex-col sm:flex-row items-start sm:items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-white font-bold mb-4 sm:mb-0 sm:mx-6 absolute left-0 sm:left-1/2 sm:transform sm:-translate-x-1/2">
                                3
                            </div>
                            <div class="flex-1 pl-12 sm:pr-12 sm:text-right sm:order-none">
                                <h3 class="text-xl font-semibold text-white">Active Management</h3>
                                <p class="text-gray-300">Expert traders and algorithms optimize returns.</p>
                            </div>
                            <div class="flex-1 sm:pl-12 sm:text-left sm:order-none mt-4 sm:mt-0">
                                <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg p-4 text-gray-300 text-sm">Visual: Trading interface</div>
                            </div>
                        </div>
                        <div class="relative flex flex-col sm:flex-row items-start sm:items-center">
                            <div class="flex-shrink-0 w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-white font-bold mb-4 sm:mb-0 sm:mx-6 absolute left-0 sm:left-1/2 sm:transform sm:-translate-x-1/2">
                                4
                            </div>
                            <div class="flex-1 pl-12 sm:pr-12 sm:text-right sm:order-none">
                                <div class="bg-gray-800/50 backdrop-blur-sm rounded-lg p-4 text-gray-300 text-sm">Visual: Withdrawal process</div>
                            </div>
                            <div class="flex-1 sm:pl-12 sm:text-left sm:order-none mt-4 sm:mt-0">
                                <h3 class="text-xl font-semibold text-white">Withdraw Profits</h3>
                                <p class="text-gray-300">Withdraw anytime or reinvest for growth.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Performance Section -->
        <section class="py-16 bg-gradient-to-b from-gray-900 to-blue-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 animate-fade-in">Historical Performance</h2>
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto animate-fade-in-delayed">
                        Our track record demonstrates our strategic approach
                    </p>
                </div>
                <div class="bg-gray-900/50 backdrop-blur-sm rounded-xl border border-gray-700 p-8 max-w-6xl mx-auto">
                    <div class="h-96">
                        <canvas ref="performanceChart"></canvas>
                    </div>
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="text-center group transform hover:scale-[1.02] transition duration-300">
                            <p class="text-4xl font-bold text-cyan-400">+12.7%</p>
                            <p class="text-gray-300 mt-2">Average annual return (5 years)</p>
                        </div>
                        <div class="text-center group transform hover:scale-[1.02] transition duration-300">
                            <p class="text-4xl font-bold text-cyan-400">92%</p>
                            <p class="text-gray-300 mt-2">Positive months</p>
                        </div>
                        <div class="text-center group transform hover:scale-[1.02] transition duration-300">
                            <p class="text-4xl font-bold text-cyan-400">1:2.8</p>
                            <p class="text-gray-300 mt-2">Risk/reward ratio</p>
                        </div>
                    </div>
                    <div class="mt-8 text-center text-sm text-gray-400">
                        *Performance data is net of fees and represents a composite of all strategies. Individual results may vary.
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 bg-gradient-to-r from-indigo-900 to-blue-900 text-white">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-fade-in">Ready to Start Investing?</h2>
                <p class="text-xl mb-8 max-w-3xl mx-auto text-gray-200 animate-fade-in-delayed">
                    Join thousands of investors trusting FINVERO for capital growth
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <Link
                        :href="route('dashboard')"
                        class="bg-cyan-500 text-white hover:bg-cyan-600 px-8 py-3 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105"
                    >
                        Open Account
                    </Link>
                    <Link
                        :href="route('AboutUs')"
                        class="bg-transparent border-2 border-cyan-400 hover:bg-cyan-400 hover:bg-opacity-20 text-cyan-400 px-8 py-3 rounded-lg font-semibold text-lg transition duration-300"
                    >
                        Contact Us
                    </Link>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
/* Custom animations */
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
