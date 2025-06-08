<template>
    <div class="flex flex-col items-center relative">
        <!-- User Node -->
        <div
            class="p-5 rounded-xl shadow-lg mb-6 w-72 border border-gray-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 bg-gradient-to-r from-blue-50 to-indigo-50"
        >
            <div class="flex items-center space-x-3">
                <UserIcon class="w-6 h-6 text-blue-600" />
                <div class="flex-1">
                    <span class="font-semibold text-lg text-gray-800 block">{{ node.user.name }}</span>
                    <span class="text-sm text-gray-600">Balance: ${{ node.user.balance }}</span>
                    <span class="text-xs text-gray-500 block">Code: {{ node.user.referral_code }}</span>
                </div>
            </div>
        </div>

        <!-- Connector Lines -->
        <div v-if="node.children.length" class="relative flex justify-center w-full mb-4">
            <div class="absolute top-0 w-full h-4 border-t-2 border-l-2 border-r-2 border-gray-300 rounded-t-md"></div>
        </div>

        <!-- Children -->
        <div v-if="node.children.length" class="flex flex-wrap justify-center gap-8 relative">
            <div
                v-for="child in node.children"
                :key="child.user.id"
                class="relative flex-1 min-w-[200px]"
            >
                <!-- Child Connector Line -->
                <div class="absolute top-0 left-1/2 w-0.5 h-8 bg-gray-300 transform -translate-x-1/2"></div>
                <TreeNode :node="child" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { UserIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    node: {
        type: Object,
        required: true,
    },
});
</script>
