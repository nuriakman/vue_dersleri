<script setup lang="ts">
import { useMyCompose } from '@/composables/useMyCompose'
const { ikiKati, count } = useMyCompose()
</script>

<template>
  <main>
    <h1>Ana Sayfa</h1>
    <h1>{{ count }}</h1>
    <button @click="count = 0">Sıfırla</button>
    <button @click="count++">Arttır</button>
    <button @click="ikiKati">ikiKati</button>
  </main>
</template>
