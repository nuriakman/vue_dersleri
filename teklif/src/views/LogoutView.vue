<script setup lang="ts">
import { useGlobalStore } from '@/stores/store'
import { onMounted } from 'vue'
const globalStore = useGlobalStore()

onMounted(() => {
  globalStore.logout()
})
</script>

<template>
  <main>
    <h1>Çıkış</h1>
    <p>Oturumunuz sona erdi...</p>
  </main>
</template>
