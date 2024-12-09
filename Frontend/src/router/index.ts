import { createRouter, createWebHistory } from 'vue-router';

// Import your views/components
import MainLayout from '@/layouts/MainLayout.vue';
import ProductsView from '../views/ProductsView.vue';
import OrdersView from '../views/OrdersView.vue';
import AddProductView from '../views/AddProductView.vue';
import AddOrdersView from '@/views/AddOrdersView.vue';

// Define your routes
const routes = [
    {
      path: '/',
      component: MainLayout,
      children: [
        {
          path: '',
          name: 'Products',
          component: ProductsView,
        },
        {
          path: '/orders',
          name: 'Orders',
          component: OrdersView,
        },
        {
          path: '/addProduct',
          name: 'addProduct',
          component: AddProductView,
        },
        {
          path: '/addOrder',
          name: 'addOrders',
          component: AddOrdersView,
        }
      ],
    },
  ];

// Create and configure the router
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
