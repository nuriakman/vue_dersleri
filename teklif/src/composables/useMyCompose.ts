// useMyCompose.ts
import { ref } from 'vue'

export function useMyCompose() {
  const count = ref(0)

  const ikiKati = () => {
    count.value = count.value * 2
  }

  function hesapla() {
    return count.value * 3
  }

  const ucKati = () => {
    count.value = Number(hesapla())
  }

  return { count, ikiKati, ucKati }
}
