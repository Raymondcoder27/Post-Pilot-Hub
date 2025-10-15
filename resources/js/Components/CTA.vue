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

