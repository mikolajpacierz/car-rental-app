import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import CarsView from '../views/CarsView.vue';
import UsersView from '../views/UsersView.vue';
import ReservationsView from "../views/ReservationsView.vue";
import PaymentsView from "../views/PaymentsView.vue";
import LoginView from "../views/LoginView.vue";
import RegisterView from "../views/RegisterView.vue";

const routes = [
    { path: '/', name: 'Home', component: HomeView},
    { path: '/cars', name: 'Cars', component: CarsView, meta: { requiresAuth: true }  },
    { path: '/users', name:'Users', component: UsersView, meta: { requiresAuth: true } },
    { path: '/reservations', name:'Reservations', component: ReservationsView, meta: { requiresAuth: true } },
    { path: '/payments', name:'Payments', component: PaymentsView, meta: { requiresAuth: true } },
    { path: '/login', name:'Login', component: LoginView},
    { path: '/register', name:'Register', component: RegisterView},
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem("jwt");
    if (!isAuthenticated && to.meta.requiresAuth) {
        alert("You need to sign in")
        next('/login');
    } else {
        next();
    }
});

export default router;