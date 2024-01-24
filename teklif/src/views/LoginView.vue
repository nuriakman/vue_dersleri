<script setup lang="ts">
import router from '@/router'
import axios from 'axios'
import { reactive } from 'vue'
import jwtDecode from 'jwt-decode'

import { useGlobalStore } from '@/stores/store'
const globalStore = useGlobalStore()

// JwtPayload tipini tanımlayalım
interface JwtPayload {
  sub: number
  exp: number
  adisoyadi: string
}

const formData = reactive({
  username: '',
  password: ''
})

function doLogin() {
  axios
    .post('/index.php', {
      method: 'login',
      user: formData
    })
    .then(function (response) {
      if (response.data.success) {
        const decoded = jwtDecode<JwtPayload>(response.data.token) // Returns with the JwtPayload type
        globalStore.login(response.data.token, decoded.sub, decoded.adisoyadi)
        router.push({ name: 'home' })
      } else {
        localStorage.removeItem('token')
      }

      console.log(response)
    })
    .catch(function (error) {
      console.log(error)
    })
}
</script>

<template>
  <main>
    <h1>Giriş</h1>
    <form autocomplete="off" @submit.prevent="doLogin">
      <div class="grid">
        <label for="username">
          Kullanıcı Adınız
          <input type="text" v-model="formData.username" placeholder="kullanıcı adı" />
        </label>

        <label for="password">
          Parolanız
          <input type="password" v-model="formData.password" placeholder="parola" />
        </label>
      </div>

      <button type="submit">Giriş Yap ...</button>
    </form>
  </main>
</template>
