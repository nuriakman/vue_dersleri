<script setup lang="ts">
import { RouterView } from 'vue-router'
import navBar from '@/components/navBar.vue'
</script>

<template>
  <main class="container">
    <header>
      <navBar />
    </header>
    <RouterView />
  </main>
</template>

<style scoped></style>
