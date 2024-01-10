<script setup>
import sayacButton from '../components/sayacButton.vue'
import sayacGoster from '../components/sayacGoster.vue'
</script>

<template>
  <h1>Burası Pinia View Sayfasıdır</h1>
  <p>&nbsp;</p>
  <p>
    Pinia Stor içindeki adetCounter adlı değişkenin değerini 1 arttır:
    <sayacButton />
  </p>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <h3>global.adetCounter Adlı Değişkenin Değeri:</h3>
  <sayacGoster />

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <h3>Pina Store Değişeninin Compoment İçinde Kullanımı:</h3>
  <i>Aynı componenet 3 defa çağrılarak Pina testi yapalım</i>
  <p>&nbsp;</p>
  <sayacButton artis="2" />
  <sayacButton artis="5" />
  <sayacButton artis="10" />
</template>

<style scoped>
button,
input {
  border: 3px solid red;
  padding: 5px;
  margin: 5px;
}
span,
input {
  color: red;
  font-size: 30px;
}
</style>
