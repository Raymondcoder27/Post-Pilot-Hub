<template>
  <section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
        <p class="text-xl text-gray-600">
          Everything you need to know about getting started with Post Pilot Hub.
        </p>
      </div>
      <div class="space-y-4">
        <div 
          v-for="(faq, index) in faqs" 
          :key="index" 
          class="bg-white rounded-lg shadow-sm border border-gray-200"
        >
          <button
            class="w-full text-left p-6 flex justify-between items-center"
            @click="toggleFaq(index)"
          >
            <h3 class="text-lg font-medium text-gray-900">{{ faq.question }}</h3>
            <ChevronDown 
              :class="`w-5 h-5 text-gray-500 transition-transform ${
                activeFaq === index ? 'transform rotate-180' : ''
              }`" 
            />
          </button>
          <div v-if="activeFaq === index" class="px-6 pb-6 text-gray-600 border-t border-gray-200 pt-4">
            {{ faq.answer }}
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import ChevronDown from './icons/ChevronDown.vue'
import { useAppStore } from '../stores/app'

const store = useAppStore()
const { activeFaq, toggleFaq } = store

const faqs = ref([
  {
    question: "What social media platforms do you support?",
    answer: "We support Facebook, Instagram, LinkedIn, X (Twitter), YouTube, Pinterest, and TikTok. We're constantly adding more platforms based on user feedback."
  },
  {
    question: "How does payment work in Uganda?",
    answer: "We accept payments in UGX through mobile money (MTN, Airtel), bank transfer, and major credit cards. Annual plans save you 20%."
  },
  {
    question: "How long does setup take?",
    answer: "You can be up and running in under 10 minutes! Just connect your social accounts, and you're ready to start scheduling posts."
  },
  {
    question: "Is there a free trial?",
    answer: "Yes! We offer a 14-day free trial with full access to all features. No credit card required to get started."
  }
])
</script>

