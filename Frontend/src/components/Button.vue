<template>
    <router-link :to="{name: link}">
        <button 
            :class="['btn', `btn-${variant}`, { 'btn-block': block }]" 
            :disabled="disabled" 
        >
            <slot />
        </button>
    </router-link>
</template>

<script setup>
defineProps({
  variant: {
    type: String,
    default: 'primary', // Default to 'primary' variant
  },
  block: {
    type: Boolean,
    default: false, // Default to not a block button
  },
  disabled: {
    type: Boolean,
    default: false, // Default to enabled button
  },
  link:{
    type: String,
  }
});
</script>

<style scoped>
/* Base Button Styles */
.btn {
  display: inline-block;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  border: 1px solid transparent;
  border-radius: 0.25rem;
  cursor: pointer;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
}

/* Variants */
.btn-primary {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn-secondary {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d;
}

.btn-success {
  color: #fff;
  background-color: #28a745;
  border-color: #28a745;
}

.btn-danger {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
}

.btn-warning {
  color: #212529;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-info {
  color: #fff;
  background-color: #17a2b8;
  border-color: #17a2b8;
}

/* Block Button */
.btn-block {
  display: block;
  width: 100%;
}

/* Disabled State */
.btn:disabled {
  opacity: 0.65;
  cursor: not-allowed;
}
</style>
