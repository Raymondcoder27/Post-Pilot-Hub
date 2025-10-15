<template>
  <div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Manage Accounts</h1>
        <button class="mt-1 text-gray-500 hover:text-gray-700">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Plan Information -->
    <div class="bg-gray-50 rounded-lg p-6">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-lg font-semibold text-gray-900">Current Plan: <span class="capitalize">{{ currentPlan }} Plan</span></h3>
          <p class="text-gray-600 mt-1">
            You have <span class="font-bold">{{ remainingAccounts }}</span> social account{{ remainingAccounts !== 1 ? 's' : '' }} left.
          </p>
        </div>
        <button 
          @click="showUpgradeModal = true"
          class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors"
        >
          Upgrade Plan
        </button>
      </div>
    </div>

    <!-- Add Account Button -->
    <div class="flex justify-end">
      <button 
        @click="showAddAccountModal = true"
        :disabled="!canAddSocialAccount"
        class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-colors disabled:bg-gray-300 disabled:cursor-not-allowed flex items-center space-x-2"
      >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        <span>Add New Social Account</span>
      </button>
    </div>

    <!-- Accounts Section -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Accounts</h3>
        <p class="text-sm text-gray-600 mt-1">A list of all the accounts including their Name, Platform, and status.</p>
        
        <!-- Filters and Search -->
        <div class="flex items-center space-x-4 mt-4">
          <div class="flex items-center space-x-2">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
            </svg>
            <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
              <option>Filter By</option>
              <option>Facebook</option>
              <option>Instagram</option>
              <option>Twitter</option>
              <option>LinkedIn</option>
            </select>
          </div>
          
          <div class="flex items-center space-x-2">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Search Account"
              class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
            />
            <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
          </div>
          
          <div class="flex items-center space-x-1">
            <button class="p-2 bg-orange-500 text-white rounded">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
              </svg>
            </button>
            <button class="p-2 text-gray-400 hover:text-gray-600 rounded">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
      
      <!-- Accounts Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Account Name</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Platform</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Token Expiry</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="account in filteredAccounts" :key="account.id" class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="w-10 h-10 bg-black rounded-full flex items-center justify-center text-white text-xs font-bold">
                    HARLY
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">{{ account.name }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div :class="`w-6 h-6 rounded-full flex items-center justify-center mr-2 ${
                    account.platform === 'facebook' ? 'bg-blue-600' :
                    account.platform === 'instagram' ? 'bg-pink-500' :
                    account.platform === 'twitter' ? 'bg-black' :
                    account.platform === 'linkedin' ? 'bg-blue-700' :
                    'bg-gray-500'
                  }`">
                    <span class="text-white text-xs font-bold">
                      {{ account.platform === 'facebook' ? 'f' :
                         account.platform === 'instagram' ? 'i' :
                         account.platform === 'twitter' ? 't' :
                         account.platform === 'linkedin' ? 'in' : '?' }}
                    </span>
                  </div>
                  <span class="text-sm text-gray-900">
                    {{ account.platform === 'facebook' ? 'Facebook Page' :
                       account.platform === 'instagram' ? 'Instagram Professional' :
                       account.platform === 'twitter' ? 'X (Twitter)' :
                       account.platform === 'linkedin' ? 'LinkedIn Company' :
                       account.platform }}
                  </span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="`inline-flex px-2 py-1 text-xs font-semibold rounded-full ${
                  account.tokenExpiry === 'expired' 
                    ? 'bg-red-100 text-red-800' 
                    : 'bg-green-100 text-green-800'
                }`">
                  {{ account.tokenExpiry === 'expired' ? 'Token Expired' : 'Valid' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex items-center space-x-2">
                  <button class="text-blue-600 hover:text-blue-900" title="Refresh">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                  </button>
                  <button class="text-red-600 hover:text-red-900" title="Delete">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                  </button>
                  <button class="text-gray-600 hover:text-gray-900" title="More options">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Error Messages -->
      <div v-if="hasExpiredTokens" class="bg-red-50 border-l-4 border-red-400 p-4">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-sm text-red-700">
              This social account needs to be re-authenticated.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Account Modal -->
    <div v-if="showAddAccountModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Add Social Account</h3>
        <form @submit.prevent="addAccount">
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Platform</label>
              <select
                v-model="newAccount.platform"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
              >
                <option value="">Select Platform</option>
                <option value="facebook">Facebook</option>
                <option value="instagram">Instagram</option>
                <option value="twitter">X (Twitter)</option>
                <option value="linkedin">LinkedIn</option>
                <option value="youtube">YouTube</option>
                <option value="tiktok">TikTok</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Account Name</label>
              <input
                v-model="newAccount.name"
                type="text"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
              />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Workspace</label>
              <select
                v-model="newAccount.workspaceId"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
              >
                <option value="">Select Workspace</option>
                <option v-for="workspace in workspaces" :key="workspace.id" :value="workspace.id">
                  {{ workspace.name }}
                </option>
              </select>
            </div>
          </div>
          <div class="flex justify-end space-x-3 mt-6">
            <button
              type="button"
              @click="showAddAccountModal = false"
              class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors"
            >
              Cancel
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors"
            >
              Add Account
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Upgrade Modal -->
    <div v-if="showUpgradeModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg p-6 w-full max-w-lg">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Upgrade Your Plan</h3>
        <p class="text-gray-600 mb-6">You've reached your account limit. Upgrade to add more social accounts.</p>
        
        <div class="space-y-4">
          <div 
            v-for="plan in availablePlans" 
            :key="plan.name"
            :class="`border-2 rounded-lg p-4 cursor-pointer transition-colors ${
              plan.name === currentPlan 
                ? 'border-orange-500 bg-orange-50' 
                : 'border-gray-200 hover:border-orange-300'
            }`"
            @click="upgradeToPlan(plan.name)"
          >
            <div class="flex items-center justify-between">
              <div>
                <h4 class="font-semibold text-gray-900 capitalize">{{ plan.name }} Plan</h4>
                <p class="text-sm text-gray-600">{{ plan.description }}</p>
                <p class="text-xs text-gray-500 mt-1">
                  {{ plan.name === 'starter' ? '3 social accounts' :
                     plan.name === 'growth' ? '10 social accounts' :
                     'Unlimited social accounts' }}
                </p>
              </div>
              <div class="text-right">
                <div class="font-bold text-gray-900">{{ plan.price }}</div>
                <div class="text-sm text-gray-600">{{ plan.period }}</div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="flex justify-end mt-6">
          <button
            @click="showUpgradeModal = false"
            class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useAuthStore } from '../../stores/auth'

const authStore = useAuthStore()
const { 
  currentPlan, 
  workspaces, 
  planLimits, 
  canAddSocialAccount, 
  addSocialAccount,
  upgradePlan 
} = authStore

const searchQuery = ref('')
const showAddAccountModal = ref(false)
const showUpgradeModal = ref(false)

const newAccount = ref({
  platform: '',
  name: '',
  workspaceId: ''
})

// Sample accounts data
const accounts = ref([
  {
    id: 1,
    name: 'Harlycon',
    platform: 'facebook',
    tokenExpiry: 'expired'
  }
])

const availablePlans = [
  {
    name: 'starter',
    description: 'Perfect for solo entrepreneurs',
    price: '25,000 UGX',
    period: 'per month'
  },
  {
    name: 'growth',
    description: 'Ideal for growing businesses',
    price: '65,000 UGX',
    period: 'per month'
  },
  {
    name: 'agency',
    description: 'For agencies and large teams',
    price: '150,000 UGX',
    period: 'per month'
  }
]

const totalAccounts = computed(() => {
  return workspaces.reduce((total, workspace) => total + workspace.accounts.length, 0)
})

const remainingAccounts = computed(() => {
  if (planLimits.socialAccounts === -1) return 'unlimited'
  return Math.max(0, planLimits.socialAccounts - totalAccounts.value)
})

const filteredAccounts = computed(() => {
  if (!searchQuery.value) return accounts.value
  return accounts.value.filter(account =>
    account.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    account.platform.toLowerCase().includes(searchQuery.value.toLowerCase())
  )
})

const hasExpiredTokens = computed(() => {
  return accounts.value.some(account => account.tokenExpiry === 'expired')
})

const addAccount = () => {
  try {
    const workspace = workspaces.find(w => w.id === parseInt(newAccount.value.workspaceId))
    if (workspace) {
      addSocialAccount(workspace.id, {
        name: newAccount.value.name,
        platform: newAccount.value.platform,
        status: 'connected',
        tokenExpiry: 'valid'
      })
      
      // Add to local accounts list
      accounts.value.push({
        id: Date.now(),
        name: newAccount.value.name,
        platform: newAccount.value.platform,
        tokenExpiry: 'valid'
      })
    }
    
    // Reset form
    newAccount.value = {
      platform: '',
      name: '',
      workspaceId: ''
    }
    
    showAddAccountModal.value = false
  } catch (error) {
    alert(error.message)
  }
}

const upgradeToPlan = (planName) => {
  upgradePlan(planName)
  showUpgradeModal.value = false
}
</script>
