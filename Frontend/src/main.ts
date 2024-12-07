import './assets/main.css';
import { createApp } from 'vue';
import App from './App.vue';
import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css';
import router from './router';

const app = createApp(App);
app.use(Toast)
app.use(router).mount('#app');
