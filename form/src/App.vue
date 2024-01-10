<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <header>
    <nav>
      <RouterLink to="/">Ana Sayfa</RouterLink> | <RouterLink to="/pinia">Pinia</RouterLink> |
      <RouterLink to="/sayac">Sayac</RouterLink> |
      <RouterLink to="/vuetify">Vuetify</RouterLink>
    </nav>
  </header>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <RouterView />
</template>

<style scoped></style>
