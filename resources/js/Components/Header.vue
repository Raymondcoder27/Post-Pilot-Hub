<template>
  <header class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <h1 class="text-2xl font-bold text-gray-900">
              Post Pilot Hub
            </h1>
          </div>
        </div>
        <nav class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-8">
            <a href="#features" class="text-gray-700 hover:text-orange-500 px-3 py-2 text-sm font-medium transition-colors">Features</a>
            <a href="#pricing" class="text-gray-700 hover:text-purple-600 px-3 py-2 text-sm font-medium transition-colors">Pricing</a>
            <a href="#testimonials" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors">Testimonials</a>
          </div>
        </nav>
        <div class="hidden md:block">
          <button @click="onboarding" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition-colors font-medium">
            Get Started
          </button>
          <!-- <Link to="/onboarding" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition-colors font-medium">
          Get Started </Link> -->
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import Onboarding from '@/Pages/Onboarding.vue';
import { Link, router } from '@inertiajs/vue3'

const onboarding = () => {
  router.visit('/onboarding');
}

// Header component
</script>

