<script setup lang="ts">
const projectName = import.meta.env.VITE_PROJECT_NAME || 'Teklif'
</script>

<template>
  <nav>
    <ul>
      <li>
        <strong>{{ projectName }}</strong>
      </li>
    </ul>
    <ul>
      <li>
        <a href="#" role="button" class="outline">
          <RouterLink to="/test">Test</RouterLink>
        </a>
      </li>
      <li>
        <a href="#" role="button" class="outline">
          <RouterLink to="/login">Giriş Yap</RouterLink>
        </a>
      </li>
    </ul>
  </nav>
</template>
