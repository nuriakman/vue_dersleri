<script setup lang="ts">
import axios from 'axios'
import { ref, onMounted } from 'vue'

const rows = ref([])

onMounted(() => {
  axios
    .get('/index.php?method=get-teklifler')
    .then(function (response) {
      if (response.data.success) {
        console.log(response.data)
      } else {
        alert('Veri çekerken hata oluştu')
      }
    })
    .catch(function (error) {
      console.log(error)
    })
})
</script>

<template>
  <div>
    <h1>Teklif Listesi</h1>
    <div v-for="row in rows" :key="row">
      <h3>{{ row }}</h3>
    </div>
  </div>
</template>
