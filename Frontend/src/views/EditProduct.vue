<template>
    <div style="display: flex; justify-content: center; align-items: center; width: 100%; height:50vh;">
      <div style="border: 1px solid black; padding: 20px; border-radius: 15px">
        <h1>Update Product</h1>
        <form @submit.prevent="handleSubmit" style="display: flex; flex-direction: column; gap: 15px">
            <div>
                <label style="margin-right: 20px">Name</label>
                <input type="text" v-model="formData.name">  
            </div>
            <div>
                <label style="margin-right: 20px">Price</label>
                <input type="number" v-model="formData.price">  
            </div>
            <div>
                <label style="margin-right: 20px">Stock</label>
                <input type="number" v-model="formData.stock">  
            </div>
            <button type="submit" style="border: 0.5px solid black; padding: 10px">Save</button>
        </form>
      </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { api } from '../api';
import {useToast} from 'vue-toastification'
import { useRoute, useRouter } from 'vue-router';

const router = useRouter();
const route = useRoute();
const toast = useToast()
const id = route.params.id

onMounted(async () => {
    const x = await api.get(`/products/${id}`)
    console.log(x.data)
    data.value = x.data
})

// Reactive form data
const formData = ref({
  name: '',
  price: 0,
  stock: 0,
});



// Submit handler
const handleSubmit = async () => {
  try {
    await api.post('/products', formData.value);
    toast.success("successfully added new product")
    router.push('/')
  } catch (error) {
    toast.danger("failed to add new product")
    console.error('Error submitting form:', error);
  }
};
</script>

  