<script setup>
import { ref, onMounted } from 'vue'

const iller = ref([])

const secili_IL = ref(0)
const CEVAP = ref('')

function IlSecildi() {
  CEVAP.value = iller.value.find((item) => item.id === secili_IL.value)
  console.log(CEVAP.value.il_adi)
}

function getDataIller() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.iller')
    .then((response) => response.json())
    .then((data) => (iller.value = data)) // DB'den gelen veriyi alalım...
}

onMounted(() => {
  getDataIller() // İlleri getir...
  // this.IlSecildi();
})
</script>

<template>
  <h1>{{ CEVAP }}</h1>
  <p v-show="iller.length > 0">
    <b>İL SEÇİNİZ:</b>
    <select v-model="secili_IL" @change="IlSecildi">
      <option value="0">** Seçiniz **</option>
      <option v-for="il in iller" :value="il.id" :key="il.id">
        {{ il.il_adi }}
      </option>
    </select>
  </p>

  <b>Seçili Değerler:</b><br />
  <b>İL:{{ secili_IL }}</b
  ><br />
</template>

<style scoped>
h1 {
  color: red;
}
</style>
