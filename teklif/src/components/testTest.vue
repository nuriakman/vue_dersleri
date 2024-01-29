<script setup lang="ts">
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { defineProps } from 'vue'
// const { start, count } = toRefs(defineProps(['start', 'count']))
const { start, count } = defineProps(['start', 'count'])

interface Item {
  id: number
  firmaadi: string
}

const items = ref<Item[]>([])

onMounted(() => {
  console.log(start, count)
  axios
    .post('/index.php', {
      method: 'get-teklifler',
      start: start,
      count: count
    })
    .then(function (response) {
      if (response.data.success) {
        items.value = response.data.items
      }
    })
    .catch(function (error) {
      console.log(error)
    })
})
</script>

<template>
  <h3>Liste: {{ start }} - {{ count }}</h3>
  <article v-if="items.length">
    <table role="grid">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Firma Adı</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="row in items" :key="row.id">
          <th scope="row">
            <RouterLink :to="`/offer/edit/${row.id}`">{{ row.id }}</RouterLink>
          </th>
          <td>{{ row.firmaadi }}</td>
        </tr>
      </tbody>
    </table>
  </article>
</template>
