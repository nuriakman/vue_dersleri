<script setup lang="ts">
import { ref } from 'vue'
import offerEdit from '@/components/offerEdit.vue'
import { useRouter } from 'vue-router'
const $router = useRouter()

const routeId = ref($router.currentRoute.value.params.id)
</script>
<template>
  <h1>Offer Edit #{{ routeId }}</h1>
  <offerEdit :id="routeId" />
</template>
