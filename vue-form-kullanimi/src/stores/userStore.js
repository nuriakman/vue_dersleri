import { reactive } from 'vue'
import { defineStore } from 'pinia'

export const useGlobalUserStore = defineStore('user', () => {
  const User = reactive({
    name: '',
    tc: '',
    age: 0,
    email: '',
    city: '',
    courses: []
  })

  return { User }
})
