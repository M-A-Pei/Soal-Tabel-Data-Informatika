<template>
    <div style="display: flex; justify-content: center; align-items: center; width: 100%; height:50vh;">
      <div style="border: 1px solid black; padding: 20px; border-radius: 15px">
        <h1>Add Product</h1>
        <form @submit.prevent="handleSubmit" style="display: flex; flex-direction: column; gap: 15px">
            <div>
                <label style="margin-right: 20px">Name</label>
                <input type="text" v-model="formData.name">  
            </div>
            <div>
                <label style="margin-right: 20px">Price</label>
                <input type="number" step="0.01" min="0" v-model="formData.price">  
            </div>
            <div>
                <label style="margin-right: 20px">Stock</label>
                <input type="number" v-model="formData.stock">  
            </div>
            <button type="submit" style="border: 0.5px solid black; padding: 10px">Add</button>
        </form>
      </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { api } from '../api';
import {useToast} from 'vue-toastification'
import { useRouter } from 'vue-router';

const router = useRouter();

// Reactive form data
const formData = ref({
  name: '',
  price: 0,
  stock: 0,
});

const toast = useToast()

// Submit handler
const handleSubmit = async () => {
  try {
    await api.post('/products', formData.value);
    toast.success("successfully added new product")
    router.push('/')
  } catch (error) {
    toast.error("failed to add new product")
    console.log('Error submitting form:', error);
  }
};
</script>

  