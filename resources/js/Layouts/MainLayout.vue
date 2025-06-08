<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, onBeforeUnmount } from 'vue';

defineProps({
    title: String,
});

const londonTime = ref('');
const showMobileMenu = ref(false);

function updateLondonTime() {
    const options = {
        timeZone: 'Europe/London',
        hour12: false,
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    };
    londonTime.value = new Date().toLocaleTimeString('en-GB', options);
}

let timer;

onMounted(() => {
    updateLondonTime();
    timer = setInterval(updateLondonTime, 1000);
});

onBeforeUnmount(() => {
    clearInterval(timer);
});

function toggleMobileMenu() {
    showMobileMenu.value = !showMobileMenu.value;
}
</script>

<template>
    <Head :title="title" />
    <div class="min-h-screen bg-gradient-to-b from-gray-900 to-blue-900">
        <!-- Navigation -->
        <nav class="bg-gray-900/80 backdrop-blur-md shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center animate-fade-in">
                            <svg class="h-8 w-8 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <span class="ml-2 text-xl font-bold text-white">FINVERO</span>
                        </div>
                    </div>
                    <!-- Desktop Menu -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8 items-center">
                        <Link :href="route('home')" :class="{'border-cyan-500 text-white': route().current('home'), 'border-transparent text-gray-300 hover:border-cyan-400 hover:text-cyan-400': !route().current('home')}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-300 animate-fade-in-delayed">
                            Home
                        </Link>
                        <Link :href="route('Invest')" :class="{'border-cyan-500 text-white': route().current('Invest'), 'border-transparent text-gray-300 hover:border-cyan-400 hover:text-cyan-400': !route().current('Invest')}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-300 animate-fade-in-delayed">
                            Invest
                        </Link>
                        <Link :href="route('AboutUs')" :class="{'border-cyan-500 text-white': route().current('AboutUs'), 'border-transparent text-gray-300 hover:border-cyan-400 hover:text-cyan-400': !route().current('AboutUs')}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-300 animate-fade-in-delayed">
                            About Us
                        </Link>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                        <!-- London Live Clock -->
                        <div class="group relative">
                            <div class="flex items-center space-x-2 bg-gray-800/90 backdrop-blur-sm hover:bg-gray-700 px-3 py-1.5 rounded-lg shadow-md border border-gray-700 transition-all duration-300 animate-fade-in-delayed">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="text-sm">
                                    <span class="font-medium text-gray-300">LON</span>
                                    <span class="font-mono ml-1.5 text-white tracking-tight">{{ londonTime }}</span>
                                </div>
                            </div>
                            <div class="absolute hidden group-hover:block right-0 top-full mt-1 w-max bg-gray-800 px-3 py-2 rounded-md shadow-md border border-gray-700 text-xs text-gray-300">
                                {{ new Date().toLocaleDateString('en-GB', { timeZone: 'Europe/London' }) }} (BST)
                            </div>
                        </div>
                        <Link :href="route('login')">
                            <button class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-300">Login</button>
                        </Link>
                        <Link :href="route('register')">
                            <button class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-300">Register</button>
                        </Link>
                    </div>
                    <!-- Mobile Menu Button -->
                    <div class="flex items-center sm:hidden">
                        <button @click="toggleMobileMenu" class="inline-flex items-center justify-center p-2 rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500">
                            <span class="sr-only">Open main menu</span>
                            <svg v-if="!showMobileMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg v-else class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div v-if="showMobileMenu" class="sm:hidden bg-gray-900/95 backdrop-blur-md">
                <div class="pt-2 pb-3 space-y-1 px-2">
                    <Link :href="route('home')" @click="toggleMobileMenu" :class="{'bg-gray-800 text-white': route().current('home'), 'text-gray-300 hover:bg-gray-700 hover:text-white': !route().current('home')}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">
                        Home
                    </Link>
                    <Link :href="route('Invest')" @click="toggleMobileMenu" :class="{'bg-gray-800 text-white': route().current('Invest'), 'text-gray-300 hover:bg-gray-700 hover:text-white': !route().current('Invest')}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">
                        Invest
                    </Link>
                    <Link :href="route('AboutUs')" @click="toggleMobileMenu" :class="{'bg-gray-800 text-white': route().current('AboutUs'), 'text-gray-300 hover:bg-gray-700 hover:text-white': !route().current('AboutUs')}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">
                        About Us
                    </Link>
                    <Link :href="route('login')" @click="toggleMobileMenu" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                        Login
                    </Link>
                    <Link :href="route('register')" @click="toggleMobileMenu" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                        Register
                    </Link>
                    <!-- Mobile Clock -->
                    <div class="px-3 py-2">
                        <div class="flex items-center space-x-2 bg-gray-800/90 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-md border border-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-sm">
                                <span class="font-medium text-gray-300">LON</span>
                                <span class="font-mono ml-1.5 text-white tracking-tight">{{ londonTime }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="relative">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-b from-gray-900 to-blue-900">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="space-y-8 xl:col-span-1 animate-fade-in">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <span class="ml-2 text-xl font-bold text-white">FINVERO</span>
                        </div>
                        <p class="text-gray-300 text-base">
                            Professional cryptocurrency trading platform for investors who want to grow their capital.
                        </p>
                        <div class="flex space-x-6">
                            <a href="https://t.me/FINVERO" class="text-gray-300 hover:text-cyan-400 transform hover:scale-110 transition-all duration-300">
                                <span class="sr-only">Telegram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="mt-12 grid grid-cols-1 gap-8 xl:mt-0 xl:col-span-2">
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase animate-fade-in">Company</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <Link :href="route('AboutUs')" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">About</Link>
                                    </li>
                                    <li>
                                        <Link :href="route('login')" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Login</Link>
                                    </li>
                                    <li>
                                        <Link :href="route('register')" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Register</Link>
                                    </li>
                                    <li>
                                        <a href="https://t.me/FINVERO" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase animate-fade-in">Legal</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <Link :href="route('privacy')" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Privacy</Link>
                                    </li>
                                    <li>
                                        <Link :href="route('terms')" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Terms</Link>
                                    </li>
                                    <li>
                                        <Link :href="route('cookie')" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Cookie Policy</Link>
                                    </li>
                                    <li>
                                        <Link :href="route('GDPR')" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">GDPR</Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
<!--                        <div class="md:grid md:grid-cols-2 md:gap-8">-->
<!--                            <div>-->
<!--                                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase animate-fade-in">Resources</h3>-->
<!--                                <ul class="mt-4 space-y-4">-->
<!--                                    <li>-->
<!--                                        <a href="#" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Help Center</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Status</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">API</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Partners</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div class="mt-12 md:mt-0">-->
<!--                                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase animate-fade-in">Products</h3>-->
<!--                                <ul class="mt-4 space-y-4">-->
<!--                                    <li>-->
<!--                                        <a href="#" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Trading</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Investments</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Referral</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#" class="text-base text-gray-400 hover:text-cyan-400 transition-colors duration-300">Academy</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="mt-12 border-t border-gray-700 pt-8">
                    <p class="text-base text-gray-300 xl:text-center">
                        © 2025 FINVERO. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
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
