<script setup lang="ts">
import axios from 'axios'
import { reactive } from 'vue'
import jwtDecode from 'jwt-decode'

import { useGlobalStore } from '@/stores/store'
const globalStore = useGlobalStore()

// JwtPayload tipini tanımlayalım
interface JwtPayload {
  sub: string
  exp: number
  adisoyadi: string
  eposta: string
}

const user = reactive({
  username: '',
  password: ''
})

function doLogin() {
  axios
    .post('/index.php', {
      method: 'login',
      user
    })
    .then(function (response) {
      if (response.data.success) {
        localStorage.setItem('token', response.data.token)
        const decoded = jwtDecode<JwtPayload>(response.data.token) // Returns with the JwtPayload type
        localStorage.setItem('id', decoded.sub) // LocalStore içine kaydedelim.
        globalStore.userId = parseInt(decoded.sub) // Pinia GlobalStore içinde saklayalım
        globalStore.user.name = decoded.adisoyadi
        globalStore.user.mail = decoded.eposta
        globalStore.isLoggedIn = true
        globalStore.kisi = decoded
        localStorage.setItem('KISI', JSON.stringify(decoded)) // JSON.parse() ile Array'e çevirebiliriz
        // router.push('/welcome')
      } else {
        globalStore.userId = 0
        globalStore.user.name = ''
        globalStore.user.mail = ''
        globalStore.isLoggedIn = false
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
    <pre>{{ globalStore }}</pre>
    <form autocomplete="off" @submit.prevent="doLogin">
      <div class="grid">
        <label for="username">
          Kullanıcı Adınız
          <input type="text" v-model="user.username" placeholder="kullanıcı adı" />
        </label>

        <label for="password">
          Parolanız
          <input type="password" v-model="user.password" placeholder="parola" />
        </label>
      </div>

      <button type="submit">Giriş Yap ...</button>
    </form>
  </main>
</template>
