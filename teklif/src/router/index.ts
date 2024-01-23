import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import AboutView from '@/views/AboutView.vue'
import LoginView from '@/views/LoginView.vue'
import WelcomeView from '@/views/WelcomeView.vue'
import PageNotFoundView from '@/views/PageNotFoundView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta: {
        requiresAuth: true,
        menuName: 'Home'
      }
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView,
      meta: {
        requiresAuth: true,
        menuName: 'Hakkımızda'
      }
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
      meta: {
        requiresAuth: false,
        menuName: 'Giriş'
      }
    },
    {
      path: '/welcome',
      name: 'welcome',
      component: WelcomeView,
      meta: {
        requiresAuth: true,
        menuName: 'Anasayfa'
      }
    },
    {
      path: '/:catchAll(.*)',
      name: 'notfound',
      component: PageNotFoundView,
      meta: {
        requiresAuth: false
      }
    }
  ]
})

export default router
