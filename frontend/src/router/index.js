import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import CarsView from '../views/CarsView.vue';
import ClientView from '../views/ClientView.vue';

const routes = [
    { path: '/', name: 'Home', component: HomeView },
    { path: '/cars', name: 'Cars', component: CarsView },
    { path: '/clients', name:'Clients', component: ClientView},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;