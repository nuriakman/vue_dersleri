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
          <RouterLink to="/">Ana Sayfa</RouterLink>
        </a>
      </li>
      <li>
        <a href="#" role="button" class="outline">
          <RouterLink to="/offers">Teklifler</RouterLink>
        </a>
      </li>
      <li>
        <a href="#" role="button" class="outline">
          <RouterLink to="/about">Hakkında...</RouterLink>
        </a>
      </li>
      <li>
        <a href="#" role="button" class="outline">
          <RouterLink to="/logout">Oturumu Kapat</RouterLink>
        </a>
      </li>
    </ul>
  </nav>
</template>
