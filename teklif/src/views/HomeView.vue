<script setup lang="ts">
import testTest from '@/components/testTest.vue'
import { ref, computed, onMounted } from 'vue'
const pageNo = ref(1)
const itemPerPage = ref(3)
const items = ref<Item[]>([])

interface Item {
  id: number
  firmaadi: string
}

const isFirstPage = computed(() => pageNo.value <= 1)
// const getCount = computed(() => itemPerPage.value * 1)
// const getStart = computed(() => (pageNo.value - 1) * 3)

function getStyle(n: number): string {
  return n == itemPerPage.value ? 'underline' : 'none'
}

function page(n: number) {
  itemPerPage.value = n
  pageNo.value = 0
  gotoPage(1)
}

function gotoPage(n: number) {
  pageNo.value += n
}

onMounted(() => {
  gotoPage(0)
})
</script>

<template>
  <main>
    <h1>Ana Sayfa</h1>
    itemPerPage: {{ itemPerPage }}, pageNo: {{ pageNo }}
    <p>
      <button @click="gotoPage(-1)" :disabled="isFirstPage">←</button>
      <span>Sayfa: {{ pageNo }}</span>
      <button @click="gotoPage(1)">→</button>
      <a href="#" @click="page(3)" :style="{ textDecoration: getStyle(3) }">3</a>
      <a href="#" @click="page(10)" :style="{ textDecoration: getStyle(10) }">10</a>
      <a href="#" @click="page(25)" :style="{ textDecoration: getStyle(25) }">25</a>
      <a href="#" @click="page(50)" :style="{ textDecoration: getStyle(50) }">50</a>
      <a href="#" @click="page(100)" :style="{ textDecoration: getStyle(100) }">100</a>
    </p>

    <testTest :start="pageNo" :count="itemPerPage" />

    <pre>
      {{ items }}
    </pre>
  </main>
</template>

<style scoped>
main button {
  margin-right: 20px;
  display: inline-block;
  width: 50px;
}
main a,
main span {
  margin-right: 20px;
}
</style>
