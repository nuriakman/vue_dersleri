<script setup lang="ts">
import axios from 'axios'
import { reactive } from 'vue'

import { ref, onMounted } from 'vue'
import useJwt from '@/compositions/useJwt'

onMounted(() => {
  const { token, setToken, clearToken } = useJwt()
})

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
