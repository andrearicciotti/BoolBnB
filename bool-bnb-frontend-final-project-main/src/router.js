import { createRouter, createWebHistory } from 'vue-router'
import HomePage from './pages/HomePage.vue'
import SearchPage from './pages/SearchPage.vue'
import NotFoundPage from './pages/NotFoundPage.vue';
import ApartmentInfoPage from './pages/ApartmentInfoPage.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [

        {
            path: "/",
            name: "home",
            component: HomePage,
        },

        {
            path: "/search",
            name: "search",
            component: SearchPage,
        },
        {
            path: '/info/:slug',
            name: 'apartmentInfo',
            component: ApartmentInfoPage,
        },
        {
            path: '/:pathMatch(.*)*',
            name: 'not-found',
            component: NotFoundPage
        }
    ]
})

export { router }