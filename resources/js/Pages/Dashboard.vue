<script setup>
import Mylayout from '@/Layouts/MyLayout.vue';
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout: Mylayout
});

const searchQuery = ref('');
const handleSearch = () => {
    // Handle the search logic here
    console.log(`Searching for: ${searchQuery.value}`);
    // You can replace the console.log with your actual search logic
    // For example, you can call an API, navigate to a new page, etc.
    // Here, we're just logging the search query to the console.
};
</script>

<template>
    <Head title="Welcome" />
    <div class="welcome min-h-screen flex items-center justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-center">
                    <input 
                        v-model="searchQuery"
                        type="text"
                        placeholder="..."
                        class="w-full sm:w-1/2 px-4 py-2 rounded-l-lg border border-purple-500 focus:outline-none"
                    />
                    <button 
                        @click="handleSearch"
                        class="px-4 py-2 bg-purple-500 text-white rounded-r-lg hover:bg-purple-700 transition-all duration-300 ease-in-out"
                    >
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.welcome {
    background: linear-gradient(to right, #f3e7e9, #e3eeff);
    font-family: 'Arial, sans-serif';
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
input {
    transition: box-shadow 0.3s;
}
input:focus {
    box-shadow: 0 0 5px rgba(128, 0, 128, 0.5);
}
button {
    transition: background-color 0.3s;
}
</style>
