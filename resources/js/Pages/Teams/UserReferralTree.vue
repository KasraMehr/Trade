<template>
    <AppLayout title="My Team">
        <div class="p-6 min-h-screen">
            <h1 class="text-3xl font-extrabold mb-8 text-center text-gray-200 tracking-tight">
                Referral Tree
            </h1>
            <div v-if="rootUser" class="flex justify-center">
                <TreeNode :node="{ user: rootUser, children: tree }"/>
            </div>
            <div v-else class="text-center text-gray-500 text-lg">
                No referral data available.
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import {defineAsyncComponent, defineProps} from 'vue';
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    rootUser: Object,
    tree: Array,
});

const TreeNode = defineAsyncComponent(() =>
    import('@/Components/TreeNode.vue')
);
</script>
