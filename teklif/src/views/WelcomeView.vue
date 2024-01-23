<script setup lang="ts">
const userName = localStorage.getItem('userName')
</script>

<template>
  <main>
    <hgroup>
      <h1>{{ userName }}</h1>
      <p>Hoşgeldiniz</p>
    </hgroup>
  </main>
</template>
