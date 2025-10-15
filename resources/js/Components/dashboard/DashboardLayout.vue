<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Top Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
      <div class="flex items-center justify-between px-4 py-3">
        <!-- Left side - User info -->
        <div class="flex items-center space-x-4">
          <div class="w-8 h-8 bg-orange-500 rounded flex items-center justify-center">
            <Check class="w-5 h-5 text-white" />
          </div>
          <div class="relative">
            <button @click="showUserDropdown = !showUserDropdown"
              class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
              <div v-if="user"
                class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-sm font-medium">
                {{ user.avatar }}
              </div>
              <div v-if="user" class="text-left">
                <div class="text-sm font-medium">{{ user.name }}'s...</div>
                <div class="text-xs text-gray-500">{{ user.timezone }}</div>
              </div>
              <ChevronDown class="w-4 h-4" />
            </button>

            <!-- User Dropdown -->
            <div v-if="showUserDropdown"
              class="absolute top-full left-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50">
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                FAQs
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                </svg>
                What's New
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                Roadmap
              </a>
              <div class="border-t border-gray-100 my-2"></div>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Help Guides
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h8m2-10H5a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2z" />
                </svg>
                Video Tutorials
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                </svg>
                Free Tools
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                Live Chat
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                Book a Demo
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Visit Community
                <ArrowRight class="w-4 h-4 ml-auto" />
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                Platform Status
              </a>
            </div>
          </div>
        </div>

        <!-- Right side - Actions -->
        <div class="flex items-center space-x-4">
          <button
            class="bg-orange-500 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-orange-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
            </svg>
            <span>Upgrade Now</span>
          </button>
          <button class="p-2 text-gray-500 hover:text-gray-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
          </button>
          <button class="p-2 text-gray-500 hover:text-gray-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 102.828 2.828l6.414 6.414a2 2 0 002.828 2.828l6.414 6.414a2 2 0 002.828 2.828L24 21" />
            </svg>
          </button>
          <div v-if="user" class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
            <span class="text-sm font-medium">{{ user.avatar }}</span>
          </div>
        </div>
      </div>
    </header>

    <div class="flex">
      <!-- Sidebar -->
      <aside :class="`bg-gray-800 text-white transition-all duration-300 ${sidebarCollapsed ? 'w-16' : 'w-64'}`">
        <div class="p-4">
          <!-- Navigation Icons -->
          <nav class="space-y-2">
            <!-- Dashboard -->
            <Link href="/dashboard"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
            <Check class="w-5 h-5" />
            <span v-if="!sidebarCollapsed">Dashboard</span>
            </Link>

            <!-- Calendar -->
            <!-- <router-link to="/calendar"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': $route.path === '/calendar' }">
              <Calendar class="w-5 h-5" />
              <span v-if="!sidebarCollapsed">Calendar</span>
            </router-link> -->
            <Link to="/calendar"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': '' }">
              <Calendar class="w-5 h-5" />
              <span v-if="!sidebarCollapsed">Calendar</span>
            </Link>
            

            <!-- Publish -->
            <!-- <router-link to="/publish"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': $route.path === '/publish' }">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
              </svg>
              <span v-if="!sidebarCollapsed">Publish</span>
            </router-link> -->
            <Link to="/publish"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': '' }">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
              </svg>
              <span v-if="!sidebarCollapsed">Publish</span>
            </Link>

            <!-- Analytics -->
            <!-- <router-link to="/analytics"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': $route.path === '/analytics' }">
              <BarChart3 class="w-5 h-5" />
              <span v-if="!sidebarCollapsed">Analytics</span>
            </router-link> -->
            <Link to="/analytics"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': '' }">
              <BarChart3 class="w-5 h-5" />
              <span v-if="!sidebarCollapsed">Analytics</span>
            </Link>

            <!-- Engage -->
            <!-- <router-link to="/engage"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': $route.path === '/engage' }">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              </svg>
              <span v-if="!sidebarCollapsed">Engage</span>
            </router-link> -->
            <Link to="/engage"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': '' }">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              </svg>
              <span v-if="!sidebarCollapsed">Engage</span>
            </Link>

            <!-- Listening -->
            <!-- <router-link to="/listening"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': $route.path === '/listening' }">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
              </svg>
              <span v-if="!sidebarCollapsed">Listening</span>
            </router-link> -->
            <Link to="/listening"
              class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
              :class="{ 'bg-orange-500': '' }">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
              </svg>
              <span v-if="!sidebarCollapsed">Listening</span>
            </Link>
          </nav>

          <!-- Personal Section -->
          <div class="mt-8">
            <div class="flex items-center justify-between p-2">
              <span v-if="!sidebarCollapsed"
                class="text-sm font-medium text-gray-400 uppercase tracking-wide">Personal</span>
              <ChevronDown class="w-4 h-4" />
              <!-- <ChevronDown :class="{ 'rotate-180': showPersonal }" class="w-4 h-4 transition-transform"/> -->
              <!-- <svg v-if="!showPersonal" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"></svg> -->
            </div>
            <nav v-if="showPersonal" class="mt-2 space-y-1">
              <a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span v-if="!sidebarCollapsed">Account</span>
              </a>
              <a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                <span v-if="!sidebarCollapsed">Change Password</span>
              </a>
              <a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <span v-if="!sidebarCollapsed">Security - 2FA</span>
              </a>
            </nav>
          </div>

          <!-- Workspace Section -->
          <div class="mt-6">
            <div class="flex items-center justify-between p-2">
              <span v-if="!sidebarCollapsed"
                class="text-sm font-medium text-gray-400 uppercase tracking-wide">Workspace</span>
              <ChevronDown class="w-4 h-4" />
            </div>
            <nav class="mt-2 space-y-1">
              <!-- <router-link to="/workspace"
                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
                :class="{ 'bg-orange-500': $route.path === '/dashboard/workspace' }">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span v-if="!sidebarCollapsed">Manage/Create New</span>
              </router-link> -->
              <Link to="/workspace"
                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
                :class="{ 'bg-orange-500': '' }">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span v-if="!sidebarCollapsed">Manage/Create New</span>
              </Link>
              <Link to="/accounts"
                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
                :class="{ 'bg-orange-500': '' }">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span v-if="!sidebarCollapsed">Social Accounts</span>
              </Link>
              <a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
                <span v-if="!sidebarCollapsed">UTM Tracking</span>
              </a>
              <!--<router-link to="/accounts"
                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors"
                :class="{ 'bg-orange-500': $route.path === '/dashboard/accounts' }">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span v-if="!sidebarCollapsed">Social Accounts</span>
              </router-link> -->
              <a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
                <span v-if="!sidebarCollapsed">UTM Tracking</span>
              </a>
              <a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
                <span v-if="!sidebarCollapsed">Link in Bio</span>
              </a>
              <a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <span v-if="!sidebarCollapsed">Manage Queues</span>
              </a>
            </nav>
          </div>

          <!-- Bottom Actions -->
          <!-- <div class="mt-8 flex space-y-2 bg-orange-500 rounded-lg hover:bg-orange-600 "> -->
          <div class="mt-8 flex space-y-2">
            <button class="w-full flex items-center justify-center p-2 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
            </button>
            <button class="w-full flex items-center justify-center p-2 text-white hover:text-white transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              </svg>
            </button>
            <button class="w-full flex items-center justify-center p-2 text-white hover:text-white transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Collapse Button -->
        <button @click="sidebarCollapsed = !sidebarCollapsed"
          class="absolute -right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 bg-gray-600 rounded-full flex items-center justify-center hover:bg-gray-500 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
      </aside>

      <!-- Main Content -->
      <!-- <main class="flex-1 p-6">
        <router-view />
      </main> -->
      <main class="flex-1 p-6">
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useAuthStore } from '../../stores/auth'
import Check from '../icons/Check.vue'
import Calendar from '../icons/Calendar.vue'
import BarChart3 from '../icons/BarChart3.vue'
import ChevronDown from '../icons/ChevronDown.vue'
import ArrowRight from '../icons/ArrowRight.vue'
import { Link, router } from '@inertiajs/vue3'


const showPersonal = ref(false)
const showWorkspace = ref(false)

const authStore = useAuthStore()
const { user } = authStore

const showUserDropdown = ref(false)
const sidebarCollapsed = ref(false)
</script>
