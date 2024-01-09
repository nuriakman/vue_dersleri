<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <nav>
      <RouterLink to="/">Ana Sayfa</RouterLink>
    </nav>
  </header>

  <RouterView />
</template>

<style scoped></style>
