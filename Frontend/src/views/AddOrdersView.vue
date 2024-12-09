<template>
    <div style="display: flex; justify-content: center; align-items: center; width: 100%; height:50vh;">
      <div style="border: 1px solid black; padding: 20px; border-radius: 15px">
        <h1>Make Order</h1>
        <form @submit.prevent="handleSubmit" style="display: flex; flex-direction: column; gap: 15px">
            <div>
                <label>Name</label>
                <input type="text" placeholder="your name" v-model="formData.name">  
            </div>
            <div>
                <label>Date</label>
                <input type="date" v-model="formData.order_date">  
            </div>
            <div class="custom-dropdown">
                <label>Items</label>
                <button type="button" class="dropdown-toggle">Select Products</button>
                <div class="dropdown-menu" style="flex-direction: column; gap: 15px">
                    <div 
                        v-for="(product, index) in products"
                        :key="product.id"
                        style="display: flex; justify-content: space-between; width: 100%"
                    >
                        <label>{{ product.name }}</label>
                        <input type="number" :max="product.current_stock" :min=0 v-model.number="formData.items[index].quantity"/>
                    </div>
                </div>
            </div>

            <button type="submit" style="border: 0.5px solid black; padding: 10px">Add</button>
        </form>
      </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { api } from '../api';
import {useToast} from 'vue-toastification'
import { useRouter } from 'vue-router';

const router = useRouter();

const products = ref([])

// Reactive form data
const formData = ref({
  customer_name: '',
  order_date: '',
  items:[]
});

const toast = useToast()

// Submit handler
const handleSubmit = async () => {
  try {
    const filteredItems = formData.value.items.filter(item => item.quantity > 0);
    formData.value.items = filteredItems;
    await api.post('/orders', formData.value, {headers: {'Content-Type': 'application/json'}});
    toast.success("successfully added new product")
    router.push('/orders')
  } catch (error) {
    toast.error("failed to add new product")
    console.error('Error submitting form:', error);
  }
};

onMounted(async () => {
    const x = await api.get('/products')
    console.log(x.data)
    products.value = x.data

    formData.value.items = products.value.map(x => ({
      product_id: x.id,
      quantity: 0
    }))
})

</script>

  
<style>
  .dropdown-menu {
    display: none;
    position: absolute;
    background: white;
    border: 1px solid #ccc;
    padding: 10px;
  }
  .custom-dropdown:hover .dropdown-menu {
    display: flex;
  }

  label{
    margin-right: 20px
  }
</style>