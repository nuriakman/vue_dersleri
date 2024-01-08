<script setup>
import { ref, reactive, onMounted } from 'vue'
const CEVAP = reactive({ iller: [], ilceler: [], semtler: [], mahalleler: [] })
const SECIM = ref([])

onMounted(() => {
  getDataIller() // İlleri getir...
  // this.IlSecildi();
})
function getDataIller() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.iller')
    .then((response) => response.json())
    .then((data) => (CEVAP.iller = data)) // DB'den gelen veriyi alalım...
}
</script>

<template>
  <h1>Vuetify Kullanımı</h1>
  <v-combobox
    v-model="SECIM"
    label="İl Seçiniz..."
    :items="CEVAP.iller"
    item-title="il_adi"
    item-value="id"
    variant="solo-filled"
    clearable
    multiple
    chips
  ></v-combobox>
  <h1>Seçim:</h1>
  <pre>{{ SECIM }}</pre>
</template>
