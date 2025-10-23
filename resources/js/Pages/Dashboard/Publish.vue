<template>
  <DashboardLayout>
    <div class="space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Publish Content</h1>
          <button class="mt-1 text-gray-500 hover:text-gray-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </button>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content Area -->
        <div class="lg:col-span-2 space-y-6">
          <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">New Post</h2>

            <!-- Account Selection -->
            <!-- <div class="mb-6">
              <button @click="connectFacebook"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Connect Facebook / Instagram
              </button>


              <label class="block text-sm font-medium text-gray-700 mb-2">Select Accounts</label>
              <div class="flex flex-wrap gap-2 mb-3">
                <div v-for="(account, index) in selectedAccounts" :key="index"
                  class="flex items-center space-x-2 bg-gray-100 rounded-full px-3 py-1">
                  <div :class="`w-6 h-6 rounded-full flex items-center justify-center text-white text-xs ${account.platform === 'facebook' ? 'bg-blue-600' :
                      account.platform === 'instagram' ? 'bg-pink-500' :
                        account.platform === 'twitter' ? 'bg-black' :
                          'bg-gray-500'
                    }`">
                    {{ account.platform === 'facebook' ? 'f' :
                      account.platform === 'instagram' ? 'i' :
                        account.platform === 'twitter' ? 't' : '?' }}
                  </div>
                  <span class="text-sm">{{ account.name }}</span>
                  <button @click="removeAccount(index)" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="flex items-center space-x-4">
                <select v-model="newAccountSelection" @change="addAccountToSelection"
                  class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                  <option value="">Add Account</option>
                  <option v-for="account in availableAccounts" :key="account.id" :value="account.id">
                    {{ account.name }} ({{ account.platform }})
                  </option>
                </select>
                <button class="text-sm text-gray-600 hover:text-gray-800">Quick Select</button>
                <button class="text-sm text-gray-600 hover:text-gray-800">Clear</button>
              </div>
            </div> -->

            <!-- Account Selection -->
<div class="mb-6">
  <h3 class="text-lg font-semibold mb-3">Connected Accounts</h3>

  <!-- Connect Buttons -->
  <div class="flex flex-wrap gap-3 mb-4">
    <button @click="connectFacebook" class="flex items-center bg-blue-100 text-black px-3 py-2 rounded-lg hover:bg-blue-700 hover:text-white">
      <Icon icon="logos:facebook" class="w-5 h-5 text-red-500 mr-2" />
       Facebook 
    </button>
    <button @click="connectFacebook" class="flex items-center bg-pink-100 text-black px-3 py-2 rounded-lg hover:bg-pink-700 hover:text-white">
      <Icon icon="skill-icons:instagram" class="w-5 h-5 text-red-500 mr-2" />
      Instagram
    </button>
    <button @click="connectLinkedIn" class="flex items-center bg-blue-100 text-black px-3 py-2 rounded-lg hover:bg-blue-600 hover:text-white">
      <Icon icon="logos:linkedin-icon" class="w-5 h-5 text-blue-500 mr-2" />
      <!-- <span class="mr-2">in</span>  -->
      LinkedIn
    </button>
    <button @click="connectTikTok" class="flex items-center bg-gray-100 text-black px-3 py-2 rounded-lg hover:bg-gray-800 hover:text-white">
       <Icon icon="logos:tiktok-icon" class="w-5 h-5 mr-2" />
       TikTok
    </button>
    <button @click="connectYouTube" class="flex items-center bg-red-100 text-black px-3 py-2 rounded-lg hover:bg-red-700 hover:text-white">
      <!-- <span class="mr-2">▶</span>  -->
      <Icon icon="logos:youtube-icon" class="w-5 h-5 mr-2" />
      YouTube
    </button>
    <button @click="connectThreads" class="flex items-center bg-gray-100 text-black px-3 py-2 rounded-lg hover:bg-gray-900 hover:text-white">
      <!-- <span class="mr-2">@</span>  -->
       <Icon icon="logos:threads" class="w-5 h-5 mr-2" />
      Threads
    </button>
  </div>

  <!-- Dropdown for Selecting Connected Accounts -->
  <label class="block text-sm font-medium text-gray-700 mb-2">Select Connected Accounts</label>
  <select v-model="newAccountSelection" @change="addAccountToSelection"
    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
    <option value="">Choose account...</option>
    <option v-for="account in availableAccounts" :key="account.id" :value="account.id">
      {{ account.name }} ({{ account.platform }})
    </option>
  </select>

  <!-- Display Selected Accounts -->
  <div class="flex flex-wrap gap-2 mt-3">
    <!-- <div v-for="(account, index) in selectedAccounts" :key="index"
      class="flex items-center bg-gray-100 rounded-full px-3 py-1">
      <div :class="`w-6 h-6 rounded-full flex items-center justify-center text-white text-xs
        ${account.platform === 'facebook' ? 'bg-blue-600' :
          account.platform === 'instagram' ? 'bg-pink-500' :
          account.platform === 'linkedin' ? 'bg-blue-500' :
          account.platform === 'tiktok' ? 'bg-black' :
          account.platform === 'youtube' ? 'bg-red-600' :
          account.platform === 'threads' ? 'bg-gray-700' : 'bg-gray-400'}`">
        {{ account.platform.charAt(0).toUpperCase() }}
      </div>
      <span class="ml-2 text-sm">{{ account.name }}</span>
      <button @click="removeAccount(index)" class="ml-2 text-gray-500 hover:text-gray-700">
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div> -->
    <div v-for="(account, index) in selectedAccounts" :key="index"
  class="flex items-center bg-gray-100 rounded-full px-3 py-1">
  <Icon :icon="account.icon" :class="`${account.color} w-5 h-5`" />
  <span class="ml-2 text-sm">{{ account.name }}</span>
  <button @click="removeAccount(index)" class="ml-2 text-gray-500 hover:text-gray-700">
    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </button>
</div>

  </div>
</div>


            <!-- Content Input -->
            <div class="mb-6">
              <label class="block text-sm font-medium text-gray-700 mb-2">What's on your mind?</label>
              <textarea v-model="postContent" placeholder="What's on your mind? Let the world know your story." rows="6"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent resize-none"></textarea>

              <!-- AI Content Wizard -->
              <div class="mt-3">
                <button
                  class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition-colors flex items-center space-x-2">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                  <span>Use AI Content Wizard</span>
                </button>
              </div>
            </div>

            <!-- Content Tools -->
            <div class="mb-6">
              <div class="flex items-center space-x-4">
                <button class="p-2 text-gray-500 hover:text-gray-700" title="Emoji">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h8m2-10H5a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2z" />
                  </svg>
                </button>
                <button class="p-2 text-gray-500 hover:text-gray-700" title="Image/Video">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </button>
                <button class="p-2 text-gray-500 hover:text-gray-700" title="Hashtag">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                  </svg>
                </button>
                <button class="p-2 text-gray-500 hover:text-gray-700" title="Document">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                </button>
                <button class="p-2 text-gray-500 hover:text-gray-700" title="Schedule">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </button>
                <button class="p-2 text-gray-500 hover:text-gray-700" title="Location">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  </svg>
                </button>
                <button class="p-2 text-gray-500 hover:text-gray-700" title="Campaign">
                  <span class="text-lg font-bold">C</span>
                </button>
                <button class="p-2 text-gray-500 hover:text-gray-700" title="AI Assistant">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                  </svg>
                </button>
                <button class="p-2 text-gray-500 hover:text-gray-700" title="Delete">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
                <div class="text-sm text-gray-500">10000</div>
                <button class="p-2 text-purple-500 hover:text-purple-700" title="AI Magic">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                </button>
              </div>
            </div>

            <!-- Post Settings -->
            <div class="mb-6 space-y-4">
              <div class="flex items-center">
                <input v-model="repeatPost" type="checkbox"
                  class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded" />
                <label class="ml-2 text-sm text-gray-700">I want to repeat my post</label>
              </div>

              <div class="text-sm text-gray-600">
                Total Accounts selected ({{ selectedAccounts.length }})
              </div>

              <div class="flex items-center space-x-4">
                <label class="text-sm font-medium text-gray-700">When to post</label>
                <select v-model="postSchedule"
                  class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                  <option value="now">Post Now</option>
                  <option value="schedule">Schedule</option>
                  <option value="save_draft">Save as Draft</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <!-- Preview Panel -->
        <div class="lg:col-span-1">
          <div class="bg-white rounded-lg border border-gray-200 p-6 sticky top-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-lg font-semibold text-gray-900">Preview</h3>
              <div class="flex space-x-2">
                <button v-for="platform in ['facebook', 'instagram', 'twitter']" :key="platform" :class="`p-2 rounded ${selectedPreview === platform
                    ? 'bg-orange-500 text-white'
                    : 'text-gray-500 hover:text-gray-700'
                  }`" @click="selectedPreview = platform">
                  <div :class="`w-5 h-5 rounded-full flex items-center justify-center text-white text-xs ${platform === 'facebook' ? 'bg-blue-600' :
                      platform === 'instagram' ? 'bg-pink-500' :
                        'bg-black'
                    }`">
                    {{ platform === 'facebook' ? 'f' :
                      platform === 'instagram' ? 'i' : 't' }}
                  </div>
                </button>
              </div>
            </div>

            <!-- Platform Preview -->
            <div class="border border-gray-200 rounded-lg p-4 mb-4">
              <div class="flex items-center space-x-3 mb-3">
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                  <span class="text-sm font-medium">H</span>
                </div>
                <div>
                  <div class="font-medium text-gray-900">Harlycon</div>
                  <div class="text-sm text-gray-500">Just now</div>
                </div>
              </div>
              <div class="text-gray-900">
                {{ postContent || 'Your post content will appear here...' }}
              </div>
            </div>

            <!-- Platform Warning -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 mb-4">
              <p class="text-sm text-yellow-800">
                Social media platforms often update their formatting, which may cause your posts to appear slightly
                different once published.
              </p>
              <a href="#" class="text-sm text-yellow-700 hover:text-yellow-900 underline">Learn more</a>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
              <button
                class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Save Draft</span>
                <select class="ml-2 text-sm">
                  <option>Only Me</option>
                  <option>Team</option>
                </select>
              </button>

              <button
                class="w-full bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                Post Now
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useAuthStore } from '../../stores/auth'
import DashboardLayout from '@/Components/dashboard/DashboardLayout.vue'
import { Icon } from '@iconify/vue'

const authStore = useAuthStore()
const { workspaces } = authStore


const platforms = ref([
  { id: 'facebook', name: "Facebook", icon: "logos:facebook", color: "text-blue-600" },
  {  id: 'instagram',name: "Instagram", icon: "skill-icons:instagram", color: "text-pink-500" },
  {  id: 'linkedin',name: "LinkedIn", icon: "logos:linkedin-icon", color: "text-blue-700" },
  { id: 'twitter',name: "X", icon: "logos:x", color: "text-black" },
  { id: 'youtube', name: "YouTube", icon: "logos:youtube-icon", color: "text-red-600" },
  { id: 'pinterest', name: "Pinterest", icon: "logos:pinterest", color: "text-red-500" },
  { id: 'tiktok', name: "TikTok", icon: "logos:tiktok-icon", color: "text-black" }
])

const facebookIcon = "logos:facebook"

// onMounted(async () => {
//   const res = await fetch('/api/connected-accounts', { credentials: 'include' })
//   const data = await res.json()
//   availableAccounts.value = data
// })


onMounted(async () => {
  const res = await fetch('/api/connected-accounts', { credentials: 'include' })
  const data = await res.json()

  // Merge connected accounts with their platform details (icons, colors)
  availableAccounts.value = data.map(acc => {
    const platformMeta = platforms.value.find(p => p.id === acc.platform)
    return {
      ...acc,
      icon: platformMeta?.icon || 'mdi:account',
      color: platformMeta?.color || 'text-gray-500',
      name: acc.account_name || acc.platform
    }
  })
})





const connectFacebook = () => {
  window.location.href = '/api/auth/facebook';
}
// const connectFacebook = () => window.location.href = '/api/auth/facebook';
const connectLinkedIn = () => window.location.href = '/api/auth/linkedin';
// const connectTikTok = () => window.location.href = '/api/auth/tiktok';
const connectYouTube = () => window.location.href = '/api/auth/youtube';
const connectThreads = () => window.location.href = '/api/auth/threads';

const connectTikTok = () => {
  window.location.href = '/auth/tiktok';
}


const postContent = ref('')
const selectedAccounts = ref([])
const newAccountSelection = ref('')
const repeatPost = ref(true)
const postSchedule = ref('now')
const selectedPreview = ref('facebook')

const availableAccounts = computed(() => {
  const accounts = []
  workspaces.forEach(workspace => {
    workspace.accounts.forEach(account => {
      accounts.push({
        id: `${workspace.id}-${account.id}`,
        name: account.name,
        platform: account.platform,
        workspaceName: workspace.name
      })
    })
  })
  return accounts
})

const addAccountToSelection = () => {
  if (newAccountSelection.value) {
    const account = availableAccounts.value.find(acc => acc.id === newAccountSelection.value)
    if (account && !selectedAccounts.value.find(sel => sel.id === account.id)) {
      selectedAccounts.value.push(account)
    }
    newAccountSelection.value = ''
  }
}

const removeAccount = (index) => {
  selectedAccounts.value.splice(index, 1)
}
</script>
