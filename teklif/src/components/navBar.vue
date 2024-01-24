<script setup lang="ts">
import { useGlobalStore } from '@/stores/store'
const globalStore = useGlobalStore()
</script>

<template>
  <nav>
    <ul>
      <li><strong>Teklif</strong></li>
    </ul>
    <ul v-if="!globalStore.user.isLoggedIn">
      <li>
        <a href="#" role="button" class="outline">
          <RouterLink to="/login">Giriş Yap</RouterLink>
        </a>
      </li>
    </ul>
    <ul v-if="globalStore.user.isLoggedIn">
      <li>
        <a href="#" role="button" class="outline">
          <RouterLink to="/">Ana Sayfa</RouterLink>
        </a>
      </li>
      <li>
        <a href="#" role="button" class="outline">
          <RouterLink to="/logout">Oturumu Kapat</RouterLink>
        </a>
      </li>
    </ul>
  </nav>
</template>
