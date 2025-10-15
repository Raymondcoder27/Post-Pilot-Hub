import { defineStore } from 'pinia'
import { ref, computed } from 'vue'

export const useAuthStore = defineStore('auth', () => {
  // State
  const user = ref(null)
  const isAuthenticated = ref(false)
  const currentPlan = ref('starter') // 'starter', 'growth', 'agency'
  const workspaces = ref([])
  const currentWorkspace = ref(null)

  // Sample user data
  const sampleUser = {
    id: 1,
    name: 'Mwebe Raymond',
    email: 'raymond@example.com',
    timezone: 'UTC+03:00',
    avatar: 'M',
    plan: 'starter'
  }

  // Sample workspaces
  const sampleWorkspaces = [
    {
      id: 1,
      name: "Mwebe Raymond's Workspace",
      avatar: 'M',
      accounts: [
        { platform: 'facebook', name: 'Harlycon', status: 'connected', tokenExpiry: '2024-12-31' },
        { platform: 'instagram', name: 'Harlycon', status: 'connected', tokenExpiry: '2024-12-31' }
      ],
      teamMembers: [],
      timezone: 'UTC+03:00',
      createdBy: 'Mwebe Raymond',
      postApproval: 'disabled'
    }
  ]

  // Computed
  const planLimits = computed(() => {
    switch (currentPlan.value) {
      case 'starter':
        return {
          workspaces: 1,
          socialAccounts: 3,
          postsPerMonth: 50,
          teamMembers: 0,
          features: ['basic_scheduling', 'basic_analytics', 'email_support']
        }
      case 'growth':
        return {
          workspaces: 3,
          socialAccounts: 10,
          postsPerMonth: 200,
          teamMembers: 3,
          features: ['advanced_scheduling', 'ai_insights', 'team_collaboration', 'priority_support']
        }
      case 'agency':
        return {
          workspaces: -1, // unlimited
          socialAccounts: -1, // unlimited
          postsPerMonth: -1, // unlimited
          teamMembers: 10,
          features: ['unlimited_scheduling', 'premium_ai_insights', 'client_management', 'white_label', 'dedicated_support']
        }
      default:
        return planLimits.value.starter
    }
  })

  const hasFeature = computed(() => (feature) => {
    return planLimits.value.features.includes(feature)
  })

  const canAddWorkspace = computed(() => {
    if (planLimits.value.workspaces === -1) return true
    return workspaces.value.length < planLimits.value.workspaces
  })

  const canAddSocialAccount = computed(() => {
    if (planLimits.value.socialAccounts === -1) return true
    const totalAccounts = workspaces.value.reduce((total, workspace) => 
      total + workspace.accounts.length, 0)
    return totalAccounts < planLimits.value.socialAccounts
  })

  // Actions
  const login = (plan = 'starter') => {
    user.value = sampleUser
    user.value.plan = plan
    currentPlan.value = plan
    isAuthenticated.value = true
    workspaces.value = [...sampleWorkspaces]
    currentWorkspace.value = workspaces.value[0]
  }

  const logout = () => {
    user.value = null
    isAuthenticated.value = false
    currentPlan.value = 'starter'
    workspaces.value = []
    currentWorkspace.value = null
  }

  const upgradePlan = (newPlan) => {
    currentPlan.value = newPlan
    if (user.value) {
      user.value.plan = newPlan
    }
  }

  const createWorkspace = (workspaceData) => {
    if (!canAddWorkspace.value) {
      throw new Error('Workspace limit reached for your plan')
    }
    
    const newWorkspace = {
      id: Date.now(),
      ...workspaceData,
      accounts: [],
      teamMembers: [],
      createdBy: user.value.name
    }
    
    workspaces.value.push(newWorkspace)
    return newWorkspace
  }

  const addSocialAccount = (workspaceId, accountData) => {
    if (!canAddSocialAccount.value) {
      throw new Error('Social account limit reached for your plan')
    }
    
    const workspace = workspaces.value.find(w => w.id === workspaceId)
    if (workspace) {
      workspace.accounts.push({
        id: Date.now(),
        ...accountData
      })
    }
  }

  return {
    // State
    user,
    isAuthenticated,
    currentPlan,
    workspaces,
    currentWorkspace,
    // Computed
    planLimits,
    hasFeature,
    canAddWorkspace,
    canAddSocialAccount,
    // Actions
    login,
    logout,
    upgradePlan,
    createWorkspace,
    addSocialAccount
  }
})
