<script setup>
import { useGlobalStore } from '../stores/global'
const global = useGlobalStore()
</script>

<template>
  <p>
    global.adetCounter Adlı Değişkenin Değeri: <span>{{ global.adetCounter }}</span>
  </p>
</template>

<style scoped>
span {
  color: blue;
  font-size: 30px;
}
</style>
