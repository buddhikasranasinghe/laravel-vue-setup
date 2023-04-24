import Dashboard from './views/UserDashboard.vue'
import About from './views/AboutUs.vue'
import ContactUs from './views/ContactUs.vue'
import Category from './views/Category.vue'

export const routes = [
    {
		path: '/home',
        component: Dashboard,
        name: 'dashboard'
    },
    {
		path: '/about',
        component: About,
        name: 'about'
    },
    {
		path: '/contact',
        component: ContactUs,
        name: 'contact'
    },
    {
		path: '/category',
        component: Category,
        name: 'maincategory'
    },
];