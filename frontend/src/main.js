import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import router from './router'
import {createPinia} from "pinia";

createApp(App).use(createPinia()).use(vuetify).use(router).mount('#app')
