<script setup lang="ts">
import axios from 'axios'

function getData() {
  const token = localStorage.getItem('token')

  if (!token) {
    // Token yoksa işlem yapma veya token isteği yapma
    alert('TOKEN bulunamadı!')
    return
  }

  axios
    .post('/index.php', { method: 'getData' }, { headers: { Authorization: `Bearer ${token}` } })
    .then(function (response) {
      console.log(response.data)
    })
    .catch(function (error) {
      console.error('İstek hatası:', error)
    })
}
</script>

<template>
  <main>
    <h1>Ana Sayfa</h1>
    <button @click="getData">Get Data</button>
  </main>
</template>
