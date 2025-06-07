<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <Head title="GDPR Compliance" />
    <MainLayout>
        <div class="gdpr-policy p-8 max-w-5xl mx-auto leading-relaxed text-gray-400">
            <div class="text-4xl font-bold text-gray-200 mb-6">GDPR Compliance Policy</div>

            <section v-for="(section, index) in gdprSections" :key="index" class="mb-6">
                <div class="text-2xl text-gray-300 font-semibold mb-2">{{ section.title }}</div>
                <div v-for="(para, idx) in section.content" :key="idx" class="text-gray-400 mb-3">
                    <p>{{ para }}</p>
                </div>
            </section>

            <p class="text-sm text-gray-300">Effective date: June 2025</p>
        </div>
    </MainLayout>
</template>

<script>
export default {
    name: 'GdprPolicy',
    data() {
        return {
            gdprSections: [
                {
                    title: 'Introduction',
                    content: [
                        'We are committed to complying with the General Data Protection Regulation (GDPR) (EU) 2016/679. This policy outlines how we collect, use, store, and protect your personal data in compliance with the GDPR.'
                    ]
                },
                {
                    title: 'Legal Basis for Processing',
                    content: [
                        'We only process your personal data when we have a lawful basis to do so under the GDPR, such as your consent, fulfillment of a contract, legal obligations, or legitimate interest.'
                    ]
                },
                {
                    title: 'Your Rights Under GDPR',
                    content: [
                        '**Right to Access** – You can request a copy of your personal data we hold.',
                        '**Right to Rectification** – You can request corrections to inaccurate or incomplete data.',
                        '**Right to Erasure** – You can request deletion of your data (“right to be forgotten”).',
                        '**Right to Restrict Processing** – You may limit how we use your data.',
                        '**Right to Data Portability** – You may receive your data in a structured, commonly used format.',
                        '**Right to Object** – You may object to data processing based on legitimate interests or direct marketing.',
                        '**Right to Withdraw Consent** – Where processing is based on consent, you can withdraw it at any time.'
                    ]
                },
                {
                    title: 'Data Collection and Use',
                    content: [
                        'We collect personal data such as name, email, IP address, and usage data to provide and improve our services. This may include account creation, customer support, analytics, or marketing (only with consent).'
                    ]
                },
                {
                    title: 'Data Storage and Security',
                    content: [
                        'We implement strong security measures including encryption, access controls, and secure servers to protect your personal data. We also ensure that third-party processors are GDPR-compliant.'
                    ]
                },
                {
                    title: 'Data Retention',
                    content: [
                        'We retain your personal data only for as long as necessary to fulfill the purposes we collected it for, including for legal, regulatory, tax, accounting, or reporting requirements.'
                    ]
                },
                {
                    title: 'Third-Party Data Sharing',
                    content: [
                        'We may share your data with trusted partners and service providers who assist us in delivering our services. All such third parties are required to comply with GDPR obligations.'
                    ]
                },
                {
                    title: 'International Transfers',
                    content: [
                        'If your data is transferred outside the European Economic Area (EEA), we ensure adequate protection through mechanisms such as Standard Contractual Clauses (SCCs).'
                    ]
                },
                {
                    title: 'Contact and Complaints',
                    content: [
                        'If you have any questions regarding this GDPR policy or wish to exercise your rights, please contact us at: dpo@yourcompany.com.',
                        'You also have the right to lodge a complaint with a supervisory authority in your EU country.'
                    ]
                }
            ]
        };
    }
}
</script>

<style scoped>
.gdpr-policy h1,
.gdpr-policy h2 {
    color: #1a202c;
}
</style>
