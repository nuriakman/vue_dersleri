import { createRouter, createWebHistory } from 'vue-router'
import { useGlobalStore } from '@/stores/store'
import HomeView from '@/views/HomeView.vue'
import AboutView from '@/views/AboutView.vue'
import LoginView from '@/views/LoginView.vue'
import LogoutView from '@/views/LogoutView.vue'
import PageNotFoundView from '@/views/PageNotFoundView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      alias: ['/home', '/anasayfa'],
      meta: {
        requiresAuth: true,
        menuName: 'Home',
        title: 'Anasayfa'
      }
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView,
      meta: {
        requiresAuth: true,
        menuName: 'Hakkımızda',
        title: 'Hakkımızda Sayfası'
      }
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
      meta: {
        requiresAuth: false,
        menuName: 'Giriş',
        title: 'Giriş Sayfası'
      }
    },
    {
      path: '/logout',
      name: 'logout',
      component: LogoutView,
      meta: {
        requiresAuth: false,
        menuName: 'Çıkış',
        title: 'Çıkış Sayfası'
      }
    },
    {
      path: '/:catchAll(.*)',
      name: 'notfound',
      component: PageNotFoundView,
      meta: {
        requiresAuth: false,
        title: 'Bulunamadı...'
      }
    }
  ]
})

router.beforeEach((to, from, next) => {
  const globalStore = useGlobalStore()
  if (to.meta.requiresAuth) {
    if (globalStore.isLoggedIn) {
      next()
    } else {
      next({ name: 'login' })
    }
  } else {
    next()
  }
})

const DEFAULT_TITLE = 'Teklif Projesi'

router.afterEach((to) => {
  document.title = String(to.meta.title) || DEFAULT_TITLE // TS nedeniyle, String çağırmazsam document.title'a atama yapamıyorum
})

export default router
