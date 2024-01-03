<script setup>
import { ref, reactive, onMounted } from 'vue'

const CEVAP = reactive({ iller: [], ilceler: [], semtler: [], mahalleler: [] })
const SECIM = reactive({ il: {}, ilce: {}, semt: {}, mahalle: {} })

onMounted(() => {
  getDataIller() // İlleri getir...
  // this.IlSecildi();
})

function IlSecildi() {
  SECIM.ilce = {}
  SECIM.semt = {}
  SECIM.mahalle = {}
  getDataIlceler()
}

function IlceSecildi() {
  SECIM.semt = {}
  SECIM.mahalle = {}
  getDataSemtler()
}

function SemtSecildi() {
  SECIM.mahalle = {}
  getDataMahalleler()
}

function MahalleSecildi() {
  //
}

function getDataMahalleler() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.mahalleler&id=' + SECIM.semt.id)
    .then((response) => response.json())
    .then((data) => (CEVAP.mahalleler = data)) // DB'den gelen veriyi alalım...
}
function getDataSemtler() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.semtler&id=' + SECIM.ilce.id)
    .then((response) => response.json())
    .then((data) => (CEVAP.semtler = data)) // DB'den gelen veriyi alalım...
}

function getDataIlceler() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.ilceler&id=' + SECIM.il.id)
    .then((response) => response.json())
    .then((data) => (CEVAP.ilceler = data)) // DB'den gelen veriyi alalım...
}

function getDataIller() {
  fetch('http://localhost/vue_dersleri/api.php?method=get.iller')
    .then((response) => response.json())
    .then((data) => (CEVAP.iller = data)) // DB'den gelen veriyi alalım...
}

function Sorgula() {
  const url = 'http://localhost/vue_dersleri/hat.kontrolu.php'
  const data = {
    key1: 'value1',
    key2: 'value2',
    key3: 'value2'
  }

  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
      // Diğer isteğe özel başlıkları da burada ekleyebilirsiniz.
    },
    body: JSON.stringify(data)
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`)
      }
      return response.json()
    })
    .then((responseData) => {
      console.log('POST işlemi başarılı:', responseData)
    })
    .catch((error) => {
      console.error('POST işlemi hatası:', error)
    })
}
</script>

<template>
  <h1>VUE Dersleri</h1>
  <p v-show="CEVAP.iller.length > 0">
    <b>İL SEÇİNİZ:</b>
    <select v-model="SECIM.il" @change="IlSecildi">
      <option v-if="!SECIM.il.id" :value="SECIM.il">** Seçiniz **</option>
      <option v-for="il in CEVAP.iller" :value="il" :key="il.id">
        {{ il.il_adi }}
      </option>
    </select>
  </p>

  <p v-show="CEVAP.ilceler.length > 0">
    <b>İLÇE SEÇİNİZ:</b>
    <select v-model="SECIM.ilce" @change="IlceSecildi">
      <option v-if="!SECIM.ilce.id" :value="SECIM.ilce">** Seçiniz **</option>
      <option v-for="ilce in CEVAP.ilceler" :value="ilce" :key="ilce.id">
        {{ ilce.ilce_adi }}
      </option>
    </select>
  </p>

  <p v-show="CEVAP.semtler.length > 0">
    <b>SEMT SEÇİNİZ:</b>
    <select v-model="SECIM.semt" @change="SemtSecildi">
      <option v-if="!SECIM.semt.id" :value="SECIM.semt">** Seçiniz **</option>
      <option v-for="semt in CEVAP.semtler" :value="semt" :key="semt.id">
        {{ semt.semt_adi }}
      </option>
    </select>
  </p>

  <p v-show="CEVAP.mahalleler.length > 0">
    <b>MAHALLE SEÇİNİZ:</b>
    <select v-model="SECIM.mahalle" @change="MahalleSecildi">
      <option v-if="!SECIM.mahalle.id" :value="SECIM.mahalle">** Seçiniz **</option>
      <option v-for="mahalle in CEVAP.mahalleler" :value="mahalle" :key="mahalle.id">
        {{ mahalle.mahalle_adi }}
      </option>
    </select>
  </p>

  <button @click="Sorgula">Sorgula!</button>

  <h1>
    {{ CEVAP.iller.length }}, {{ CEVAP.ilceler.length }}, {{ CEVAP.semtler.length }},
    {{ CEVAP.mahalleler.length }}
  </h1>

  <h1>
    <pre>
    {{ SECIM }}
  </pre
    >
  </h1>
</template>

<style scoped>
h1 {
  color: red;
}
</style>
