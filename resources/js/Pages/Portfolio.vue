<script setup>
import { ref } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
// import { Inertia } from '@inertiajs/inertia';
import Mylayout from '@/Layouts/MyLayout.vue';
import EditModal from '@/Components/EditModal.vue';

defineOptions({
    layout: Mylayout,
});

const { props } = usePage();
const initialData = ref(props.aboutMeContent || 'Add your bio here!');

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const updateData = (data) => {
    initialData.value = data;
    // Update the backend to persist changes
    Inertia.put(route('about-me.update'), { content: data }, {
        onSuccess: () => {
            console.log('Data updated successfully');
        },
        onError: (errors) => {
            console.error('Error updating data:', errors);
        }
    });
};
</script>

<template>
    <Head title="About Me" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-4xl h1">About Me</h1>
                <hr />
                <p class="mt-[5%] text-center">{{ initialData }}</p>
                <div class="buttons marginb">
                    <button @click="openModal" class="but btn btn-pink">Edit</button>
                    <Link href="/flight" class="but btn btn-pink"> Flights</Link>
                </div>
            </div>
        </div>
    </div>

    <EditModal :show="showModal" :initialData="initialData" @updatedData="updateData" @close="closeModal" />
</template>

<style scoped>
/* Adjustments for Heading */
.h1 {
    margin-top: 100px;
    margin-bottom: 20px; /* Reduce margin for better alignment */
    color: #ff69b4;
    text-align: center; /* Center align the heading */
}

/* Adjustments for Paragraph */
p {
    max-width: 800px;
    margin: 0 auto; /* Center align the paragraph */
    padding: 20px; /* Add some padding for readability */
    text-align: justify; /* Justify text for better readability */
    display: flex; /* Utilize flexbox */
    justify-content: center; /* Center align horizontally */
    align-items: center; /* Center align vertically */
}

/* Adjustments for Buttons Container */
.buttons {
    display: flex;
    align-items: center;
    justify-content: center; /* Center align the buttons */
    margin-top: 20px; /* Reduce top margin */
}

/* Adjustments for Buttons */
.but {
    padding: 12px 24px; /* Adjust padding for smaller buttons */
    margin: 0 10px; /* Add some space between buttons */
    width: 180px; /* Decrease width for smaller buttons */
    text-align: center;
    font-size: 1rem; /* Decrease font size */
    border-radius: 10px; /* Add some roundness to the buttons */
    border: none;
    cursor: pointer;
    transition: all 0.3s ease; /* Smooth transition for hover effect */
    background-color: #ff69b4; /* Pink background color */
    color: white; /* White text color */
}

.but:hover {
    background-color: #ff4397; /* Darker pink on hover */
    transform: scale(1.05); /* Slightly increase size on hover */
}

/* Additional Styling for Edit Button */
.but.edit {
    background-color: #4caf50; /* Green background color */
}

.but.edit:hover {
    background-color: #388e3c; /* Darker green on hover */
}

/* Additional Styling for Link Button */
.but.link {
    background-color: #2196f3; /* Blue background color */
}

.but.link:hover {
    background-color: #1976d2; /* Darker blue on hover */
}
</style>
