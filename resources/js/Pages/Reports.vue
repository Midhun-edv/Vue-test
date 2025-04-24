<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3'; // Import Link if you need internal links

// If you passed data from the controller/route closure
// defineProps({
//  reports: Object // Adjust the type based on the data you passed
// });
</script>

<template>
    <Head title="Reports" /> // Sets the browser tab title

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Reports Section
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        This is the reports page content.
                        </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>