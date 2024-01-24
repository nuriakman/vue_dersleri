<script setup lang="ts">
import level1NavBar from '@/components/level1NavBar.vue'
import level2NavBar from '@/components/level2NavBar.vue'

import { useGlobalStore } from '@/stores/store'
const globalStore = useGlobalStore()
</script>

<template>
  <template v-if="!globalStore.user.isLoggedIn">
    <level1NavBar />
  </template>

  <template v-if="globalStore.user.isLoggedIn">
    <level2NavBar />
  </template>
</template>
