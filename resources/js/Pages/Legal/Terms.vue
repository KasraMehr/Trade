<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <Head title="Terms of Service" />
    <MainLayout>
        <div>
            <div class="terms-of-service p-8 max-w-5xl mx-auto leading-relaxed text-gray-400">
                <div class="text-4xl font-bold text-gray-200 mb-6">Terms of Service</div>

                <section v-for="(section, index) in termsSections" :key="index" class="mb-6 text-gray-300">
                    <div class="text-2xl text-gray-300 font-semibold mb-2">{{ section.title }}</div>
                    <div v-for="(para, idx) in section.content" :key="idx" class="mb-3 text-gray-400">
                        <p>{{ para }}</p>
                    </div>
                </section>

                <p class="text-sm text-gray-300">Last updated: June 2025</p>
            </div>
        </div>
    </MainLayout>
</template>

<script>
export default {
    name: 'TermsOfService',
    data() {
        return {
            termsSections: [
                {
                    title: 'Introduction',
                    content: [
                        'Welcome to our trading platform. By accessing or using our services, you agree to be bound by these Terms of Service and all applicable laws and regulations. If you do not agree with any of these terms, please do not use our services.',
                        'These Terms govern your use of the platform and the relationship between you and our company.'
                    ]
                },
                {
                    title: 'Eligibility',
                    content: [
                        'You must be at least 18 years old or of legal age in your jurisdiction to use our services.',
                        'By using the platform, you represent and warrant that you meet these eligibility requirements.'
                    ]
                },
                {
                    title: 'Account Registration',
                    content: [
                        'To access certain features, you must create an account. You agree to provide accurate, current, and complete information during registration.',
                        'You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.'
                    ]
                },
                {
                    title: 'User Obligations',
                    content: [
                        'You agree to use the platform only for lawful purposes and in accordance with these Terms.',
                        'You must not engage in any conduct that could harm the platform, other users, or third parties, including but not limited to fraud, harassment, or dissemination of harmful content.',
                        'You agree not to attempt to gain unauthorized access to any part of the platform.'
                    ]
                },
                {
                    title: 'Trading Risks',
                    content: [
                        'Trading involves significant risks including the loss of your investment. Past performance is not indicative of future results.',
                        'You acknowledge that you are solely responsible for any trading decisions you make using our platform.',
                        'We do not provide investment advice or guarantees of any kind.'
                    ]
                },
                {
                    title: 'Fees and Payments',
                    content: [
                        'Our platform may charge fees for certain services. All fees are clearly disclosed prior to any transaction.',
                        'You agree to pay all applicable fees in a timely manner.',
                        'Failure to pay fees may result in suspension or termination of your account.'
                    ]
                },
                {
                    title: 'Intellectual Property',
                    content: [
                        'All content on the platform, including text, graphics, logos, and software, is the property of our company or its licensors.',
                        'You may not reproduce, distribute, or create derivative works from any content without our express written permission.'
                    ]
                },
                {
                    title: 'Privacy',
                    content: [
                        'Your use of our platform is also governed by our Privacy Policy, which explains how we collect and use your personal information.'
                    ]
                },
                {
                    title: 'Termination',
                    content: [
                        'We reserve the right to suspend or terminate your access to the platform at any time, without prior notice, for conduct that violates these Terms or for any other reason.',
                        'Upon termination, your rights to use the platform will immediately cease.'
                    ]
                },
                {
                    title: 'Disclaimers and Limitation of Liability',
                    content: [
                        'The platform is provided "as is" and "as available" without warranties of any kind.',
                        'We do not guarantee the accuracy, completeness, or reliability of any information on the platform.',
                        'To the fullest extent permitted by law, we disclaim all liability for any damages arising from your use of the platform.'
                    ]
                },
                {
                    title: 'Indemnification',
                    content: [
                        'You agree to indemnify and hold harmless our company and its affiliates, officers, and employees from any claims, damages, losses, or expenses arising out of your use of the platform or violation of these Terms.'
                    ]
                },
                {
                    title: 'Governing Law and Jurisdiction',
                    content: [
                        'These Terms shall be governed by and construed in accordance with the laws of the jurisdiction in which our company is registered.',
                        'Any disputes arising from these Terms shall be subject to the exclusive jurisdiction of the courts located in that jurisdiction.'
                    ]
                },
                {
                    title: 'Changes to Terms',
                    content: [
                        'We reserve the right to update or modify these Terms at any time. Material changes will be communicated via email or on the platform.',
                        'Your continued use of the platform after changes constitutes acceptance of the updated Terms.'
                    ]
                },
                {
                    title: 'Contact Information',
                    content: [
                        'If you have any questions about these Terms, please contact our support team at: support@yourtradingplatform.com'
                    ]
                }
            ]
        }
    }
}
</script>

<style scoped>
.terms-of-service h1,
.terms-of-service h2 {
    color: #1a202c;
}
</style>
