<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <Head title="Cookie Policy" />
    <MainLayout>
        <div class="cookie-policy p-8 max-w-5xl mx-auto leading-relaxed text-gray-400">
            <div class="text-4xl text-gray-200 font-bold mb-6">Cookie Policy</div>

            <section v-for="(section, index) in cookieSections" :key="index" class="mb-6">
                <div class="text-2xl text-gray-300 font-semibold mb-2">{{ section.title }}</div>
                <div v-for="(para, idx) in section.content" :key="idx" class="text-gray-400 mb-3">
                    <p>{{ para }}</p>
                </div>
            </section>

            <p class="text-sm text-gray-300">Last updated: June 2025</p>
        </div>
    </MainLayout>
</template>

<script>
export default {
    name: 'CookiePolicy',
    data() {
        return {
            cookieSections: [
                {
                    title: 'Introduction',
                    content: [
                        'This Cookie Policy explains how our trading platform uses cookies and similar technologies to recognize you when you visit our website. It explains what these technologies are and why we use them, as well as your rights to control our use of them.',
                        'By using our website, you consent to the use of cookies in accordance with this policy.'
                    ]
                },
                {
                    title: 'What Are Cookies?',
                    content: [
                        'Cookies are small data files that are placed on your device when you visit a website. Cookies are widely used by online service providers to facilitate and improve user experience, track behavior, and enable core site functionality.'
                    ]
                },
                {
                    title: 'Types of Cookies We Use',
                    content: [
                        '**Essential Cookies:** These cookies are strictly necessary for the website to function and cannot be switched off in our systems.',
                        '**Performance Cookies:** These cookies collect information about how visitors use a website, such as which pages are visited most often.',
                        '**Functionality Cookies:** These enable the website to provide enhanced functionality and personalization.',
                        '**Targeting/Advertising Cookies:** These cookies are used to deliver advertisements more relevant to you and your interests.'
                    ]
                },
                {
                    title: 'Why We Use Cookies',
                    content: [
                        'We use cookies to: ensure the security and functionality of the platform, remember your preferences, analyze site traffic and performance, support marketing efforts, and help us continuously improve the user experience.'
                    ]
                },
                {
                    title: 'Third-Party Cookies',
                    content: [
                        'In some cases, we use cookies provided by trusted third parties. For example, Google Analytics cookies help us understand how users interact with the site.',
                        'These cookies are governed by the privacy policies of the respective third-party services.'
                    ]
                },
                {
                    title: 'Your Choices and Cookie Control',
                    content: [
                        'You have the right to decide whether to accept or reject cookies. You can set or amend your web browser controls to accept or refuse cookies.',
                        'Please note that if you disable cookies, some features of our website may not function properly.'
                    ]
                },
                {
                    title: 'How to Manage Cookies',
                    content: [
                        'Most browsers allow you to manage cookies through their settings. You can usually find these settings in the “options” or “preferences” menu of your browser.',
                        'Additionally, you may be able to opt out of targeted advertising through third-party tools such as the Digital Advertising Alliance or the Network Advertising Initiative.'
                    ]
                },
                {
                    title: 'Retention of Cookie Data',
                    content: [
                        'Cookies may be stored on your browser for different periods depending on their purpose. Some cookies expire at the end of your session, while others may remain on your device for longer unless deleted.'
                    ]
                },
                {
                    title: 'Updates to This Policy',
                    content: [
                        'We may update this Cookie Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons.',
                        'We encourage you to periodically review this page for the latest information.'
                    ]
                },
                {
                    title: 'Contact Us',
                    content: [
                        'If you have any questions or concerns about our use of cookies or this Cookie Policy, please contact us at: privacy@yourtradingplatform.com'
                    ]
                }
            ]
        }
    }
}
</script>

<style scoped>
.cookie-policy h1,
.cookie-policy h2 {
    color: #1a202c;
}
</style>
