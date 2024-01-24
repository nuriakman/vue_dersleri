<script setup lang="ts">
import router from '@/router'
import axios from 'axios'
import { useGlobalStore } from '@/stores/store'
const globalStore = useGlobalStore()

function getData() {
  const token = localStorage.getItem('token')

  if (!token) {
    // Token yoksa işlem yapma veya token isteği yapma
    alert('TOKEN bulunamadı! Lütfen giriş yapınız!')
    router.push({ name: 'Login' })
  }

  axios
    .post('/index.php', { method: 'getData' })
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
    {{ globalStore.user }}
    <button @click="getData">Get Data</button>
  </main>
</template>
