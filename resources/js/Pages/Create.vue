<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

defineOptions({
    layout: MyLayout
});

const form = useForm({
    name: '',
    description: '',
    imageUrl: '',
});

const submit = () => {
    form.submit('post', '/flight');
};

const props = defineProps({
    flight: Object
});
</script>

<template>
<div class="flex justify-center items-center h-full">
    <div class="p-8">
        <h1 class="text-4xl my-3 pink fw-bold">Add New Flight</h1>
        <div class="form-container">
            <form @submit.prevent="submit">
                <table class="w-full">
                    <tr>
                        <th class="text-left">Name:</th>
                        <td class="px-4">
                            <input class="input-field" v-model="form.name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Description:</th>
                        <td class="px-4">
                            <input class="input-field" v-model="form.description" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Image URL:</th>
                        <td class="px-4">
                            <input class="input-field" v-model="form.imageUrl" type="text">
                        </td>
                    </tr>
                </table>
                <div class="text-right">
                    <Link href="/flight" class="btn btn-back">Back</Link>
                    <button type="submit" class="btn btn-save ml-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<style scoped>
/* Adjustments for Form Container */
.form-container {
    max-width: 600px; /* Adjust max-width for better layout */
    margin: 0 auto; /* Center align the form */
    padding: 20px; /* Add padding for spacing */
    border: 1px solid #ccc; /* Add a light border */
    border-radius: 8px; /* Add some roundness to the border */
}

/* Adjustments for Input Fields */
.input-field {
    width: 100%; /* Full width for input fields */
    padding: 10px; /* Add padding for spacing */
    margin-bottom: 15px; /* Add space between input fields */
    border: 1px solid #ccc; /* Add a light border */
    border-radius: 4px; /* Add some roundness to the border */
    transition: border-color 0.3s ease; /* Smooth transition for border color */
}

.input-field:focus {
    outline: none; /* Remove outline on focus */
    border-color: #ff69b4; /* Pink border color on focus */
}

/* Adjustments for Buttons */
.btn {
    padding: 10px 20px; /* Adjust padding for buttons */
    border: none; /* Remove border */
    border-radius: 4px; /* Add some roundness to the buttons */
    cursor: pointer;
    transition: background-color 0.3s ease; /* Smooth transition */
}

.btn-back {
    background-color: #ff69b4; /* Pink background color */
    color: white; /* White text color */
}

.btn-back:hover {
    background-color: #e0529c; /* Darker pink on hover */
}

.btn-save {
    background-color: #ff69b4; /* Pink background color */
    color: white; /* White text color */
}

.btn-save:hover {
    background-color: #e0529c; /* Darker pink on hover */
}
</style>
