import Dashboard from './views/Dashboard.vue'
import About from './views/AboutUs.vue'
import ContactUs from './views/ContactUs.vue'
import Category from './views/Category.vue'
import Products from './views/Products.vue'
import Pharmacy from './views/Pharmacy.vue'
import Users from './views/Users.vue'

export const routes = [
    {
		path: '/home',
        component: Dashboard,
        name: 'dashboard'
    },
    {
        path: '/products',
        component: Products,
        name: 'products',
    },
    {
        path: '/pharmacy',
        component: Pharmacy,
        name: 'pharmacy',
    },
    {
        path: '/users',
        component: Users,
        name: 'users',
    },
];