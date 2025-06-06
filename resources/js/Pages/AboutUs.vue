<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

</script>

<template>
    <Head title="About Us"></Head>
    <MainLayout>

        <!-- Hero Section -->
        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">About FINVERO</span>
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Your trusted partner in cryptocurrency trading and investment
                    </p>
                </div>
            </div>
        </div>

        <!-- About Us Section -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">About Us</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Who We Are
                    </p>
                </div>

                <div class="mt-10">
                    <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                        <div class="relative">
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="ml-16">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Our Story</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Founded in 2018, FINVERO began as a small team of cryptocurrency enthusiasts and financial experts. Today, we've grown into a leading platform serving thousands of investors worldwide with our innovative trading solutions.
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
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Our Mission</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    To democratize access to cryptocurrency trading by providing professional-grade tools and services to investors of all levels, while maintaining the highest standards of security and transparency.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Us Section -->
        <div class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Why Choose Us</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        What Makes Us Different
                    </p>
                </div>

                <div class="mt-10">
                    <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                        <div class="relative bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Proven Performance</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Our trading algorithms have consistently delivered above-market returns with a 98% success rate over the past 3 years.
                                </p>
                            </div>
                        </div>

                        <div class="relative bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Bank-Level Security</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    We implement military-grade encryption and store 95% of assets in cold storage to ensure maximum security.
                                </p>
                            </div>
                        </div>

                        <div class="relative bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">24/7 Support</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Our dedicated support team is available around the clock to assist you with any questions or concerns.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Achievements Section -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Achievements</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Our Milestones
                    </p>
                </div>

                <div class="mt-10">
                    <div class="relative">
                        <!-- Timeline -->
                        <div class="relative max-w-xl mx-auto">
                            <div class="space-y-8">
                                <!-- Timeline Item 1 -->
                                <div class="relative pl-8 sm:pl-32 group">
                                    <div class="font-medium text-indigo-600 sm:absolute sm:left-0 sm:top-0 group-hover:text-indigo-800">2018</div>
                                    <div class="mt-1 text-gray-700 sm:mt-0">
                                        <p>Founded with a team of 5 cryptocurrency experts</p>
                                        <p class="mt-2 text-gray-500">Launched our first trading algorithm</p>
                                    </div>
                                </div>

                                <!-- Timeline Item 2 -->
                                <div class="relative pl-8 sm:pl-32 group">
                                    <div class="font-medium text-indigo-600 sm:absolute sm:left-0 sm:top-0 group-hover:text-indigo-800">2019</div>
                                    <div class="mt-1 text-gray-700 sm:mt-0">
                                        <p>Reached $10M in assets under management</p>
                                        <p class="mt-2 text-gray-500">Won "Best New Trading Platform" at Crypto Awards</p>
                                    </div>
                                </div>

                                <!-- Timeline Item 3 -->
                                <div class="relative pl-8 sm:pl-32 group">
                                    <div class="font-medium text-indigo-600 sm:absolute sm:left-0 sm:top-0 group-hover:text-indigo-800">2020</div>
                                    <div class="mt-1 text-gray-700 sm:mt-0">
                                        <p>Expanded team to 25 professionals</p>
                                        <p class="mt-2 text-gray-500">Launched mobile apps for iOS and Android</p>
                                    </div>
                                </div>

                                <!-- Timeline Item 4 -->
                                <div class="relative pl-8 sm:pl-32 group">
                                    <div class="font-medium text-indigo-600 sm:absolute sm:left-0 sm:top-0 group-hover:text-indigo-800">2021</div>
                                    <div class="mt-1 text-gray-700 sm:mt-0">
                                        <p>Surpassed 10,000 active users</p>
                                        <p class="mt-2 text-gray-500">Achieved ISO 27001 security certification</p>
                                    </div>
                                </div>

                                <!-- Timeline Item 5 -->
                                <div class="relative pl-8 sm:pl-32 group">
                                    <div class="font-medium text-indigo-600 sm:absolute sm:left-0 sm:top-0 group-hover:text-indigo-800">2022</div>
                                    <div class="mt-1 text-gray-700 sm:mt-0">
                                        <p>Reached $250M in assets under management</p>
                                        <p class="mt-2 text-gray-500">Opened offices in London and Singapore</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Team Section -->
        <div class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Our Team</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Meet the Leadership
                    </p>
                </div>

                <div class="mt-10">
                    <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                        <!-- Team Member 1 -->
                        <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                            <img class="mx-auto h-40 w-40 rounded-full" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="John Smith">
                            <h3 class="mt-6 text-lg font-medium text-gray-900">John Smith</h3>
                            <p class="mt-1 text-sm text-indigo-600">CEO & Founder</p>
                            <p class="mt-2 text-sm text-gray-500">
                                15+ years in financial markets. Former hedge fund manager at Goldman Sachs.
                            </p>
                        </div>

                        <!-- Team Member 2 -->
                        <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                            <img class="mx-auto h-40 w-40 rounded-full" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="Sarah Johnson">
                            <h3 class="mt-6 text-lg font-medium text-gray-900">Sarah Johnson</h3>
                            <p class="mt-1 text-sm text-indigo-600">CTO</p>
                            <p class="mt-2 text-sm text-gray-500">
                                Blockchain expert. Led engineering teams at Coinbase and Binance.
                            </p>
                        </div>

                        <!-- Team Member 3 -->
                        <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                            <img class="mx-auto h-40 w-40 rounded-full" src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="Michael Chen">
                            <h3 class="mt-6 text-lg font-medium text-gray-900">Michael Chen</h3>
                            <p class="mt-1 text-sm text-indigo-600">Head of Trading</p>
                            <p class="mt-2 text-sm text-gray-500">
                                Quantitative analyst specializing in crypto trading algorithms.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Licenses Section -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Licenses & Compliance</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Regulatory Approvals
                    </p>
                </div>

                <div class="mt-10">
                    <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                        <!-- License 1 -->
                        <div class="relative bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Financial Conduct Authority</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Registered with the UK FCA as an authorized payment institution (FRN: 123456)
                                </p>
                            </div>
                        </div>

                        <!-- License 2 -->
                        <div class="relative bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Monetary Authority of Singapore</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Licensed under the Payment Services Act (PSA) for digital payment token services
                                </p>
                            </div>
                        </div>

                        <!-- License 3 -->
                        <div class="relative bg-gray-50 p-6 rounded-lg border border-gray-200">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">ISO 27001 Certified</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Certified for information security management systems
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-indigo-700">
            <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    <span class="block">Ready to start investing?</span>
                    <span class="block">Choose your plan today.</span>
                </h2>
                <p class="mt-4 text-lg leading-6 text-indigo-200">
                    Join thousands of investors who trust us with their cryptocurrency portfolios.
                </p>
                <a href="#" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
                    View Investment Plans
                </a>
            </div>
        </div>

        </MainLayout>
</template>

<script>
export default {
    name: 'AboutPage',
    components: {Head},
    data() {
        return {
            // You can add any reactive data properties here if needed
        }
    }
}
</script>

<style>
/* You can add any custom styles here if needed */
</style>
