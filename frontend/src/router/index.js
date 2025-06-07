import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import CarsView from '../views/CarsView.vue';
import UsersView from '../views/UsersView.vue';
import ReservationsView from "../views/ReservationsView.vue";
import PaymentsView from "../views/PaymentsView.vue";
import LoginView from "../views/LoginView.vue";

const routes = [
    { path: '/', name: 'Home', component: HomeView },
    { path: '/cars', name: 'Cars', component: CarsView },
    { path: '/users', name:'Users', component: UsersView},
    { path: '/reservations', name:'Reservations', component: ReservationsView},
    { path: '/payments', name:'Payments', component: PaymentsView},
    { path: '/login', name:'Login', component: LoginView},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;