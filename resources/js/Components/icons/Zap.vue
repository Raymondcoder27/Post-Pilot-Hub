<template>
  <svg 
    :class="className" 
    fill="none" 
    stroke="currentColor" 
    viewBox="0 0 24 24" 
    xmlns="http://www.w3.org/2000/svg"
  >
    <path 
      stroke-linecap="round" 
      stroke-linejoin="round" 
      stroke-width="2" 
      d="M13 10V3L4 14h7v7l9-11h-7z"
    />
  </svg>
</template>

<script setup>
defineProps({
  className: {
    type: String,
    default: 'w-6 h-6'
  }
})
</script>

