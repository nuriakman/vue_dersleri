import { defineStore } from 'pinia'

export const useGlobalStore = defineStore('globals', () => {
  const kullaniciAdi = 'Nuri Akman'
  const adetCounter = 0
  return { adetCounter, kullaniciAdi }
})
