<script setup lang="ts">
import router from '@/router/router'
import axios from 'axios'
import { reactive, onMounted } from 'vue'

import { useGlobalStore } from '@/stores/store'
const globalStore = useGlobalStore()

onMounted(() => {
  console.log('onMounted: loginView')
  /*
  if (globalStore.login()) {
    router.push({ name: 'home' })
  }
  */
})

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
        if (globalStore.login(response.data.token)) {
          router.push({ name: 'home' })
        } else {
          alert('ne oldu?')
        }
      } else {
        localStorage.removeItem('token')
      }
    })
    .catch(function (error) {
      console.log(error)
    })
}
</script>

<template>
  <main>
    <h1>Giriş</h1>
    {{ globalStore }}
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
@/router/router
