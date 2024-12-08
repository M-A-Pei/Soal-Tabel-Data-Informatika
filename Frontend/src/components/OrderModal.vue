<template>
  <div v-if="visible" class="modal-overlay" @click.self="close">
    <div class="modal">
      <header class="modal-header">
        <h3>{{ title }}</h3>
        <button class="close-btn" @click="close">×</button>
      </header>
      <div class="modal-body">
        <slot></slot>
      </div>
      <footer class="modal-footer">
        <slot name="footer">
          
        </slot>
      </footer>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
  title: {
    type: String,
    default: 'Modal Title',
  },
  visible: {
    type: Boolean,
    default: false,
  },
});

const emit = defineEmits(['close']);

function close() {
  emit('close');
}
</script>

<style scoped>
/* Modal overlay */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

/* Modal container */
.modal {
  background: white;
  border-radius: 8px;
  width: 500px;
  max-width: 90%;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

/* Header */
.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
  border-bottom: 1px solid #ddd;
}

/* Body */
.modal-body {
  padding: 1rem;
}

/* Footer */
.modal-footer {
  padding: 1rem;
  border-top: 1px solid #ddd;
  text-align: right;
}

/* Close button */
.close-btn {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
}

/* Button styling */
.btn {
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-primary {
  background-color: #007bff;
  color: white;
}

.btn-primary:hover {
  background-color: #0056b3;
}
</style>
