<!-- src/views/Listening.vue -->
<template>
  <DashboardLayout>
  <div class="space-y-6">
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Social Listening</h1>
        <p class="text-gray-600 mt-1">Track brand mentions, hashtags, and keywords across platforms.</p>
      </div>
      <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
        + Add Keyword
      </button>
    </div>

    <!-- Monitored Keywords -->
    <div class="bg-white rounded-lg border border-gray-200 p-6">
      <h3 class="font-medium text-gray-900 mb-3">Tracked Keywords</h3>
      <div class="flex flex-wrap gap-2">
        <span v-for="kw in trackedKeywords" :key="kw" 
              class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">
          {{ kw }}
          <button class="ml-2 text-gray-500 hover:text-gray-700">×</button>
        </span>
      </div>
    </div>

    <!-- Mentions Feed -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
      <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold text-gray-900">Recent Mentions</h2>
      </div>
      <div class="divide-y divide-gray-100">
        <div v-for="mention in mentions" :key="mention.id" class="p-6">
          <div class="flex items-start space-x-4">
            <img :src="mention.avatar" :alt="mention.author" class="w-10 h-10 rounded-full" />
            <div class="flex-1">
              <div class="flex items-center space-x-2">
                <span class="font-medium text-gray-900">{{ mention.author }}</span>
                <span class="text-gray-500 text-sm">@{{ mention.handle }}</span>
                <span class="text-gray-400">•</span>
                <span class="text-gray-500 text-sm">{{ mention.platform }}</span>
                <span class="text-gray-400">•</span>
                <span class="text-gray-500 text-sm">{{ mention.time }}</span>
              </div>
              <p class="mt-2 text-gray-800">{{ mention.content }}</p>
              <div class="mt-3 flex items-center space-x-4 text-sm text-gray-600">
                <button class="hover:text-blue-600">Reply</button>
                <button class="hover:text-green-600">Save</button>
                <button class="hover:text-red-600">Hide</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sentiment Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white rounded-lg border border-gray-200 p-6 text-center">
        <div class="text-3xl font-bold text-green-600">72%</div>
        <div class="text-gray-600 mt-1">Positive Mentions</div>
      </div>
      <div class="bg-white rounded-lg border border-gray-200 p-6 text-center">
        <div class="text-3xl font-bold text-yellow-500">20%</div>
        <div class="text-gray-600 mt-1">Neutral</div>
      </div>
      <div class="bg-white rounded-lg border border-gray-200 p-6 text-center">
        <div class="text-3xl font-bold text-red-500">8%</div>
        <div class="text-gray-600 mt-1">Negative</div>
      </div>
    </div>
  </div>
  </DashboardLayout>
</template>

<script setup>
import { ref } from 'vue'
import DashboardLayout from '@/Components/dashboard/DashboardLayout.vue'

const trackedKeywords = ref(['PostPilot', '#SocialMedia', 'AI scheduling'])

const mentions = ref([
  {
    id: 1,
    author: 'Sarah Johnson',
    handle: 'sarahj',
    platform: 'twitter',
    time: '2 hours ago',
    content: 'Just discovered @PostPilot — this tool is a game-changer for managing my socials! 🚀 #SocialMedia',
    avatar: 'https://i.pravatar.cc/150?img=1'
  },
  {
    id: 2,
    author: 'Tech Reviews Daily',
    handle: 'techreviewshq',
    platform: 'facebook',
    time: '1 day ago',
    content: 'Looking for the best AI-powered social media schedulers in 2025? PostPilot ranks top 3!',
    avatar: 'https://i.pravatar.cc/150?img=5'
  },
  {
    id: 3,
    author: 'Mark Lee',
    handle: 'marklee_design',
    platform: 'instagram',
    time: '3 days ago',
    content: 'Using PostPilot to schedule all my client posts. Huge time saver! #AIScheduling',
    avatar: 'https://i.pravatar.cc/150?img=8'
  }
])
</script>