<!-- <template>
  <section class="py-20 bg-white border-t border-b border-gray-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-4xl font-bold text-gray-900 mb-6">
        Ready to Transform Your Social Media?
      </h2>
      <p class="text-xl text-gray-600 mb-8">
        Join the waitlist and be among the first to experience the future of African social media management.
      </p>
      <form @submit="handleEmailSubmit" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
        <input
          type="email"
          :value="email"
          @input="setEmail($event.target.value)"
          placeholder="Enter your email address"
          class="flex-1 px-4 py-3 rounded-lg text-gray-900 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-300 focus:border-transparent"
          required
        />
        <button
          type="submit"
          class="bg-orange-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors whitespace-nowrap"
        >
          Join Waitlist
        </button>
      </form>
      <p class="text-gray-500 text-sm mt-4">
        No spam. Unsubscribe anytime. 14-day free trial included.
      </p>
    </div>
  </section>
</template>

<script setup>
import { useAppStore } from '../stores/app'

const store = useAppStore()
const { email, setEmail, handleEmailSubmit } = store
</script>
 -->



 <script setup>
import { ref } from 'vue'
import axios from 'axios'

// Local reactive state
const email = ref('')
const successMessage = ref('')
const errorMessage = ref('')

// Handle form submission
const handleEmailSubmit = async (e) => {
  e.preventDefault()
  successMessage.value = ''
  errorMessage.value = ''

  try {
    const res = await axios.post('/api/waitlist', { email: email.value })
    successMessage.value = res.data.message
    email.value = '' // clear input
  } catch (err) {
    if (err.response?.data?.errors?.email) {
      errorMessage.value = err.response.data.errors.email[0]
    } else {
      errorMessage.value = 'Something went wrong. Please try again.'
    }
  }
}
</script>

<template>
  <section class="py-20 bg-white border-t border-b border-gray-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-4xl font-bold text-gray-900 mb-6">
        Ready to Transform Your Social Media?
      </h2>
      <p class="text-xl text-gray-600 mb-8">
        Join the waitlist and be among the first to experience the future of African social media management.
      </p>

      <form @submit="handleEmailSubmit" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
        <input
          type="email"
          v-model="email"
          placeholder="Enter your email address"
          class="flex-1 px-4 py-3 rounded-lg text-gray-900 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-300 focus:border-transparent"
          required
        />
        <button
          type="submit"
          class="bg-orange-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors whitespace-nowrap"
        >
          Join Waitlist
        </button>
      </form>

      <p v-if="successMessage" class="text-green-600 mt-4">{{ successMessage }}</p>
      <p v-if="errorMessage" class="text-red-600 mt-4">{{ errorMessage }}</p>

      <p class="text-gray-500 text-sm mt-4">
        No spam. Unsubscribe anytime. 14-day free trial included.
      </p>
    </div>
  </section>
</template>
