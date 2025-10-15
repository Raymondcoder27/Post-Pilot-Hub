<template>
  <section id="features" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Powerful Features Built for African Businesses</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Everything you need to manage your social media presence efficiently and effectively.
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div 
          v-for="(feature, index) in features" 
          :key="index" 
          class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-200"
        >
          <div :class="`${feature.color} mb-4`">
            <component :is="feature.icon" class="w-8 h-8" />
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">{{ feature.title }}</h3>
          <p class="text-gray-600">{{ feature.description }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import Calendar from './icons/Calendar.vue'
import Brain from './icons/Brain.vue'
import Users from './icons/Users.vue'
import BarChart3 from './icons/BarChart3.vue'

const features = ref([
  {
    icon: Calendar,
    title: "Smart Scheduling",
    description: "Schedule posts across all platforms with AI-powered optimal timing suggestions.",
    color: "text-orange-500"
  },
  {
    icon: Brain,
    title: "AI Insights",
    description: "Get actionable insights on what content performs best and when to post.",
    color: "text-purple-600"
  },
  {
    icon: Users,
    title: "Team Collaboration",
    description: "Manage multiple clients and team members from one unified dashboard.",
    color: "text-blue-600"
  },
  {
    icon: BarChart3,
    title: "Performance Reports",
    description: "Track engagement, reach, and ROI with comprehensive analytics.",
    color: "text-blue-600"
  }
])
</script>

