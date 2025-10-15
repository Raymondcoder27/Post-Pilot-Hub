<!-- <script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template> -->




<template>
<DashboardLayout>
  <div class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-white rounded-lg border border-gray-200 p-6">
      <div class="flex items-center justify-between">
        <div v-if="user">
          <h1 class="text-2xl font-bold text-gray-900">Welcome back, {{ user.name }}!</h1>
          <p class="text-gray-600 mt-1">Here's what's happening with your social media today.</p>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Current Plan</div>
          <div class="text-lg font-semibold text-gray-900 capitalize">{{ currentPlan }} Plan</div>
        </div>
      </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <div class="flex items-center">
          <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="text-sm font-medium text-gray-600">Posts Scheduled</h3>
            <p class="text-2xl font-bold text-gray-900">24</p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg border border-gray-200 p-3">
        <div class="flex items-center">
          <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="text-sm font-medium text-gray-600">Connected Accounts</h3>
            <p class="text-2xl font-bold text-gray-900">{{ totalAccounts }}</p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <div class="flex items-center">
          <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="text-sm font-medium text-gray-600">Total Engagement</h3>
            <p class="text-2xl font-bold text-gray-900">+42%</p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <div class="flex items-center">
          <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="text-sm font-medium text-gray-600">Workspaces</h3>
            <p class="text-2xl font-bold text-gray-900">{{ workspaces.length }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Posts</h3>
        <div class="space-y-4">
          <div v-for="post in recentPosts" :key="post.id" class="flex items-center space-x-3">
            <div :class="`w-8 h-8 rounded-full flex items-center justify-center text-white text-xs ${
              post.platform === 'facebook' ? 'bg-blue-600' :
              post.platform === 'instagram' ? 'bg-pink-500' :
              post.platform === 'twitter' ? 'bg-black' :
              'bg-gray-500'
            }`">
              {{ post.platform === 'facebook' ? 'f' :
                 post.platform === 'instagram' ? 'i' :
                 post.platform === 'twitter' ? 't' : '?' }}
            </div>
            <div class="flex-1">
              <p class="text-sm font-medium text-gray-900">{{ post.content }}</p>
              <p class="text-xs text-gray-500">{{ post.time }} • {{ post.platform }}</p>
            </div>
            <div :class="`text-xs px-2 py-1 rounded-full ${
              post.status === 'published' ? 'bg-green-100 text-green-800' :
              post.status === 'scheduled' ? 'bg-blue-100 text-blue-800' :
              'bg-gray-100 text-gray-800'
            }`">
              {{ post.status }}
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
        <div class="space-y-3">
          <router-link 
            to="/publish" 
            class="flex items-center space-x-3 p-3 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors"
          >
            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            <span class="text-sm font-medium text-gray-900">Create New Post</span>
          </router-link>
          
          <router-link 
            to="/accounts" 
            class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors"
          >
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <span class="text-sm font-medium text-gray-900">Manage Accounts</span>
          </router-link>
          
          <router-link 
            to="/analytics" 
            class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors"
          >
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            <span class="text-sm font-medium text-gray-900">View Analytics</span>
          </router-link>
          
          <router-link 
            to="/workspace" 
            class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors"
          >
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span class="text-sm font-medium text-gray-900">Manage Workspaces</span>
          </router-link>
        </div>
      </div>
    </div>

    <!-- Plan Upgrade CTA -->
    <div v-if="currentPlan !== 'agency'" class="bg-gradient-to-r from-orange-500 to-purple-600 rounded-lg p-6 text-white">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-lg font-semibold mb-2">Ready to unlock more features?</h3>
          <p class="text-orange-100">Upgrade your plan to get access to advanced analytics, team collaboration, and more.</p>
        </div>
        <button class="bg-white text-orange-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
          Upgrade Now
        </button>
      </div>
    </div>
  </div>
</DashboardLayout>
</template>

<script setup>
import { computed, ref } from 'vue'
import { useAuthStore } from '../stores/auth'
import DashboardLayout from '../Components/dashboard/DashboardLayout.vue'

const authStore = useAuthStore()
const { user, currentPlan, workspaces } = authStore

const totalAccounts = computed(() => {
  return workspaces.reduce((total, workspace) => total + workspace.accounts.length, 0)
})

const recentPosts = ref([
  {
    id: 1,
    content: 'Welcome to Post Pilot Hub! 🚀',
    platform: 'facebook',
    status: 'published',
    time: '2 hours ago'
  },
  {
    id: 2,
    content: 'AI-powered social media management made easy',
    platform: 'instagram',
    status: 'scheduled',
    time: 'Tomorrow 2:00 PM'
  },
  {
    id: 3,
    content: 'Automate your posts and save time',
    platform: 'twitter',
    status: 'published',
    time: '5 hours ago'
  }
])
</script>
