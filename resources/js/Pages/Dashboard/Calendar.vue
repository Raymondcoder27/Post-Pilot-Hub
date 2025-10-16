<!-- src/views/Calendar.vue -->
<template>
  <DashboardLayout>
  <div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-bold text-gray-900">Content Calendar</h1>
      <div class="flex items-center space-x-3">
        <button 
          @click="prevMonth" 
          class="p-2 text-gray-500 hover:text-gray-700 rounded-full hover:bg-gray-100"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <h2 class="text-lg font-semibold text-gray-800">{{ currentMonthYear }}</h2>
        <button 
          @click="nextMonth" 
          class="p-2 text-gray-500 hover:text-gray-700 rounded-full hover:bg-gray-100"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
        <router-link 
          to="/publish" 
          class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors flex items-center space-x-1"
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          <span>New Post</span>
        </router-link>
      </div>
    </div>

    <!-- Calendar Grid -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
      <!-- Week Days -->
      <div class="grid grid-cols-7 bg-gray-50 border-b">
        <div v-for="day in ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']" :key="day" 
             class="py-3 text-center text-sm font-medium text-gray-500">
          {{ day }}
        </div>
      </div>

      <!-- Calendar Days -->
      <div class="grid grid-cols-7">
        <!-- Empty cells for leading days -->
        <div v-for="i in leadingEmptyDays" :key="'empty-' + i" class="h-32 border-r border-b border-gray-100"></div>

        <!-- Day cells -->
        <div 
          v-for="day in daysInMonth" 
          :key="day"
          class="h-32 border-r border-b border-gray-100 p-2 relative"
          :class="{ 'bg-orange-50': isToday(currentYear, currentMonth, day) }"
        >
          <div class="text-sm font-medium text-gray-900">{{ day }}</div>
          <div class="mt-1 space-y-1 max-h-24 overflow-y-auto">
            <div 
              v-for="post in postsByDate[formatDate(currentYear, currentMonth, day)] || []" 
              :key="post.id"
              class="text-xs p-1.5 rounded bg-gray-100 border border-gray-200 truncate"
              :class="{
                'border-blue-300 bg-blue-50': post.status === 'scheduled',
                'border-green-300 bg-green-50': post.status === 'published'
              }"
            >
              <div class="flex items-center space-x-1">
                <span :class="`w-3 h-10 rounded-full ${
                  post.platform === 'facebook' ? 'bg-blue-600' :
                  post.platform === 'instagram' ? 'bg-pink-500' :
                  post.platform === 'twitter' ? 'bg-black' : 'bg-gray-500'
                }`"></span>
                <span>{{ truncate(post.content, 25) }}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Trailing empty cells -->
        <div v-for="i in trailingEmptyDays" :key="'trail-' + i" class="h-32 border-r border-b border-gray-100"></div>
      </div>
    </div>
  </div>
  </DashboardLayout>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useAuthStore } from '../../stores/auth'
import DashboardLayout from '@/Components/dashboard/DashboardLayout.vue'

const authStore = useAuthStore()
const { workspaces } = authStore

// Mock posts (in real app, fetch from API)
const mockPosts = [
  { id: 1, content: 'Welcome to Post Pilot Hub! 🚀', platform: 'facebook', status: 'published', date: '2025-10-05' },
  { id: 2, content: 'AI-powered social media management made easy', platform: 'instagram', status: 'scheduled', date: '2025-10-10' },
  { id: 3, content: 'Automate your posts and save time', platform: 'twitter', status: 'published', date: '2025-10-03' },
  { id: 4, content: 'New feature alert!', platform: 'linkedin', status: 'scheduled', date: '2025-10-15' },
]

// Group posts by date
const postsByDate = computed(() => {
  const grouped = {}
  mockPosts.forEach(post => {
    if (!grouped[post.date]) grouped[post.date] = []
    grouped[post.date].push(post)
  })
  return grouped
})

// Calendar logic
const currentDate = ref(new Date())
const currentYear = computed(() => currentDate.value.getFullYear())
const currentMonth = computed(() => currentDate.value.getMonth()) // 0-indexed

const currentMonthYear = computed(() => {
  return new Date(currentYear.value, currentMonth.value).toLocaleString('default', { month: 'long', year: 'numeric' })
})

const daysInMonth = computed(() => {
  return new Date(currentYear.value, currentMonth.value + 1, 0).getDate()
})

const leadingEmptyDays = computed(() => {
  return new Date(currentYear.value, currentMonth.value, 1).getDay()
})

const trailingEmptyDays = computed(() => {
  const totalCells = 42 // 6 rows x 7 days
  return totalCells - leadingEmptyDays.value - daysInMonth.value
})

const prevMonth = () => {
  currentDate.value = new Date(currentYear.value, currentMonth.value - 1, 1)
}

const nextMonth = () => {
  currentDate.value = new Date(currentYear.value, currentMonth.value + 1, 1)
}

const isToday = (year, month, day) => {
  const today = new Date()
  return today.getFullYear() === year && today.getMonth() === month && today.getDate() === day
}

const formatDate = (year, month, day) => {
  // month is 0-indexed, so add 1
  return `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`
}

const truncate = (str, n) => {
  return str.length > n ? str.substr(0, n - 1) + '…' : str
}
</script>