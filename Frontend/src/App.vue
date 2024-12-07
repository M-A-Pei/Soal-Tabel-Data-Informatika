<script setup lang="ts">

</script>

<template>
  <BNavbar>


    <!-- Navbar items (links) -->
    <template #default>
      <BNavItem href="#">Home</BNavItem>
      <BNavItem href="#">About</BNavItem>
      <BNavItem href="#">Services</BNavItem>
      <BNavItem href="#">Contact</BNavItem>
    </template>
  </BNavbar>

  <main>
    <!-- Your main content here -->
  </main>
</template>

<script setup lang="ts">
  // No need to import components if they are globally registered
</script>

<style scoped>
/* Optional: Add custom styling for your navbar */
</style>


<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
