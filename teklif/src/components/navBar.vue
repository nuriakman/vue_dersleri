<script setup lang="ts">
// import { RouterLink } from 'vue-router'
import routes from '@/router/index'
const myRoutes = routes.options.routes
// const myRoutes = routes.options.routes.filter((r) => r.meta.requiresAuth == true)

import { useGlobalStore } from '@/stores/store'
const globalStore = useGlobalStore()
</script>

<template>
  <nav>
    <ul>
      <li><strong>Teklif</strong></li>
    </ul>
    <ul>
      <template v-for="r in myRoutes" :key="r.path">
        <li v-if="r.meta && r.meta.requiresAuth == globalStore.isLoggedIn">
          <RouterLink :to="r.path"> {{ r.meta.menuName }}</RouterLink>
        </li>
      </template>
    </ul>
  </nav>
</template>
