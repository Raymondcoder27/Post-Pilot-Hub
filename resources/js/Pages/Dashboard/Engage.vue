<!-- src/views/Engage.vue -->
<template>
  <div class="space-y-6">
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-bold text-gray-900">Engagement Insights</h1>
      <div class="flex items-center space-x-2">
        <div class="text-sm text-gray-500">Filter by:</div>
        <select class="border border-gray-300 rounded px-3 py-1 text-sm">
          <option>Last 7 Days</option>
          <option>Last 30 Days</option>
          <option>This Month</option>
        </select>
      </div>
    </div>

    <!-- Engagement Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-sm font-medium text-gray-600">Total Likes</h3>
        <p class="text-2xl font-bold text-gray-900 mt-1">1,248</p>
        <p class="text-sm text-green-600 mt-1">↑ 12% from last week</p>
      </div>
      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-sm font-medium text-gray-600">Comments</h3>
        <p class="text-2xl font-bold text-gray-900 mt-1">342</p>
        <p class="text-sm text-green-600 mt-1">↑ 8% from last week</p>
      </div>
      <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h3 class="text-sm font-medium text-gray-600">Shares/Retweets</h3>
        <p class="text-2xl font-bold text-gray-900 mt-1">89</p>
        <p class="text-sm text-red-600 mt-1">↓ 3% from last week</p>
      </div>
    </div>

    <!-- Post Engagement List -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
      <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold text-gray-900">Recent Post Engagement</h2>
      </div>
      <div class="divide-y divide-gray-100">
        <div v-for="post in engagementPosts" :key="post.id" class="p-6">
          <div class="flex items-start space-x-4">
            <div :class="`w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-bold ${
              post.platform === 'facebook' ? 'bg-blue-600' :
              post.platform === 'instagram' ? 'bg-pink-500' :
              post.platform === 'twitter' ? 'bg-black' :
              'bg-gray-500'
            }`">
              {{ post.platform === 'facebook' ? 'F' :
                 post.platform === 'instagram' ? 'I' :
                 post.platform === 'twitter' ? 'T' : '?' }}
            </div>
            <div class="flex-1">
              <p class="text-sm font-medium text-gray-900">{{ post.content }}</p>
              <p class="text-xs text-gray-500 mt-1">{{ post.date }} • {{ post.platform }}</p>
              <div class="flex space-x-4 mt-3 text-sm">
                <div class="flex items-center space-x-1 text-gray-600">
                  <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                  </svg>
                  <span>{{ post.likes }}</span>
                </div>
                <div class="flex items-center space-x-1 text-gray-600">
                  <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                  </svg>
                  <span>{{ post.comments }}</span>
                </div>
                <div class="flex items-center space-x-1 text-gray-600">
                  <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                  </svg>
                  <span>{{ post.shares }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const engagementPosts = ref([
  {
    id: 1,
    content: 'Welcome to Post Pilot Hub! 🚀',
    platform: 'facebook',
    date: 'Oct 5, 2025',
    likes: 245,
    comments: 32,
    shares: 18
  },
  {
    id: 2,
    content: 'AI-powered social media management made easy',
    platform: 'instagram',
    date: 'Oct 3, 2025',
    likes: 892,
    comments: 124,
    shares: 56
  },
  {
    id: 3,
    content: 'Automate your posts and save time',
    platform: 'twitter',
    date: 'Oct 1, 2025',
    likes: 111,
    comments: 86,
    shares: 15
  }
])
</script>