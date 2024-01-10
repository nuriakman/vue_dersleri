<script setup>
import { useGlobalStore } from '../stores/global'
const global = useGlobalStore()
</script>

<template>
  <main>
    <h1>Ana Sayfa</h1>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>
      KullanıcıAdı Değişeninin Değeri: <span>{{ global.kullaniciAdi }}</span>
    </p>
    <p>&nbsp;</p>
    <p>
      Sayaç Değişeninin Değeri: <span>{{ global.adetCounter }}</span>
    </p>
    <p>&nbsp;</p>
    <p><i>Bu değişkenler, diğer component'lar/view'ler içinden değerini alır.</i></p>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <h3>global.adetCounter Adlı Değişkenin 5 arttırılması:</h3>
    <button @click="global.adetCounter = global.adetCounter + 5">Sayacı Artır</button>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <h3>global.kullaniciAdi Adlı Değişkeni v-model ile bind edelim:</h3>

    <p><input v-model="global.kullaniciAdi" /></p>
    <p><i>Değişkenin değerini Pinia sayfasından da kontrol edebilirsiniz.</i></p>
  </main>
</template>

<style scoped>
button,
input {
  border: 3px solid red;
  padding: 5px;
  margin: 5px;
}
span {
  color: red;
  font-size: 30px;
}
</style>
