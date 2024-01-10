<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <nav>
      <RouterLink to="/">AnaSayfa</RouterLink> | <RouterLink to="/yeni">Yeni</RouterLink> |
      <RouterLink to="/liste">Liste</RouterLink>
    </nav>
  </header>

  <RouterView />
</template>

<style scoped></style>
