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
  <h3>Vuetify v-combobox Kullanım Örneği:</h3>
  <p>&nbsp;</p>
  <v-combobox
    label="İl Seçiniz..."
    v-model="selectedIl"
    :items="ILLER"
    item-title="il_adi"
    item-value="plakakodu"
    variant="solo-filled"
    clearable
    multiple
    chips
  ></v-combobox>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <h3>selectedIl Adlı Değişkenin Değeri:</h3>
  <pre>{{ selectedIl }}</pre>
</template>
