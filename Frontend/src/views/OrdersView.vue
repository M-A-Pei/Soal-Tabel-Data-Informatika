<script setup>
    import Card from '../components/Card.vue'
    import CustomButton from '../components/Button.vue'
    import OrderModal from '../components/OrderModal.vue'
    import { onMounted, ref } from 'vue';
    import { api } from '../api'

    const data = ref([])
    const activeOrder = ref(0)
    const showModal = ref(false);

    function handleAction() {
      alert('Confirmed!');
      showModal.value = false;
    }

    onMounted(async () => {
        const x = await api.get('/orders')
        console.log(x.data)
        data.value = x.data
    })
</script>

<template>
    <OrderModal 
      v-if="showModal" 
      :visible="showModal" 
      :title="`${data[activeOrder].customer_name}'s Order`" 
      @close="showModal = false"
    >
      <div 
        v-for="(x, index) in data[activeOrder].items"
        :key="index" 
        style="display: flex; justify-content: space-between; width: 100%">
        <p>{{ data[activeOrder].items[index].product_name }} <span style="color: gray">x{{ data[activeOrder].items[index].quantity }}</span></p>
        <p>Rp. {{ data[activeOrder].items[index].subtotal_price }}</p>
      </div>

      <template v-slot:footer>
        <b style="font-weight: bold: font-size: 20px">Rp. {{ data[activeOrder].total_price }}</b>
      </template>
    </OrderModal>
    <div>
      <div style="display: flex; width: 100%; justify-content: space-between; margin-bottom: 20px">
        <div>
            <h1>Orders Page!</h1>
            <p>all Orders:</p>
        </div>
        <div>
            <CustomButton variant="success" link="/addOrder">Make Order</CustomButton>
        </div>
      </div>

      <div style="display: flex; width: 100%; flex-wrap: wrap;">
        
        <Card 
            @click="showModal = true; activeOrder= index"
            v-for="(x, index) in data" 
            :key="index" 
            :title="`${x.customer_name}'s order`" 
            :footer="x.order_date.split(' ')[0]" >
              <p>Items: {{x.total_items}}</p>
              Total: Rp. {{x.total_price}}
            </Card>
      </div>
     
    </div>
</template>