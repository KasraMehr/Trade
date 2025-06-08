<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <Head title="About Us" />
    <MainLayout>
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-indigo-900 via-blue-900 to-indigo-900 overflow-hidden">
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
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl animate-fade-in">
                        <span class="block">About FINVERO</span>
                        <span class="block text-cyan-400">Your Trusted Crypto Partner</span>
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-200 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl animate-fade-in-delayed">
                        Empowering wealth creation through innovative cryptocurrency trading and investment solutions.
                    </p>
                </div>
            </div>
        </div>

        <!-- About Us Section -->
        <div class="py-12 bg-gradient-to-b from-gray-900 to-blue-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-cyan-400 font-semibold tracking-wide uppercase animate-fade-in">About Us</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl animate-fade-in-delayed">
                        Who We Are
                    </p>
                </div>
                <div class="mt-10 space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative bg-gray-900/50 backdrop-blur-sm p-6 rounded-lg border border-gray-700 group transform transition-transform hover:scale-[1.02]">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg font-medium text-white">Our Story</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Founded in 2022, FINVERO started with a vision to simplify crypto trading. Now, we serve thousands globally with cutting-edge technology and expert strategies.
                            </p>
                        </div>
                    </div>
                    <div class="relative bg-gray-900/50 backdrop-blur-sm p-6 rounded-lg border border-gray-700 group transform transition-transform hover:scale-[1.02]">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg font-medium text-white">Our Mission</h3>
                            <p class="mt-2 text-base text-gray-300">
                                To provide secure, transparent, and accessible crypto trading tools for investors worldwide, fostering wealth creation with integrity.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Us Section -->
        <div class="py-12 bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-cyan-400 font-semibold tracking-wide uppercase animate-fade-in">Why Choose Us</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl animate-fade-in-delayed">
                        What Sets Us Apart
                    </p>
                </div>
                <div class="mt-10 space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                    <div class="relative bg-gray-900/50 backdrop-blur-sm p-6 rounded-lg border border-gray-700 group transform transition-transform hover:scale-[1.02]">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-lg font-medium text-white">Proven Performance</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Our algorithms deliver consistent returns, with a 98% success rate over three years.
                            </p>
                        </div>
                    </div>
                    <div class="relative bg-gray-900/50 backdrop-blur-sm p-6 rounded-lg border border-gray-700 group transform transition-transform hover:scale-[1.02]">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-lg font-medium text-white">Bank-Level Security</h3>
                            <p class="mt-2 text-base text-gray-300">
                                AES-256 encryption and 95% cold storage ensure your assets are safe.
                            </p>
                        </div>
                    </div>
                    <div class="relative bg-gray-900/50 backdrop-blur-sm p-6 rounded-lg border border-gray-700 group transform transition-transform hover:scale-[1.02]">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-lg font-medium text-white">24/7 Support</h3>
                            <p class="mt-2 text-base text-gray-300">
                                Our team is always available to assist you, day or night.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Achievements Section -->
        <div class="py-12 bg-gradient-to-b from-blue-900 to-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-cyan-400 font-semibold tracking-wide uppercase animate-fade-in">Achievements</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl animate-fade-in-delayed">
                        Our Milestones
                    </p>
                </div>
                <div class="mt-10 relative max-w-xl mx-auto">
                    <div class="absolute left-4 h-full w-0.5 bg-gray-700"></div>
                    <div class="space-y-8">
                        <div class="relative pl-10 group animate-fade-in-delayed">
                            <div class="absolute left-0 top-0 h-4 w-4 rounded-full bg-cyan-500 border-2 border-gray-700 group-hover:bg-cyan-400 transition-colors duration-300"></div>
                            <div class="font-medium text-cyan-400 group-hover:text-cyan-300">2022</div>
                            <div class="mt-1 text-white">
                                <p>Platform reboot with focus on scalability</p>
                                <p class="mt-2 text-gray-300">Rewrote core modules and improved latency by 50%</p>
                            </div>
                        </div>
                        <div class="relative pl-10 group animate-fade-in-delayed">
                            <div class="absolute left-0 top-0 h-4 w-4 rounded-full bg-cyan-500 border-2 border-gray-700 group-hover:bg-cyan-400 transition-colors duration-300"></div>
                            <div class="font-medium text-cyan-400 group-hover:text-cyan-300">2023</div>
                            <div class="mt-1 text-white">
                                <p>Onboarded 1,000 new users organically</p>
                                <p class="mt-2 text-gray-300">Partnered with 2 major fintech providers</p>
                            </div>
                        </div>
                        <div class="relative pl-10 group animate-fade-in-delayed">
                            <div class="absolute left-0 top-0 h-4 w-4 rounded-full bg-cyan-500 border-2 border-gray-700 group-hover:bg-cyan-400 transition-colors duration-300"></div>
                            <div class="font-medium text-cyan-400 group-hover:text-cyan-300">2024</div>
                            <div class="mt-1 text-white">
                                <p>Surpassed 3,000 active users globally</p>
                                <p class="mt-2 text-gray-300">Achieved $2.5M in managed crypto assets</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Management Team Section -->
        <div class="py-12 bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-cyan-400 font-semibold tracking-wide uppercase animate-fade-in">Our Team</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl animate-fade-in-delayed">
                        Meet Our Leadership
                    </p>
                </div>
                <div class="mt-10 space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                    <div class="relative bg-gray-900/50 backdrop-blur-sm p-6 rounded-lg border border-gray-700 text-center group transform transition-transform hover:scale-[1.02]">
                        <h3 class="mt-6 text-lg font-medium text-white">John Smith</h3>
                        <p class="mt-1 text-sm text-cyan-400">CEO & Founder</p>
                        <p class="mt-2 text-sm text-gray-300">15+ years in financial markets. Former hedge fund manager at Goldman Sachs.</p>
                    </div>
                    <div class="relative bg-gray-900/50 backdrop-blur-sm p-6 rounded-lg border border-gray-700 text-center group transform transition-transform hover:scale-[1.02]">
                        <h3 class="mt-6 text-lg font-medium text-white">Sarah Johnson</h3>
                        <p class="mt-1 text-sm text-cyan-400">CTO</p>
                        <p class="mt-2 text-sm text-gray-300">Blockchain expert. Led engineering teams at Coinbase and Binance.</p>
                    </div>
                    <div class="relative bg-gray-900/50 backdrop-blur-sm p-6 rounded-lg border border-gray-700 text-center group transform transition-transform hover:scale-[1.02]">
                        <h3 class="mt-6 text-lg font-medium text-white">Michael Chen</h3>
                        <p class="mt-1 text-sm text-cyan-400">Head of Trading</p>
                        <p class="mt-2 text-sm text-gray-300">Quantitative analyst specializing in crypto trading algorithms.</p>
                    </div>
                    <div class="relative bg-gray-900/50 backdrop-blur-sm p-6 rounded-lg border border-gray-700 text-center group transform transition-transform hover:scale-[1.02]">
                        <h3 class="mt-6 text-lg font-medium text-white">Grace Lee</h3>
                        <p class="mt-1 text-sm text-cyan-400">CFO</p>
                        <p class="mt-2 text-sm text-gray-300">Expert in financial strategy. Previously led engineering at Stripe</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Licenses Section -->
        <div class="py-12 bg-gradient-to-b from-gray-900 to-blue-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg text-center">
                    <h2 class="text-base text-cyan-400 font-semibold tracking-wide uppercase">Licenses & Certifications</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">
                        Regulatory Compliance
                    </p>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-8 md:grid-cols-3">
                    <!-- FCA Card -->
                    <div class="relative bg-gray-900/50 backdrop-blur-sm rounded-lg border border-gray-700 group transform transition-all hover:scale-[1.02] hover:border-cyan-400/30 duration-300">
                        <div class="absolute -top-3 left-4 flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white shadow-lg">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.292 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div class="p-6 pt-8">
                            <h3 class="text-lg font-medium text-white">Financial Conduct Authority</h3>
                            <p class="mt-2 text-base text-gray-300">Authorized payment institution in the UK (FRN: 123456)</p>
                        </div>
                    </div>

                    <!-- MAS Card -->
                    <div class="relative bg-gray-900/50 backdrop-blur-sm rounded-lg border border-gray-700 group transform transition-all hover:scale-[1.02] hover:border-cyan-400/30 duration-300">
                        <div class="absolute -top-3 left-4 flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white shadow-lg">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2c-1.657 0-3 .895-3 9 0 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08 .402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12 a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="p-6 pt-8">
                            <h3 class="text-lg font-medium text-white">Monetary Authority of Singapore</h3>
                            <p class="mt-2 text-base text-gray-300">Licensed under the Payment Services Act for digital payment token services</p>
                        </div>
                    </div>

                    <!-- ISO Card -->
                    <div class="relative bg-gray-900/50 backdrop-blur-sm rounded-lg border border-gray-700 group transform transition-all hover:scale-[1.02] hover:border-cyan-400/30 duration-300">
                        <div class="absolute -top-3 left-4 flex items-center justify-center h-12 w-12 rounded-md bg-cyan-500 text-white shadow-lg">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 11c0-1.104-.896-2-2-2s-1 2-1-2-2 .896-2 .2s2 2 4 4 2 2-2.896 0-4 2-2s-2 .896-2-2zm0 0c0 1.104 .896 2 2 .2s2-2 .2-2-2-2-2-4s2 .2-4-2 2-2-2 zm-2 4zm0-7a9 9 0 00-9 9 a9 9 0 009 009 a9 9 a009 009-009 a009 z"></path>
                            </svg>
                        </div>
                        <div class="p-6 pt-8">
                            <h3 class="text-lg font-medium text-white">ISO 27001 Certified</h3>
                            <p class="mt-2 text-base text-gray-300">Certified for information security management systems</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- CTA Section -->
        <div class="bg-gradient-to900-t from-indigo-800 to-blue-700">
            <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-semibold text-white sm:text-4xl">
                    <span class="block">Ready to Start Investing?</span>
                    <span class="block">Join FINVERO Today.</span>
                </h2>
                <p class="mt-4 text-lg leading-6 text-indigo-200">
                    Trusted by thousands trusted by thousands investors worldwide for secure crypto trading.</p>
                <Link :href="route('home')" class="mt-8 w-full inline-flex items-center justify-center px-6 py-3 border-b border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-900 hover:text-cyan-400 sm:w-auto transition-all duration-300">
                    Explore Investment Plans
                </Link>
            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
/* Custom animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animateFade-in {
    animation: fadeIn 1s ease-out;
}
.animateFade-in-delayed {
    animation: fadeIn 1s ease-out 0.5s forwards;
    opacity: 0;
}
</style>
