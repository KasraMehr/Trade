<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <Head title="Privacy Policy" />
    <MainLayout>

      <div>
        <div class="privacy-policy p-8 max-w-5xl mx-auto leading-relaxed text-gray-400">
          <h1 class="text-4xl font-bold text-gray-200 mb-6">Privacy Policy</h1>

          <section v-for="(section, index) in policySections" :key="index" class="mb-6">
            <h2 class="text-2xl text-gray-300 font-semibold mb-2">{{ section.title }}</h2>
            <div v-for="(para, idx) in section.content" :key="idx" class="text-gray-400 mb-3">
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
  name: 'PrivacyPolicy',
  data() {
    return {
      policySections: [
        {
          title: 'Introduction',
          content: [
            'Welcome to our trading platform. This Privacy Policy outlines how we collect, use, disclose, and safeguard your information when you visit or use our services within the European Economic Area (EEA).',
            'We comply with the General Data Protection Regulation (GDPR) and other applicable data protection laws.'
          ]
        },
        {
          title: 'Information We Collect',
          content: [
            'We may collect personal data including but not limited to your name, email address, contact details, IP address, geolocation, identification documents (for KYC), and financial information.',
            'We also gather technical and behavioral information through cookies and analytics tools.'
          ]
        },
        {
          title: 'How We Use Your Data',
          content: [
            'To provide, maintain, and improve our trading services.',
            'To comply with legal obligations, including anti-money laundering (AML) and counter-terrorist financing (CTF) regulations.',
            'To communicate with you regarding your account, transactions, or promotions.',
            'For fraud prevention, risk management, and internal analysis.'
          ]
        },
        {
          title: 'Legal Basis for Processing',
          content: [
            'We process your data based on your consent, contractual necessity, legal obligation, or legitimate interest where appropriate.'
          ]
        },
        {
          title: 'Data Sharing and Disclosure',
          content: [
            'We do not sell your personal data.',
            'We may share data with trusted third-party processors for payment handling, KYC/AML verification, legal compliance, and platform analytics.',
            'Data may be shared with regulatory or governmental bodies where legally required.'
          ]
        },
        {
          title: 'International Data Transfers',
          content: [
            'Data may be transferred outside the EEA, but we ensure adequate safeguards are in place, including Standard Contractual Clauses or adequacy decisions.'
          ]
        },
        {
          title: 'Your Data Rights',
          content: [
            'You have the right to access, correct, delete, or restrict processing of your data.',
            'You may withdraw consent at any time or lodge a complaint with a supervisory authority.',
            'You also have the right to data portability and to object to processing based on legitimate interests.'
          ]
        },
        {
          title: 'Data Retention',
          content: [
            'We retain your data only for as long as necessary to fulfill the purposes outlined in this policy or as required by law.'
          ]
        },
        {
          title: 'Cookies and Tracking Technologies',
          content: [
            'We use cookies to enhance your experience, analyze traffic, and support core functionality.',
            'You can manage cookie preferences in your browser settings or through our platform’s cookie banner.'
          ]
        },
        {
          title: 'Security Measures',
          content: [
            'We employ industry-standard technical and organizational measures to protect your data, including encryption, access controls, and monitoring.',
            'However, no system is entirely secure. You use our services at your own risk.'
          ]
        },
        {
          title: 'Children’s Privacy',
          content: [
            'Our platform is not intended for individuals under the age of 18. We do not knowingly collect data from minors.'
          ]
        },
        {
          title: 'Changes to This Privacy Policy',
          content: [
            'We reserve the right to update this policy at any time. Material changes will be communicated via email or on the platform.',
            'Your continued use of the platform constitutes acceptance of the updated policy.'
          ]
        },
        {
          title: 'Contact Information',
          content: [
            'If you have any questions about this policy or your data rights, please contact our Data Protection Officer at: dpo@yourtradingplatform.com'
          ]
        }
      ]
    }
  }
}
</script>

<style scoped>
.privacy-policy h1,
.privacy-policy h2 {
  color: #1a202c;
}
</style>
