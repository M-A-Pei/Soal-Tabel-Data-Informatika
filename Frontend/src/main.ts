
import { createApp } from 'vue';
import App from './App.vue';

// Import Bootstrap CSS
import 'bootstrap/dist/css/bootstrap.css';
// Import BootstrapVueNext CSS
import 'bootstrap-vue-next/dist/bootstrap-vue-next.css';

// Import BootstrapVueNext as named exports
import { BButton, BAlert, BNavbar, BNavbarBrand, BNavbarToggle, BCollapse, BNav, BNavItem } from 'bootstrap-vue-next';

const app = createApp(App);

app.component('BButton', BButton);
app.component('BAlert', BAlert);
app.component('BNavbar', BNavbar);
app.component('BNavbarBrand', BNavbarBrand);
app.component('BNavbarToggle', BNavbarToggle);
app.component('BCollapse', BCollapse);
app.component('BNav', BNav);
app.component('BNavItem', BNavItem);

app.mount('#app');
