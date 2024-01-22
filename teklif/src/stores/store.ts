import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useGlobalStore = defineStore('global', () => {
  const user = ref('')

  return { user }
})
