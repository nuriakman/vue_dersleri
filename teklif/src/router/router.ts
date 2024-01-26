import { createRouter, createWebHistory } from 'vue-router'
import { useGlobalStore } from '@/stores/store'
import HomeView from '@/views/HomeView.vue'
import AboutView from '@/views/AboutView.vue'
import LoginView from '@/views/LoginView.vue'
import LogoutView from '@/views/LogoutView.vue'
import OfferView from '@/views/OfferView.vue'
import OffersView from '@/views/OffersView.vue'
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
        title: 'Anasayfa'
      }
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView,
      meta: {
        requiresAuth: true,
        title: 'Hakkımızda Sayfası'
      }
    },
    {
      path: '/offers',
      name: 'offers',
      component: OffersView,
      meta: {
        requiresAuth: true,
        title: 'Teklif Listesi'
      }
    },
    {
      path: '/offers/:id',
      name: 'offer',
      component: OfferView,
      meta: {
        requiresAuth: true,
        title: 'Teklif Detayı'
      }
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
      meta: {
        requiresAuth: false,
        title: 'Giriş Sayfası'
      }
    },
    {
      path: '/logout',
      name: 'logout',
      component: LogoutView,
      meta: {
        requiresAuth: false,
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
  console.log(to.name)
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
  document.title = to.meta.title ? String(to.meta.title) : DEFAULT_TITLE // TS nedeniyle, String çağırmazsam document.title'a atama yapamıyorum
})

export default router
