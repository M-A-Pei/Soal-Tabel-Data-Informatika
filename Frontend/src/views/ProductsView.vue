<script setup>
    import Card from '../components/Card.vue'
    import CustomButton from '../components/Button.vue'
    import { onMounted, ref } from 'vue';
    import { api } from '../api'
    import { useRouter } from 'vue-router';

    let data = ref([])
    let router = useRouter()

    onMounted(async () => {
        const x = await api.get('/products')
        console.log(x.data)
        data.value = x.data
    })

    async function deleteProduct(id){
        if (!confirm('Are you sure you want to delete this product?')) return; // Optional confirmation dialog
        try {
            await api.delete(`/products/${id}`);
            // Remove the deleted product from the list
            data.value = data.value.filter(product => product.id !== id);
            console.log(`Product with ID ${id} deleted successfully.`);
        } catch (error) {
            console.error(`Failed to delete product with ID ${id}:`, error);
            alert('Failed to delete the product. Please try again.');
        }
    }
</script>

<template>
    <div>
      <div style="display: flex; width: 100%; justify-content: space-between; margin-bottom: 20px">
        <div>
            <h1>Products Page!</h1>
            <p>all Products:</p>
        </div>
        <div>
            <CustomButton variant="warning" link="addProduct">Add Product</CustomButton>
        </div>
      </div>

      <div style="display: flex; width: 100%; flex-wrap: wrap; justify-content: center;">
        <Card 
            v-for="x in data" 
            :key="x.id" 
            :title="x.name"
        >
            <div style="display: flex; justify-content: space-between">
                <p>Rp. {{x.price}}</p>
                <p style="color: gray">Stock: {{x.current_stock}}</p>
            </div>

            <template #footer>
                <button @click="router.push({name: `editProduct`, params: {id: x.id}})" style="padding: 4px; background-color: yellow; border-radius: 10px">update</button>
                <button @click="deleteProduct(x.id)" style="padding: 4px; background-color: pink; border-radius: 10px">delete</button>
            </template>
        </Card>
      </div>
     
    </div>
</template>