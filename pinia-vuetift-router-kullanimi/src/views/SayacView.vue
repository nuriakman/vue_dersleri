<script setup>
import sayacButton from '../components/sayacButton.vue'
import sayacGoster from '../components/sayacGoster.vue'
</script>
<template>
  <h1>Burası Sayaç View Sayfasıdır</h1>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

  <h3>Sayaç Değeri:</h3>
  <sayacGoster />

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <h3>Sayaç Arttır Düğmesinin Çoklu Çağrılması</h3>
  <sayacButton v-for="i in 50" :key="i" :artis="i" />
</template>
