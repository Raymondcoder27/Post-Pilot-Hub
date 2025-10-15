<template>
  <section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-8">
          <div class="space-y-4">
            <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
              Automate Your Social Media Like a Pro
            </h1>
            <p class="text-xl text-gray-600 leading-relaxed">
              The AI-powered marketing platform built for African businesses. Schedule, analyze, and grow your social presence effortlessly across all major platforms.
            </p>
            <div class="flex flex-wrap gap-2 pt-4">
              <div 
                v-for="(platform, index) in platforms" 
                :key="index" 
                :class="`flex items-center px-3 py-1 rounded-full bg-gray-50 ${platform.color}`"
              >
                <component :is="platform.icon" class="w-5 h-5" />
                <span class="ml-2 text-sm font-medium text-gray-700">{{ platform.name }}</span>
              </div>
            </div>
            <div class="pt-4">
              <p class="text-sm text-gray-500">A product of <span class="font-medium text-gray-700">Harlycon Digital Agency</span></p>
            </div>
          </div>
          <div class="flex flex-col sm:flex-row gap-4">
            <button 
              @click="openPlanSelection"
              class="bg-orange-500 text-white px-8 py-4 rounded-lg hover:bg-orange-600 transition-colors font-semibold text-lg flex items-center justify-center"
            >
              Start Automating Your Posts Today
              <ArrowRight class="ml-2 w-5 h-5" />
            </button>
            <button class="border-2 border-gray-200 text-gray-700 px-8 py-4 rounded-lg hover:border-orange-300 hover:text-orange-600 transition-colors font-semibold text-lg">
              Watch Demo
            </button>
          </div>
          <div class="flex items-center space-x-8 pt-4">
            <div class="text-center">
              <div class="text-3xl font-bold text-orange-500">500+</div>
              <div class="text-gray-600 text-sm">Active Users</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold text-purple-600">98%</div>
              <div class="text-gray-600 text-sm">Satisfaction Rate</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold text-blue-600">4x</div>
              <div class="text-gray-600 text-sm">Time Saved</div>
            </div>
          </div>
        </div>
        <div class="relative">
          <div class="bg-white rounded-2xl p-1 shadow-xl border border-gray-200">
            <div class="bg-white rounded-xl p-6">
              <div class="flex items-center justify-between mb-6">
                <div class="flex space-x-2">
                  <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                </div>
                <div class="text-sm font-medium text-gray-500">Dashboard Preview</div>
              </div>
              <div class="space-y-4">
                <div 
                  v-for="(account, index) in dashboardAccounts" 
                  :key="index" 
                  class="flex items-center space-x-3"
                >
                  <div :class="`w-10 h-10 ${account.bgColor} rounded-lg flex items-center justify-center`">
                    <component :is="account.icon" :class="`w-5 h-5 ${account.textColor}`" />
                  </div>
                  <div class="flex-1">
                    <div class="font-medium">{{ account.name }}</div>
                    <div class="text-sm text-gray-500">{{ account.status }}</div>
                  </div>
                </div>
                <div class="bg-orange-50 rounded-lg p-4 border border-orange-200">
                  <div class="text-sm font-medium text-orange-800 mb-2 flex items-center">
                    <Brain class="w-4 h-4 mr-2" />
                    AI Recommendation
                  </div>
                  <div class="text-sm text-purple-800">Post your new product announcement tomorrow at 2 PM for maximum engagement!</div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                  <div class="bg-gray-50 rounded-lg p-3 text-center">
                    <div class="text-2xl font-bold text-gray-800">24</div>
                    <div class="text-xs text-gray-600">Posts Scheduled</div>
                  </div>
                  <div class="bg-green-50 rounded-lg p-3 text-center border border-green-200">
                    <div class="text-2xl font-bold text-green-800">+42%</div>
                    <div class="text-xs text-green-600">Engagement</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Plan Selection Modal -->
    <div 
      v-if="showPlanSelection" 
      @click.self="showPlanSelection = false"
      class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]"
    >
      <div @click.stop class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto mx-4">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-2xl font-bold text-gray-900">Choose Your Plan</h3>
          <button 
            @click="showPlanSelection = false"
            class="text-gray-500 hover:text-gray-700"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div 
            v-for="plan in pricingPlans" 
            :key="plan.name"
            :class="`border-2 rounded-xl p-6 cursor-pointer transition-all ${
              plan.popular 
                ? 'border-purple-500 bg-purple-50 transform scale-105' 
                : 'border-gray-200 hover:border-orange-300'
            }`"
            @click="selectPlan(plan.name)"
          >
            <div v-if="plan.popular" class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-purple-600 text-white px-4 py-1 rounded-full text-sm font-medium">
              Most Popular
            </div>
            <div class="text-center">
              <h4 class="text-xl font-bold text-gray-900 mb-2">{{ plan.name }}</h4>
              <p class="text-gray-600 mb-4">{{ plan.description }}</p>
              <div class="mb-6">
                <span class="text-3xl font-bold text-gray-900">{{ plan.price }}</span>
                <span class="text-gray-600 ml-2">{{ plan.period }}</span>
              </div>
              <ul class="space-y-3 mb-6 text-left">
                <li v-for="(feature, index) in plan.features" :key="index" class="flex items-center">
                  <Check class="w-4 h-4 text-green-500 mr-2" />
                  <!-- <LayoutDashboard class="w-4 h-4 text-green-500 mr-2" /> -->
                  <span class="text-gray-700">{{ feature }}</span>
                </li>
              </ul>
              <button :class="`w-full py-3 px-6 rounded-lg font-medium transition-colors ${
                plan.popular 
                  ? 'bg-purple-600 text-white hover:bg-purple-700' 
                  : 'bg-orange-500 text-white hover:bg-orange-600'
              }`">
                Get Started
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed } from 'vue'
// import { useRouter } from 'vue-router'
import { useAuthStore } from '../stores/auth'
import Facebook from './icons/Facebook.vue'
import Instagram from './icons/Instagram.vue'
import Linkedin from './icons/Linkedin.vue'
import Twitter from './icons/Twitter.vue'
import Youtube from './icons/Youtube.vue'
import Music from './icons/Music.vue'
import ArrowRight from './icons/ArrowRight.vue'
import Brain from './icons/Brain.vue'
import Check from './icons/Check.vue'
import { Link, usePage } from "@inertiajs/vue3"
import { LayoutDashboard } from 'lucide-vue-next'


const pathname = computed(() => page.url)
const page = usePage()
// const isActive = (href) => pathname.value === href || pathname.value.startsWith(href + '/')

// import {
//     LayoutDashboard,
// } from "lucide-vue-next"

// const router = useRouter()
const authStore = useAuthStore()
const { login } = authStore

const showPlanSelection = ref(false)

const pricingPlans = [
  {
    name: "Starter",
    price: "25,000 UGX",
    period: "per month",
    description: "Perfect for solo entrepreneurs",
    features: [
      "Up to 3 social accounts",
      "50 posts per month",
      "Basic AI insights",
      "Email support"
    ],
    popular: false
  },
  {
    name: "Growth",
    price: "65,000 UGX",
    period: "per month",
    description: "Ideal for growing businesses",
    features: [
      "Up to 10 social accounts",
      "200 posts per month",
      "Advanced AI insights",
      "Team collaboration (3 members)",
      "Priority support"
    ],
    popular: true
  },
  {
    name: "Agency",
    price: "150,000 UGX",
    period: "per month",
    description: "For agencies and large teams",
    features: [
      "Unlimited social accounts",
      "Unlimited posts",
      "Premium AI insights",
      "Team collaboration (10 members)",
      "Client management",
      "24/7 dedicated support"
    ],
    popular: false
  }
]

const openPlanSelection = () => {
  console.log('Opening plan selection modal')
  showPlanSelection.value = true
}



// const navigation = [
//     { name: "Dashboard", href: "/dashboard", icon: LayoutDashboard },
//     { name: "Inventory", href: "/inventory", icon: Calendar },
//     { name: "Bookings", href: "/bookings", icon: Calendar },
//     { name: "Customers", href: "/customers", icon: Users },
//     { name: "My Business", href: "/mybusiness", icon: Settings },
// ]


const selectPlan = (planName) => {
  console.log('Selecting plan:', planName)
  try {
    login(planName)
    console.log('Login successful')
    showPlanSelection.value = false
    console.log('Navigating to dashboard...')
    // router.push('/dashboard')
    router.visit('/dashboard') 
    console.log('Navigation complete')
  } catch (error) {
    console.error('Error selecting plan:', error)
  }
}

const platforms = ref([
  { name: "Facebook", icon: Facebook, color: "text-blue-600" },
  { name: "Instagram", icon: Instagram, color: "text-pink-500" },
  { name: "LinkedIn", icon: Linkedin, color: "text-blue-700" },
  { name: "X", icon: Twitter, color: "text-black" },
  { name: "YouTube", icon: Youtube, color: "text-red-600" },
  { name: "Pinterest", icon: 'div', color: "text-red-500" },
  { name: "TikTok", icon: Music, color: "text-black" }
])

const dashboardAccounts = ref([
  { name: "Facebook Page", status: "Connected", icon: Facebook, bgColor: "bg-blue-100", textColor: "text-blue-600" },
  { name: "Instagram Business", status: "Connected", icon: Instagram, bgColor: "bg-pink-100", textColor: "text-pink-600" },
  { name: "LinkedIn Company", status: "Connected", icon: Linkedin, bgColor: "bg-blue-100", textColor: "text-blue-700" },
  { name: "X (Twitter)", status: "Connected", icon: Twitter, bgColor: "bg-black", textColor: "text-white" },
  { name: "YouTube Channel", status: "Connected", icon: Youtube, bgColor: "bg-red-100", textColor: "text-red-600" },
  { name: "Pinterest", status: "Connected", icon: 'svg', bgColor: "bg-red-100", textColor: "text-red-500" }
])
</script>

