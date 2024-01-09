<script setup>
import { ref, reactive } from 'vue'
const ILLER = reactive([
  { plakakodu: '01', il_adi: 'Adana' },
  { plakakodu: '06', il_adi: 'Ankara' },
  { plakakodu: '16', il_adi: 'Bursa' },
  { plakakodu: '34', il_adi: 'İstanbul' },
  { plakakodu: '61', il_adi: 'Trabzon' }
])
const selectedIl = ref([])
</script>

<template>
  <h1>Vuetify Kullanımı</h1>
  <v-combobox
    label="Seçiniz..."
    v-model="selectedIl"
    :items="ILLER"
    item-title="il_adi"
    item-value="plakakodu"
    variant="solo-filled"
    clearable
    multiple
    chips
  ></v-combobox>
  <h3>Seçilen İl:</h3>
  <pre>{{ selectedIl }}</pre>
</template>
