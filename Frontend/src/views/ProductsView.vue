<script setup>
    import Card from '../components/Card.vue'
    import CustomButton from '../components/Button.vue'
    import { onMounted, ref } from 'vue';
    import { api } from '../api'

    let data = ref([])

    onMounted(async () => {
        const x = await api.get('/products')
        console.log(x.data)
        data.value = x.data
    })
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

      <div style="display: flex; width: 100%; flex-wrap: wrap">
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
                <button style="padding: 4px; background-color: yellow; border-radius: 10px">update</button>
                <button style="padding: 4px; background-color: pink; border-radius: 10px">delete</button>
            </template>
        </Card>
      </div>
     
    </div>
</template>