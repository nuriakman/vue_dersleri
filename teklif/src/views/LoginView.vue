<script setup lang="ts">
import router from '@/router/router'
import axios from 'axios'
import { reactive, onMounted } from 'vue'
import { useRouter } from 'vue-router'
const $router = useRouter()

import { useGlobalStore } from '@/stores/store'
const globalStore = useGlobalStore()

onMounted(() => {
  /*
  if (globalStore.getUserInfoFromStoredToken()) {
    // router.push({ name: 'home' })
    // const { myVar } = $route.query
    // const currentRouteName = $route.name;
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
          const goToPage = ($router.currentRoute.value.query.redirect as string) || '/'
          router.push(goToPage)
        } else {
          alert('Login başarısız oldu...')
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
