import { defineStore } from 'pinia'
import { ref } from 'vue'

// const defineStore = ""


export const useAppStore = defineStore('app', () => {
  // State
  const email = ref('')
  const activeFaq = ref(null)

  // Actions
  const setEmail = (value) => {
    email.value = value
  }

  const clearEmail = () => {
    email.value = ''
  }

  const toggleFaq = (index) => {
    activeFaq.value = activeFaq.value === index ? null : index
  }

  const handleEmailSubmit = (e) => {
    e.preventDefault()
    alert('Thanks for joining the waitlist! We\'ll be in touch soon.')
    clearEmail()
  }

  return {
    // State
    email,
    activeFaq,
    // Actions
    setEmail,
    clearEmail,
    toggleFaq,
    handleEmailSubmit
  }
})

