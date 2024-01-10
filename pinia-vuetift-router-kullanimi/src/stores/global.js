import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useGlobalStore = defineStore('globals', () => {
  const kullaniciAdi = ref('Nuri Akman')
  const adetCounter = ref(0)
  return { adetCounter, kullaniciAdi }
})
