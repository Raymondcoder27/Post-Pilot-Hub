<template>
  <DashboardLayout>
  <div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Analytics Overview</h1>
        <button class="mt-1 text-gray-500 hover:text-gray-700">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </button>
      </div>
      
      <div class="flex items-center space-x-3">
        <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors flex items-center space-x-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
          <span>Export</span>
        </button>
        <button class="p-2 text-gray-500 hover:text-gray-700">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Account and Date Selection -->
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-between space-x-4">
        <!-- Account Selector -->
        <div class="flex items-center space-x-2">
          <div class="flex items-center space-x-2 bg-white border border-gray-300 rounded-lg px-3 py-2">
            <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center text-white text-xs font-bold">
              HARLYCON
            </div>
            <span class="text-sm font-medium">Harlycon</span>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
          </div>
        </div>

        <!-- Date Range Selector -->
        <div class="flex items-center space-x-2 bg-white border border-gray-300 py-2 px-3 rounded-lg">
          <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <span class="text-sm font-medium">01 Oct, 2025 - 07 Oct, 2025</span>
          <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </div>
      </div>
    </div>

    <!-- Sample Report Toggle -->
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="font-medium text-gray-900">View Sample Report</h3>
          <p class="text-sm text-gray-600 mt-1">Toggle on demo data to view a fully rendered sample of this report.</p>
          <a href="#" class="text-sm text-blue-600 hover:text-blue-800 underline">Dismiss this</a>
        </div>
        <div class="flex items-center space-x-2">
          <span class="text-sm text-gray-600">OFF</span>
          <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
            <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-1"></span>
          </button>
        </div>
      </div>
    </div>

    <!-- Overview Section -->
    <div class="space-y-4">
      <div class="flex items-center space-x-2">
        <h2 class="text-lg font-semibold text-gray-900">Overview</h2>
        <button class="text-gray-500 hover:text-gray-700">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </button>
      </div>

      <!-- Metrics Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Audience Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-3">
              <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-600">Audience</h3>
                <div class="text-2xl font-bold text-gray-900">{{ analyticsData.audience.value }}</div>
              </div>
            </div>
            <div class="text-right">
              <div class="flex items-center space-x-1">
                <span class="text-sm font-medium text-gray-600">{{ analyticsData.audience.change }}%</span>
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17V7H7"/>
                </svg>
              </div>
            </div>
          </div>
          <div class="w-full bg-gray-200 rounded-full h-1">
            <div class="bg-blue-500 h-1 rounded-full" style="width: 45%"></div>
          </div>
        </div>

        <!-- Engagement Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-3">
              <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-600">Engagement</h3>
                <div class="text-2xl font-bold text-gray-900">{{ analyticsData.engagement.value }}</div>
              </div>
            </div>
            <div class="text-right">
              <div class="flex items-center space-x-1">
                <span class="text-sm font-medium text-gray-600">{{ analyticsData.engagement.change }}%</span>
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17V7H7"/>
                </svg>
              </div>
            </div>
          </div>
          <div class="w-full bg-gray-200 rounded-full h-1">
            <div class="bg-blue-500 h-1 rounded-full" style="width: 30%"></div>
          </div>
        </div>

        <!-- Impressions Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-3">
              <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-600">Impressions</h3>
                <div class="text-2xl font-bold text-gray-900">{{ analyticsData.impressions.value }}</div>
              </div>
            </div>
            <div class="text-right">
              <div class="flex items-center space-x-1">
                <span class="text-sm font-medium text-gray-600">{{ analyticsData.impressions.change }}%</span>
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17V7H7"/>
                </svg>
              </div>
            </div>
          </div>
          <div class="w-full bg-gray-200 rounded-full h-1">
            <div class="bg-blue-500 h-1 rounded-full" style="width: 60%"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <!-- Engagement Chart -->
      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Engagement Over Time</h3>
        <div class="h-64 flex items-center justify-center text-gray-500">
          <div class="text-center">
            <svg class="w-16 h-16 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            <p>Chart will appear here</p>
            <p class="text-sm">Connect more accounts to see data</p>
          </div>
        </div>
      </div>

      <!-- Top Posts -->
      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Performing Posts</h3>
        <div class="space-y-4">
          <div v-for="post in topPosts" :key="post.id" class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
            <div class="w-10 h-10 bg-gray-200 rounded flex items-center justify-center">
              <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
            <div class="flex-1">
              <p class="text-sm font-medium text-gray-900">{{ post.title }}</p>
              <p class="text-xs text-gray-500">{{ post.engagement }} engagement</p>
            </div>
            <div class="text-right">
              <div class="text-sm font-medium text-gray-900">{{ post.reach }}</div>
              <div class="text-xs text-gray-500">reach</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Platform Breakdown -->
    <div class="bg-white rounded-lg border border-gray-200 p-6">
      <h3 class="text-lg font-semibold text-gray-900 mb-4">Platform Performance</h3>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div v-for="platform in platformData" :key="platform.name" class="text-center">
          <div :class="`w-16 h-16 mx-auto mb-3 rounded-full flex items-center justify-center ${
            platform.name === 'facebook' ? 'bg-blue-600' :
            platform.name === 'instagram' ? 'bg-pink-500' :
            platform.name === 'twitter' ? 'bg-black' :
            'bg-gray-500'
          }`">
            <span class="text-white text-xl font-bold">
              {{ platform.name === 'facebook' ? 'f' :
                 platform.name === 'instagram' ? 'i' :
                 platform.name === 'twitter' ? 't' : '?' }}
            </span>
          </div>
          <h4 class="font-medium text-gray-900 capitalize">{{ platform.name }}</h4>
          <p class="text-2xl font-bold text-gray-900 mt-1">{{ platform.engagement }}</p>
          <p class="text-sm text-gray-500">engagement</p>
        </div>
      </div>
    </div>
  </div>
  </DashboardLayout>
</template>

<script setup>
import { ref } from 'vue'
import DashboardLayout from '@/Components/dashboard/DashboardLayout.vue'

const analyticsData = ref({
  audience: {
    value: '0',
    change: '0'
  },
  engagement: {
    value: '0',
    change: '0'
  },
  impressions: {
    value: '0',
    change: '0'
  }
})

const topPosts = ref([
  {
    id: 1,
    title: 'Welcome to Post Pilot Hub!',
    engagement: '45',
    reach: '1.2K'
  },
  {
    id: 2,
    title: 'AI-Powered Social Media Management',
    engagement: '32',
    reach: '890'
  },
  {
    id: 3,
    title: 'Automate Your Posts Today',
    engagement: '28',
    reach: '756'
  }
])

const platformData = ref([
  { name: 'facebook', engagement: '0' },
  { name: 'instagram', engagement: '0' },
  { name: 'twitter', engagement: '0' },
  { name: 'linkedin', engagement: '0' }
])
</script>
