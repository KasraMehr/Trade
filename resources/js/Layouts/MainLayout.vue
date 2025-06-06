<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home"></Head>
    <div class="min-h-screen bg-gray-50">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <svg class="h-8 w-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <span class="ml-2 text-xl font-bold text-gray-900">FINVERO</span>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <Link :href="route('home')" :class="{'border-indigo-500 text-gray-900': route().current('home'), 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700': !route().current('home')}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Home</Link>
                        <Link :href="route('Invest')" :class="{'border-indigo-500 text-gray-900': route().current('Invest'), 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700': !route().current('Invest')}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Invest</Link>
                        <!-- <Link :href="route('dashboard')" :class="{'border-indigo-500 text-gray-900': route().current('dashboard'), 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700': !route().current('dashboard')}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">My Team</Link> -->
                        <Link :href="route('AboutUs')" :class="{'border-indigo-500 text-gray-900': route().current('AboutUs'), 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700': !route().current('AboutUs')}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">About Us</Link>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                        <Link :href="route('login')">
                            <button class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-medium">Login</button>
                        </Link>
                        <Link :href="route('register')">
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">Register</button>
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <slot />
        </main>

        <footer class="bg-gray-800">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="space-y-8 xl:col-span-1">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <span class="ml-2 text-xl font-bold text-white">FINVERO</span>
                        </div>
                        <p class="text-gray-300 text-base">
                            Professional cryptocurrency trading platform for investors who want to grow their capital.
                        </p>
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-400 hover:text-gray-300">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-300">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-300">
                                <span class="sr-only">Telegram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Company</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">About</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Blog</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Careers</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Legal</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Privacy</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Terms</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Cookie Policy</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">GDPR</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Resources</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Help Center</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Status</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">API</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Partners</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Products</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Trading</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Investments</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Referral</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-400 hover:text-white">Academy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 border-t border-gray-700 pt-8">
                    <p class="text-base text-gray-400 xl:text-center">
                        &copy; 2020 FINVERO. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
  </div>
</template>
