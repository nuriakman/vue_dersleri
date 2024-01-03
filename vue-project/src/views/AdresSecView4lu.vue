<script setup>
import { ref, onMounted } from 'vue'

const iller = ref([])
const ilceler = ref([])
const semtler = ref([])
const mahalleler = ref([])

const secili_IL = ref(0)
const secili_Ilce = ref(0)
const secili_Semt = ref(0)
const secili_MAHALLE = ref(0)

onMounted(() => {
  getDataIller() // İlleri getir...
  // this.IlSecildi();
})

function IlSecildi() {
  secili_Ilce.value = 0
  getDataIlceler()
}

function IlceSecildi() {
  secili_Semt.value = 0
  getDataSemtler()
}

function SemtSecildi() {
  secili_MAHALLE.value = 0
  getDataMahalleler()
}

function MahalleSecildi() {
  //
}

function getDataMahalleler() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.mahalleler&id=' + secili_Semt.value)
    .then((response) => response.json())
    .then((data) => (mahalleler.value = data)) // DB'den gelen veriyi alalım...
}

function getDataSemtler() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.semtler&id=' + secili_Ilce.value)
    .then((response) => response.json())
    .then((data) => (semtler.value = data)) // DB'den gelen veriyi alalım...
}

function getDataIlceler() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.ilceler&id=' + secili_IL.value)
    .then((response) => response.json())
    .then((data) => (ilceler.value = data)) // DB'den gelen veriyi alalım...
}

function getDataIller() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.iller')
    .then((response) => response.json())
    .then((data) => (iller.value = data)) // DB'den gelen veriyi alalım...
}
</script>

<template>
  <h1>VUE Dersleri</h1>
  <p v-show="iller.length > 0">
    <b>İL SEÇİNİZ:</b>
    <select v-model="secili_IL" @change="IlSecildi">
      <option value="0">** Seçiniz **</option>
      <option v-for="il in iller" :value="il.id" :key="il.id">
        {{ il.il_adi }}
      </option>
    </select>
  </p>
  iller.id
  <p v-show="ilceler.length > 0">
    <b>İLÇE SEÇİNİZ:</b>
    <select v-model="secili_Ilce" @change="IlceSecildi">
      <option value="0">** Seçiniz **</option>
      <option v-for="ilce in ilceler" :value="ilce.id" :key="ilce.id">
        {{ ilce.ilce_adi }}
      </option>
    </select>
  </p>

  <p v-show="semtler.length > 0">
    <b>SEMT SEÇİNİZ:</b>
    <select v-model="secili_Semt" @change="SemtSecildi">
      <option value="0">** Seçiniz **</option>
      <option v-for="semt in semtler" :value="semt.id" :key="semt.id">
        {{ semt.semt_adi }}
      </option>
    </select>
  </p>

  <p v-show="mahalleler.length > 0">
    <b>MAHALLE SEÇİNİZ:</b>
    <select v-model="secili_MAHALLE" @change="MahalleSecildi">
      <option value="0">** Seçiniz **</option>
      <option v-for="mahalle in mahalleler" :value="mahalle.id" :key="mahalle.id">
        {{ mahalle.mahalle_adi }}
      </option>
    </select>
  </p>

  <b>Seçili Değerler:</b><br />
  <b>İL:{{ secili_IL }}</b
  ><br />

  <b>İLÇE:{{ secili_Ilce }}</b
  ><br />

  <b>SEMT:{{ secili_Semt }}</b
  ><br />

  <b>MAHALLE:{{ secili_MAHALLE }}</b
  ><br />
</template>

<style scoped>
h1 {
  color: red;
}
</style>
