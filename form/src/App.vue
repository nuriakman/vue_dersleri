<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <p>&nbsp;</p>
  <hr />
  <header>
    <nav>
      <RouterLink to="/" style="margin-right: 30px">Ana Sayfa</RouterLink>
      <RouterLink to="/test">Test Vuetify</RouterLink>
    </nav>
  </header>
  <hr />
  <p>&nbsp;</p>
  <RouterView />
</template>

<style scoped></style>
