<template>
    <div>
      <h1>Products Page!</h1>
      <p>all Products:</p>
    </div>
</template>

<script setup>
    import { onMounted, ref } from 'vue';
    import axios from 'axios';

    const data = ref([])

    onMounted(async () => {
        data = await axios.get('http://localhost:8000/api/products')
        console.log(data)
    })
</script>