<script setup lang="ts">
import axios from 'axios'
import { ref, onMounted } from 'vue'

interface Item {
  id: number
  firmaadi: string
}

const item = ref<Item | null>(null)

const myProps = defineProps(['id'])
const editOfferId = myProps.id

console.log({ editOfferId })

onMounted(() => {
  axios
    .post('/index.php', {
      method: 'get-teklif',
      id: editOfferId
    })
    .then(function (response) {
      if (response.data.success) {
        item.value = response.data.item
      }
    })
    .catch(function (error) {
      console.log(error)
    })
})
</script>

<template>
  <article v-if="item">
    <table role="grid">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Firma Adı</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ item.id }}</td>
          <td>{{ item.firmaadi }}</td>
        </tr>
      </tbody>
    </table>
  </article>
</template>
