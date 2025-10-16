<template>
  <DashboardLayout>
  <div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Workspace</h1>
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
            You have <span class="font-bold">{{ planLimits.workspaces === -1 ? 'unlimited' : (planLimits.workspaces - workspaces.length) }}</span> 
            {{ planLimits.workspaces === -1 ? '' : 'workspaces' }} left.
          </p>
        </div>
        <button 
          @click="showUpgradeModal = true"
          class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors"
        >
          Upgrade Plan
        </button>
      </div>
    </div>

    <!-- Actions -->
    <div class="flex items-center justify-between">
      <div class="flex space-x-4">
        <button 
          v-if="hasFeature('team_collaboration') || hasFeature('client_management')"
          class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors"
        >
          Manage Team
        </button>
        <button 
          @click="showCreateWorkspaceModal = true"
          :disabled="!canAddWorkspace"
          class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors disabled:bg-gray-300 disabled:cursor-not-allowed flex items-center space-x-2"
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          </svg>
          <span>Create New +</span>
        </button>
      </div>
      <div class="flex items-center space-x-2">
        <div class="relative">
          <input
            v-model="searchQuery"
            type="text"
            placeholder="Search Workspaces"
            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
          />
          <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </div>
      </div>
    </div>

    <!-- Workspaces Table -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Workspaces</h3>
        <p class="text-sm text-gray-600 mt-1">A list of all your workspaces including their details and settings.</p>
      </div>
      
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Workspace</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accounts</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Team</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timezone</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created By</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Post Approval</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="workspace in filteredWorkspaces" :key="workspace.id" class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-medium">
                    {{ workspace.avatar }}
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">{{ workspace.name }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex -space-x-2">
                  <div 
                    v-for="(account, index) in workspace.accounts.slice(0, 3)" 
                    :key="index"
                    :class="`w-8 h-8 rounded-full border-2 border-white flex items-center justify-center text-xs font-medium ${
                      account.platform === 'facebook' ? 'bg-blue-600' :
                      account.platform === 'instagram' ? 'bg-pink-500' :
                      account.platform === 'twitter' ? 'bg-black' :
                      'bg-gray-500'
                    }`"
                  >
                    <span class="text-white">
                      {{ account.platform === 'facebook' ? 'f' :
                         account.platform === 'instagram' ? 'i' :
                         account.platform === 'twitter' ? 't' : '?' }}
                    </span>
                  </div>
                  <div v-if="workspace.accounts.length > 3" class="w-8 h-8 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-xs font-medium text-gray-600">
                    +{{ workspace.accounts.length - 3 }}
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ workspace.teamMembers.length > 0 ? `${workspace.teamMembers.length} member${workspace.teamMembers.length > 1 ? 's' : ''}` : 'No Team Member' }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ workspace.timezone }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ workspace.createdBy }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="`inline-flex px-2 py-1 text-xs font-semibold rounded-full ${
                  workspace.postApproval === 'enabled' 
                    ? 'bg-green-100 text-green-800' 
                    : 'bg-gray-100 text-gray-800'
                }`">
                  {{ workspace.postApproval === 'enabled' ? 'Enabled' : 'Disabled' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-2">
                  <button class="text-orange-600 hover:text-orange-900">Edit</button>
                  <button class="text-gray-600 hover:text-gray-900">Settings</button>
                  <button class="text-red-600 hover:text-red-900">Delete</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Create Workspace Modal -->
    <div v-if="showCreateWorkspaceModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Create New Workspace</h3>
        <form @submit.prevent="createWorkspace">
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Workspace Name</label>
              <input
                v-model="newWorkspace.name"
                type="text"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
              />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Timezone</label>
              <select
                v-model="newWorkspace.timezone"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
              >
                <option value="UTC+03:00">UTC+03:00 (East Africa Time)</option>
                <option value="UTC+00:00">UTC+00:00 (GMT)</option>
                <option value="UTC-05:00">UTC-05:00 (EST)</option>
                <option value="UTC-08:00">UTC-08:00 (PST)</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Post Approval</label>
              <select
                v-model="newWorkspace.postApproval"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
              >
                <option value="disabled">Disabled</option>
                <option value="enabled">Enabled</option>
              </select>
            </div>
          </div>
          <div class="flex justify-end space-x-3 mt-6">
            <button
              type="button"
              @click="showCreateWorkspaceModal = false"
              class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors"
            >
              Cancel
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors"
            >
              Create Workspace
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Upgrade Modal -->
    <div v-if="showUpgradeModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg p-6 w-full max-w-lg">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Upgrade Your Plan</h3>
        <p class="text-gray-600 mb-6">Choose a plan that fits your needs and unlock more features.</p>
        
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
  </DashboardLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useAuthStore } from '../../stores/auth'
import DashboardLayout from '@/Components/dashboard/DashboardLayout.vue'

const authStore = useAuthStore()
const { 
  user, 
  currentPlan, 
  workspaces, 
  planLimits, 
  hasFeature, 
  canAddWorkspace, 
  createWorkspace: createWorkspaceAction,
  upgradePlan 
} = authStore

const searchQuery = ref('')
const showCreateWorkspaceModal = ref(false)
const showUpgradeModal = ref(false)

const newWorkspace = ref({
  name: '',
  timezone: 'UTC+03:00',
  postApproval: 'disabled'
})

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

const filteredWorkspaces = computed(() => {
  if (!searchQuery.value) return workspaces
  return workspaces.filter(workspace =>
    workspace.name.toLowerCase().includes(searchQuery.value.toLowerCase())
  )
})

const createWorkspace = () => {
  try {
    createWorkspaceAction({
      name: newWorkspace.value.name,
      timezone: newWorkspace.value.timezone,
      postApproval: newWorkspace.value.postApproval,
      avatar: newWorkspace.value.name.charAt(0).toUpperCase()
    })
    
    // Reset form
    newWorkspace.value = {
      name: '',
      timezone: 'UTC+03:00',
      postApproval: 'disabled'
    }
    
    showCreateWorkspaceModal.value = false
  } catch (error) {
    alert(error.message)
  }
}

const upgradeToPlan = (planName) => {
  upgradePlan(planName)
  showUpgradeModal.value = false
}
</script>
