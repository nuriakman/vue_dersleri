<script setup lang="ts">
import testTest from '@/components/testTest.vue'
</script>

<template>
  <template v-for="item in 10" :key="item">
    <testTest :start="(item - 1) * 3" :count="3" />
  </template>
</template>
