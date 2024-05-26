<template>
    <div v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl mb-4">Edit Information</h2>
            <form @submit.prevent="submitForm">
                <textarea v-model="form.content" class="w-full p-2 border rounded"></textarea>
                <div class="mt-4 flex justify-end space-x-2">
                    <button type="button" @click="closeModal" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-pink" :disabled="form.processing">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, defineProps, defineEmits } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    show: Boolean,
    initialData: String,
});

const emit = defineEmits(['close', 'updatedData']);

const form = useForm({ content: props.initialData });

watch(() => props.initialData, (newVal) => {
    form.content = newVal;
});

const closeModal = () => {
    emit('close');
};

const submitForm = () => {
    form.put(route('about-me.update'), {
        onSuccess: () => {
            emit('close');
            emit('updatedData', form.content); // Emit content from form
        },
    });
};
</script>
<style scoped>
/* Adjustments for Modal Background */
.bg-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Adjustments for Modal Content */
.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    max-width: 400px; /* Adjust maximum width */
    width: 100%;
}

/* Adjustments for Modal Title */
.modal-title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

/* Adjustments for Textarea */
.textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc; /* Add a light border */
    border-radius: 4px;
    resize: vertical; /* Allow vertical resizing */
}

/* Adjustments for Button Container */
.button-container {
    margin-top: 1rem;
    display: flex;
    justify-content: flex-end; /* Align buttons to the right */
}

/* Adjustments for Buttons */
.btn {
    padding: 8px 16px; /* Adjust padding */
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Smooth transition */
}

.btn-secondary {
    background-color: #ccc; /* Grey background color */
    color: #333; /* Dark text color */
}

.btn-pink {
    background-color: #ff69b4; /* Pink background color */
    color: white; /* White text color */
}

.btn-pink:hover,
.btn-secondary:hover {
    background-color: #e0529c; /* Darker pink or grey on hover */
}

/* Disable button when processing */
.btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}
</style>
