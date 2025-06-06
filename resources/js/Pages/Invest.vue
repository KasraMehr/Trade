<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

</script>
<template>
  <MainLayout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-20">
      <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Smart Investment Solutions</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">Let our experts grow your capital with professional asset management strategies</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <router-link to="/register" class="bg-white text-indigo-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105">
            Get Started
          </router-link>
          <router-link to="/how-it-works" class="bg-transparent border-2 border-white hover:bg-white hover:bg-opacity-10 px-8 py-3 rounded-lg font-semibold text-lg transition duration-300">
            Learn More
          </router-link>
        </div>
      </div>
    </section>

    <!-- How We Invest Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">How We Invest Your Money</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Our professional approach to asset management combines diversification with cutting-edge strategies</p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
          <div class="bg-gray-50 p-8 rounded-xl hover:shadow-lg transition duration-300">
            <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-3">Diversified Portfolio</h3>
            <p class="text-gray-600">We spread investments across multiple asset classes including stocks, bonds, commodities, and cryptocurrencies to minimize risk.</p>
          </div>

          <div class="bg-gray-50 p-8 rounded-xl hover:shadow-lg transition duration-300">
            <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-3">Algorithmic Trading</h3>
            <p class="text-gray-600">Our advanced algorithms analyze market trends 24/7 to execute trades at optimal moments for maximum returns.</p>
          </div>

          <div class="bg-gray-50 p-8 rounded-xl hover:shadow-lg transition duration-300">
            <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-3">Risk Management</h3>
            <p class="text-gray-600">Strict stop-loss orders and position sizing ensure your capital is protected during market volatility.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Risk Disclosure Section -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Understanding Investment Risks</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">All investments carry risk. It's important to understand these before committing funds.</p>
        </div>

        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8">
          <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Risk Disclosure Statement</h3>
            <p class="text-gray-600 mb-4">Investing involves risk, including the possible loss of principal. Past performance is not indicative of future results. The value of investments may fluctuate, and investors may not get back the full amount invested.</p>

            <div class="space-y-6">
              <div class="flex items-start">
                <div class="flex-shrink-0 mt-1">
                  <svg class="h-6 w-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                  </svg>
                </div>
                <div class="ml-3">
                  <h4 class="text-lg font-medium text-gray-900">Market Risk</h4>
                  <p class="mt-1 text-gray-600">The possibility of losing money due to movements in market prices. All investments are subject to market risk.</p>
                </div>
              </div>

              <div class="flex items-start">
                <div class="flex-shrink-0 mt-1">
                  <svg class="h-6 w-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                  </svg>
                </div>
                <div class="ml-3">
                  <h4 class="text-lg font-medium text-gray-900">Liquidity Risk</h4>
                  <p class="mt-1 text-gray-600">Some investments may be difficult to sell quickly without significantly lowering the price.</p>
                </div>
              </div>

              <div class="flex items-start">
                <div class="flex-shrink-0 mt-1">
                  <svg class="h-6 w-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                  </svg>
                </div>
                <div class="ml-3">
                  <h4 class="text-lg font-medium text-gray-900">Volatility</h4>
                  <p class="mt-1 text-gray-600">Prices of investments can rise and fall rapidly. Higher volatility means higher potential returns but also higher risk.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm text-blue-700">
                  We recommend that you carefully consider whether investing is appropriate for you in light of your experience, objectives, financial resources, and other relevant circumstances.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Investment Process Section -->
    <!-- <section class="py-16 bg-white">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Investment Process</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">A transparent approach to growing your wealth</p>
        </div>

        <div class="max-w-4xl mx-auto">
          <div class="relative"> -->
            <!-- Timeline line -->
            <!-- <div class="hidden sm:block absolute h-full w-0.5 bg-indigo-200 left-1/2 transform -translate-x-1/2"></div> -->

            <!-- Timeline items -->
            <!-- <div class="space-y-12">
              <div class="relative flex flex-col sm:flex-row items-center">
                <div class="flex-1 sm:pr-12 sm:text-right order-1 sm:order-none">
                  <h3 class="text-xl font-semibold text-gray-900">1. Deposit Funds</h3>
                  <p class="text-gray-600">Transfer funds to your investment account via bank transfer or cryptocurrency.</p>
                </div>
                <div class="flex-shrink-0 w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center text-white font-bold mb-4 sm:mb-0 sm:mx-6 order-none sm:order-1">1</div>
                <div class="flex-1 sm:pl-12 sm:text-left order-3 sm:order-none">
                  <img src="@/assets/images/deposit-process.png" alt="Deposit funds" class="rounded-lg shadow-md h-48 w-full object-cover">
                </div>
              </div>

              <div class="relative flex flex-col sm:flex-row items-center">
                <div class="flex-1 sm:pr-12 sm:text-right order-1 sm:order-none">
                  <img src="@/assets/images/strategy-process.png" alt="Investment strategy" class="rounded-lg shadow-md h-48 w-full object-cover">
                </div>
                <div class="flex-shrink-0 w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center text-white font-bold mb-4 sm:mb-0 sm:mx-6 order-none sm:order-1">2</div>
                <div class="flex-1 sm:pl-12 sm:text-left order-3 sm:order-none">
                  <h3 class="text-xl font-semibold text-gray-900">2. Strategy Allocation</h3>
                  <p class="text-gray-600">Our algorithms allocate your funds according to your selected risk profile.</p>
                </div>
              </div>

              <div class="relative flex flex-col sm:flex-row items-center">
                <div class="flex-1 sm:pr-12 sm:text-right order-1 sm:order-none">
                  <h3 class="text-xl font-semibold text-gray-900">3. Active Management</h3>
                  <p class="text-gray-600">Professional traders and algorithms actively manage positions to maximize returns.</p>
                </div>
                <div class="flex-shrink-0 w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center text-white font-bold mb-4 sm:mb-0 sm:mx-6 order-none sm:order-1">3</div>
                <div class="flex-1 sm:pl-12 sm:text-left order-3 sm:order-none">
                  <img src="@/assets/images/management-process.png" alt="Active management" class="rounded-lg shadow-md h-48 w-full object-cover">
                </div>
              </div>

              <div class="relative flex flex-col sm:flex-row items-center">
                <div class="flex-1 sm:pr-12 sm:text-right order-1 sm:order-none">
                  <img src="@/assets/images/withdraw-process.png" alt="Withdraw profits" class="rounded-lg shadow-md h-48 w-full object-cover">
                </div>
                <div class="flex-shrink-0 w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center text-white font-bold mb-4 sm:mb-0 sm:mx-6 order-none sm:order-1">4</div>
                <div class="flex-1 sm:pl-12 sm:text-left order-3 sm:order-none">
                  <h3 class="text-xl font-semibold text-gray-900">4. Withdraw Profits</h3>
                  <p class="text-gray-600">Withdraw your profits anytime or reinvest to compound your returns.</p>
                </div>
              </div>
            </div> -->
          <!-- </div>
        </div>
      </div>
    </section> -->

    <!-- Performance Section -->
    <section class="py-16 bg-indigo-50">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Historical Performance</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">While past performance doesn't guarantee future results, it demonstrates our approach</p>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden p-8 max-w-6xl mx-auto">
          <div class="h-96">
            <canvas ref="performanceChart"></canvas>
          </div>
          <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
              <p class="text-4xl font-bold text-indigo-600">+12.7%</p>
              <p class="text-gray-600 mt-2">Average annual return (5 years)</p>
            </div>
            <div class="text-center">
              <p class="text-4xl font-bold text-indigo-600">92%</p>
              <p class="text-gray-600 mt-2">Positive months</p>
            </div>
            <div class="text-center">
              <p class="text-4xl font-bold text-indigo-600">1:2.8</p>
              <p class="text-gray-600 mt-2">Risk/reward ratio</p>
            </div>
          </div>
          <div class="mt-8 text-center text-sm text-gray-500">
            *Performance data is net of fees and represents a composite of all strategies. Individual results may vary.
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-600 text-white">
      <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Start Investing?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">Join thousands of investors who trust us with their capital growth</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <router-link to="/register" class="bg-white text-indigo-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105">
            Open Account
          </router-link>
          <router-link to="/contact" class="bg-transparent border-2 border-white hover:bg-white hover:bg-opacity-10 px-8 py-3 rounded-lg font-semibold text-lg transition duration-300">
            Contact Us
          </router-link>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<script>
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

export default {
  name: 'InvestmentPage',
  mounted() {
    this.initPerformanceChart();
  },
  methods: {
    initPerformanceChart() {
      const ctx = this.$refs.performanceChart.getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [
            {
              label: 'Portfolio Growth (%)',
              data: [0, 2.5, 4.1, 5.7, 7.2, 8.5, 9.8, 11.2, 12.5, 13.9, 15.2, 16.7],
              borderColor: '#4f46e5',
              backgroundColor: 'rgba(79, 70, 229, 0.1)',
              borderWidth: 3,
              tension: 0.3,
              fill: true
            },
            {
              label: 'Benchmark (%)',
              data: [0, 1.8, 2.9, 3.7, 4.5, 5.2, 5.8, 6.3, 6.7, 7.1, 7.4, 7.8],
              borderColor: '#9ca3af',
              backgroundColor: 'rgba(156, 163, 175, 0.1)',
              borderWidth: 2,
              borderDash: [5, 5],
              tension: 0.3
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'top',
            },
            tooltip: {
              mode: 'index',
              intersect: false,
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                callback: function(value) {
                  return value + '%';
                }
              }
            }
          }
        }
      });
    }
  }
}
</script>

<style scoped>
/* Custom styles can be added here if needed */
</style>
