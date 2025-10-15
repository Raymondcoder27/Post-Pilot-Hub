<template>
  <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Get started in just 3 simple steps and start automating your social media today.
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div 
          v-for="(step, index) in steps" 
          :key="index" 
          class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow text-center border border-gray-200"
        >
          <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-50 rounded-full mb-6">
            <component :is="step.icon" class="w-12 h-12" :class="step.color" />
          </div>
          <div class="text-3xl font-bold text-orange-500 mb-2">{{ step.number }}</div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ step.title }}</h3>
          <p class="text-gray-600">{{ step.description }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import Shield from './icons/Shield.vue'
import Clock from './icons/Clock.vue'
import TrendingUp from './icons/TrendingUp.vue'

const steps = ref([
  { 
    number: 1, 
    title: "Connect", 
    icon: Shield, 
    color: "text-orange-500", 
    description: "Securely connect your social media accounts in minutes." 
  },
  { 
    number: 2, 
    title: "Create", 
    icon: Clock, 
    color: "text-purple-600", 
    description: "Create posts with our intuitive editor or let AI generate content for you." 
  },
  { 
    number: 3, 
    title: "Automate", 
    icon: TrendingUp, 
    color: "text-blue-600", 
    description: "Schedule posts and let our AI optimize timing for maximum reach." 
  }
])
</script>

