// useCounter.js
import { ref } from 'vue'
export function useCounter() {
  const count = ref(0)
  const ucKati = () => {
    count.value = count.value * 3
  }

  const ikiKati = () => {
    count.value = count.value * 2
  }
  return { count, ikiKati, ucKati }
}
