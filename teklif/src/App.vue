<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <main class="container">
    <header>
      <nav>
        <ul>
          <li><strong>Teklif</strong></li>
        </ul>
        <ul>
          <li><RouterLink to="/">AnaSayfa</RouterLink></li>
          <li><RouterLink to="/about">Hakkında</RouterLink></li>
          <li><RouterLink to="/login">Giriş</RouterLink></li>
        </ul>
      </nav>
    </header>
    <RouterView />
  </main>
</template>

<style scoped></style>
