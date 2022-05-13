require('./bootstrap');
import Alpine from 'alpinejs';
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import piniaPersist from 'pinia-plugin-persist'

const pinia = createPinia()
pinia.use(piniaPersist)

createApp({
    components:{
      App,
    }
}).use(pinia).mount('#app')

window.Alpine = Alpine;
Alpine.start();
