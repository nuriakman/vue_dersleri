<script setup>
import { useGlobalStore } from '../stores/global'
const global = useGlobalStore()

const prop = defineProps({
  artis: {
    type: String,
    default: '1'
  }
})

function sayacArttir() {
  global.adetCounter = global.adetCounter + parseInt(prop.artis)
}
</script>

<template>
  <button @click="sayacArttir">Sayacı {{ prop.artis }} Arttır</button>
</template>

<style scoped>
button {
  border: 3px solid red;
  padding: 5px;
  margin: 5px;
}
</style>
