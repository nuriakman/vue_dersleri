import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import YeniView from '@/views/YeniView.vue'
import ListeView from '@/views/ListeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/yeni',
      name: 'yeni',
      component: YeniView
    },
    {
      path: '/liste',
      name: 'liste',
      component: ListeView
    }
  ]
})

export default router
