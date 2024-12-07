<script setup lang="ts">
 import Navbar from '../components/Navbar.vue';
</script>

<template>
  <div>
    <Navbar></Navbar>
    <main>
      <router-view /> <!-- Dynamically renders the current route's view -->
    </main>
  </div>
</template>

<script setup>
</script>

<style scoped>
header {
  background-color: #333;
  color: white;
  padding: 10px 0;
  text-align: center;
}

nav ul {
  list-style: none;
  display: flex;
  justify-content: center;
  gap: 1rem;
}

footer {
  text-align: center;
  padding: 10px;
  background-color: #333;
  color: white;
  position: fixed;
  bottom: 0;
  width: 100%;
}

main {
  padding: 20px;
}
</style>
