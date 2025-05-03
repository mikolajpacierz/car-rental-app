import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import CarsView from '../views/CarsView.vue';
import ClientsView from '../views/ClientsView.vue';
import ReservationsView from "../views/ReservationsView.vue";
import PaymentsView from "../views/PaymentsView.vue";

const routes = [
    { path: '/', name: 'Home', component: HomeView },
    { path: '/cars', name: 'Cars', component: CarsView },
    { path: '/clients', name:'Clients', component: ClientsView},
    { path: '/reservations', name:'Reservations', component: ReservationsView},
    { path: '/payments', name:'Payments', component: PaymentsView},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;