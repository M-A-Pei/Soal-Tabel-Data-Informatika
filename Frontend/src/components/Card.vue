<template>
  <div class="card">
    <div class="card-header" v-if="title">
      {{ title }}
    </div>
    <div class="card-body">
      <slot />
    </div>
    <div class="card-footer">
      <slot name="footer">

      </slot>
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: {
    type: String,
    default: null,
  }
});
</script>

<style scoped>
.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  width: 300px;
  margin: auto;
  margin-bottom: 10px;
}

.card-header {
  background-color: #f8f9fa;
  padding: 1rem;
  font-size: 1.25rem;
  font-weight: bold;
  border-bottom: 1px solid #ddd;
}

.card-body {
  padding: 1rem;
  font-size: 1rem;
  color: #333;
}

.card-footer {
  background-color: #f8f9fa;
  padding: 0.75rem;
  text-align: right;
  border-top: 1px solid #ddd;
}
</style>
