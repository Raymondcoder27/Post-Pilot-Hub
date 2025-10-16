<template>
  <!-- <div class="bg-orange-400"> -->
  <!-- use bg-gradient -->
  <div class="min-h-screen bg-gradient-to-b from-orange-300 to-white flex flex-col">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden min-h-[500px] my-1">
      <!-- Progress Bar -->
      <!-- <div class="px-8 pt-6 pb-4 bg-white border-b border-gray-200">
      <div class="flex justify-between relative mb-6">
        <div 
          class="absolute top-1/2 left-0 h-1 bg-blue-600 transform -translate-y-1/2 transition-all duration-500"
          :style="{ width: `${((currentStep - 1) / 5) * 100}%` }"
        ></div>
        <div class="absolute top-1/2 left-0 right-0 h-1 bg-gray-200 transform -translate-y-1/2"></div>
        
        <div 
          v-for="step in steps" 
          :key="step.id"
          class="flex flex-col items-center z-10"
        >
          <div 
            class="w-8 h-8 rounded-full flex items-center justify-center mb-2 font-semibold transition-all duration-300"
            :class="{
              'bg-blue-600 text-white': currentStep === step.id,
              'bg-green-500 text-white': currentStep > step.id,
              'bg-gray-200 text-gray-800': currentStep < step.id
            }"
          >
            {{ step.id }}
          </div>
          <span 
            class="text-xs font-medium text-center max-w-[80px] transition-colors duration-300"
            :class="{
              'text-blue-600 font-semibold': currentStep === step.id,
              'text-gray-800': currentStep !== step.id
            }"
          >
            {{ step.label }}
          </span>
        </div>
      </div>
    </div> -->

      <!-- Replace your current progress bar section with this -->
      <div class="px-6 pt-8 pb-4">
        <div class="flex items-center justify-between relative">
          <!-- Progress line -->
          <div class="absolute top-1/2 left-0 right-0 h-1 bg-gray-200 transform -translate-y-1/2"></div>
          <div class="absolute top-1/2 left-0 h-1 bg-blue-600 transform -translate-y-1/2 transition-all duration-500"
            :style="{ width: `${((currentStep - 1) / (steps.length - 1)) * 100}%` }"></div>

          <!-- Steps -->
          <div v-for="(step, index) in steps" :key="step.id" class="flex flex-col items-center relative z-10">
            <!-- Step circle -->
            <div class="relative mb-3">
              <div
                class="w-10 h-10 rounded-full flex items-center justify-center font-bold transition-all duration-300 border-2"
                :class="{
                  'bg-blue-600 text-white border-blue-600': currentStep === step.id,
                  'bg-green-100 text-green-600 border-green-500': currentStep > step.id,
                  'bg-white text-gray-400 border-gray-300': currentStep < step.id
                }">
                <svg v-if="currentStep > step.id" class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span v-else>{{ step.id }}</span>
              </div>
              <!-- Connector line to next step -->
              <div v-if="index < steps.length - 1"
                class="absolute top-1/2 right-0 w-8 h-0.5 bg-gray-200 transform translate-y-1/2"
                :class="{ 'bg-blue-600': currentStep > step.id }"></div>
            </div>

            <!-- Step label -->
            <span class="text-xs font-medium text-center px-2 transition-colors duration-300" :class="{
              'text-blue-600 font-semibold': currentStep === step.id,
              'text-green-600': currentStep > step.id,
              'text-gray-500': currentStep < step.id
            }">
              {{ step.label }}
            </span>
          </div>
        </div>
      </div>
      <!-- Step Content -->
      <div class="flex-1 p-8 overflow-hidden">
        <!-- Step 1: Welcome -->
        <div v-if="currentStep === 1" class="flex flex-col h-full">
          <div class="mb-2">
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Welcome to Post Pilot Hub 👋</h1>
            <p class="text-lg text-gray-700">Let’s set up your command center for smarter social posting.</p>
          </div>

          <div class="flex flex-col gap-4 mt-8 mb-6">
            <button
              class="flex items-center justify-center gap-3 px-6 py-4 bg-white border border-gray-300 rounded-xl font-semibold text-gray-900 hover:bg-gray-50 transition-colors duration-200"
              @click="loginWithGoogle">
              <i class="fab fa-google text-xl"></i>
              Continue with Google
            </button>
            <button
              class="flex items-center justify-center gap-3 px-6 py-4 bg-white border border-gray-300 rounded-xl font-semibold text-gray-900 hover:bg-gray-50 transition-colors duration-200"
              @click="showEmailForm = true">
              <i class="fas fa-envelope text-xl"></i>
              Sign up with email
            </button>

            <div v-if="showEmailForm" class="mt-4">
              <input type="email" v-model="email" placeholder="Enter your email"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <button @click="signupWithEmail"
                class="mt-3 w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition-colors duration-200">
                Continue
              </button>
            </div>
          </div>

          <router-link to="/login" class="text-center mt-auto text-blue-600 font-medium hover:underline">
            Already have an account? Log in
          </router-link>
        </div>

        <!-- Step 2: Connect Accounts -->
        <div v-if="currentStep === 2" class="flex flex-col h-full">
          <div class="mb-2">
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Connect Your Social Platforms</h1>
            <p class="text-lg text-gray-700">Link your Instagram, Facebook, or LinkedIn accounts to start managing posts
              in one place.</p>
          </div>

          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-5 mt-6 mb-2">
            <div v-for="platform in platforms" :key="platform.id"
              class="bg-white border rounded-2xl p-6 flex flex-col items-center text-center cursor-pointer transition-all duration-200 hover:shadow-md hover:-translate-y-1"
              :class="{
                'border-green-500': connectedPlatforms.includes(platform.id),
                'border-gray-200': !connectedPlatforms.includes(platform.id)
              }" @click="connectPlatform(platform.id)">
              <div class="w-16 h-16 rounded-full flex items-center justify-center mb-2 text-white text-2xl"
                :class="platform.bgClass">
                <!-- <i :class="platform.icon"></i> -->
                <div :class="platform.color">
                  <Icon :icon="platform.icon" class="w-10 h-10" />
                  </div>
              </div>
              <div class="font-semibold mb-3">{{ platform.name }}</div>
              <button class="px-4 py-2 rounded-lg font-medium text-sm transition-colors duration-200" :class="{
                'bg-green-500 text-white': connectedPlatforms.includes(platform.id),
                'bg-blue-600 text-white hover:bg-blue-700': !connectedPlatforms.includes(platform.id)
              }">
                {{ connectedPlatforms.includes(platform.id) ? 'Connected' : 'Connect' }}
              </button>
            </div>
          </div>

          <!-- <a href="#" class="text-center mt-auto text-blue-600 font-medium hover:underline" @click.prevent="nextStep">
            Skip for now
          </a> -->
        </div>

        <!-- Step 3: Schedule Demo -->
        <div v-if="currentStep === 3" class="flex flex-col h-full">
          <div class="mb-2">
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Want a quick walkthrough?</h1>
            <p class="text-lg text-gray-700">Book a free 15-minute demo to see how Post Pilot Hub can save you hours
              each week.</p>
          </div>

          <div class="bg-gray-50 rounded-2xl p-6 mb-2 flex flex-col items-center">
            <div
              class="bg-white rounded-xl w-full h-72 flex items-center justify-center mb-6 text-gray-700 font-medium">
              <i class="far fa-calendar-alt text-4xl mr-3"></i> Calendly Widget Placeholder
            </div>
            <button
              class="px-8 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition-colors duration-200"
              @click="scheduleDemo">
              Schedule Demo
            </button>
          </div>

          <a href="#" class="text-center mt-auto text-blue-600 font-medium hover:underline" @click.prevent="nextStep">
            Skip this step
          </a>
        </div>

        <!-- Step 4: Choose Plan -->
        <div v-if="currentStep === 4" class="flex flex-col h-full">
          <div class="mb-2">
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Choose Your Growth Path 🚀</h1>
            <p class="text-lg text-gray-700">Select the plan that best fits your goals.</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-2">
            <div v-for="plan in plans" :key="plan.id"
              class="bg-white border rounded-2xl p-6 flex flex-col transition-all duration-200 cursor-pointer hover:shadow-lg"
              :class="{
                'border-blue-600 relative transform scale-105': plan.popular,
                'border-gray-200': !plan.popular,
                'ring-2 ring-blue-500': selectedPlan === plan.id
              }" @click="selectPlan(plan.id)">
              <div v-if="plan.popular"
                class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-yellow-400 text-gray-900 px-4 py-1 rounded-full text-xs font-bold">
                Most Popular
              </div>
              <div class="text-xl font-bold mb-2">{{ plan.name }}</div>
              <div class="text-4xl font-bold text-blue-600 mb-2">
                ${{ plan.price }}
                <span class="text-lg font-normal text-gray-700">/month</span>
              </div>
              <ul class="space-y-3 mb-6 flex-1">
                <li v-for="(feature, index) in plan.features" :key="index" class="flex items-start">
                  <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                  </svg>
                  {{ feature }}
                </li>
              </ul>
              <button class="w-full py-3 rounded-xl font-semibold transition-colors duration-200" :class="{
                'bg-blue-600 text-white hover:bg-blue-700': selectedPlan === plan.id,
                'bg-gray-100 text-gray-900 hover:bg-gray-200': selectedPlan !== plan.id
              }">
                {{ selectedPlan === plan.id ? 'Selected' : 'Select' }}
              </button>
            </div>
          </div>

          <p class="text-center text-gray-600 text-sm mt-auto">
            Payments are processed securely via Flutterwave.
          </p>
        </div>

        <!-- Step 5: Preferences -->
        <div v-if="currentStep === 5" class="flex flex-col h-full">
          <div class="mb-2">
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Set Your Posting Preferences</h1>
            <p class="text-lg text-gray-700">Tell us how often you want to post so we can help you stay consistent.</p>
          </div>

          <div class="space-y-6 flex-1">
            <div>
              <label class="block text-sm font-semibold text-gray-800 mb-2">Time Zone</label>
              <select v-model="preferences.timezone"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option v-for="tz in timezones" :key="tz.value" :value="tz.value">
                  {{ tz.label }}
                </option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-800 mb-2">Posting Frequency</label>
              <div class="flex flex-wrap gap-4">
                <label v-for="freq in frequencies" :key="freq.value" class="flex items-center cursor-pointer">
                  <input type="radio" v-model="preferences.frequency" :value="freq.value" class="sr-only">
                  <div
                    class="flex items-center justify-center w-10 h-10 rounded-lg border-2 mr-3 transition-colors duration-200"
                    :class="{
                      'border-blue-600 bg-blue-600': preferences.frequency === freq.value,
                      'border-gray-300': preferences.frequency !== freq.value
                    }">
                    <div v-if="preferences.frequency === freq.value" class="w-4 h-4 bg-white rounded-full"></div>
                  </div>
                  <span class="font-medium">{{ freq.label }}</span>
                </label>
              </div>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-800 mb-2">Preferred Platforms</label>
              <div class="flex flex-wrap gap-4">
                <label v-for="platform in platforms" :key="platform.id" class="flex items-center cursor-pointer">
                  <input type="checkbox" v-model="preferences.platforms" :value="platform.id" class="sr-only">
                  <div
                    class="flex items-center justify-center w-6 h-6 rounded border-2 mr-2 transition-colors duration-200"
                    :class="{
                      'border-blue-600 bg-blue-600': preferences.platforms.includes(platform.id),
                      'border-gray-300': !preferences.platforms.includes(platform.id)
                    }">
                    <svg v-if="preferences.platforms.includes(platform.id)" class="w-4 h-4 text-white" fill="none"
                      stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                  </div>
                  <span class="font-medium">{{ platform.name }}</span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 6: Success -->
        <div v-if="currentStep === 6" class="flex flex-col items-center justify-center h-full text-center">
          <div
            class="w-48 h-48 bg-orange-600 rounded-full flex items-center justify-center mb-2 text-white text-6xl">
            <!-- <i class="fas fa-rocket"></i> -->
            <Icon icon="mdi:rocket-launch" class="w-30 h-30" />
          </div>
          <h1 class="text-3xl font-bold text-gray-900 mb-3">You’re All Set! 🎉</h1>
          <p class="text-lg text-gray-700 mb-2">Welcome aboard, {{ user.name }}! Let’s start planning your posts.</p>
          <button
            class="px-8 py-4 bg-blue-600 text-white rounded-xl font-semibold text-lg hover:bg-blue-700 transition-colors duration-200"
            @click="goToDashboard">
            Go to Dashboard
          </button>
        </div>
      </div>

      <!-- Navigation Buttons -->
      <div class="flex justify-between p-6 bg-gray-50">
        <button v-if="currentStep > 1 && currentStep < 6"
          class="px-6 py-3 text-gray-800 font-semibold rounded-xl hover:bg-gray-200 transition-colors duration-200"
          @click="prevStep">
          Back
        </button>

        <div class="flex gap-4 ml-auto">
          <button v-if="currentStep === 2 || currentStep === 3"
            class="px-6 py-3 text-blue-600 font-semibold rounded-xl hover:bg-blue-50 transition-colors duration-200"
            @click="skipStep">
            {{ currentStep === 2 ? 'Skip for now' : 'Skip this step' }}
          </button>

          <button v-if="currentStep < 6"
            class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors duration-200"
            @click="nextStep">
            {{ currentStep === 5 ? 'Complete Setup' : 'Continue' }}
          </button>

          <!-- <button v-if="currentStep === 6"
            class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors duration-200"
            @click="goToDashboard">
            Go to Dashboard
          </button> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router'
import { router } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue'
import { watch } from 'vue';


// const router = useRouter()
// Reactive state
const currentStep = ref(1);
const showEmailForm = ref(false);
const email = ref('');
const connectedPlatforms = ref([]);
const selectedPlan = ref(null);
const user = ref({ name: 'User' });

// Preferences
const preferences = ref({
  timezone: '(GMT-08:00) Pacific Time (US & Canada)',
  frequency: 'daily',
  platforms: []
});

// Steps configuration
const steps = [
  { id: 1, label: 'Welcome' },
  { id: 2, label: 'Accounts' },
  { id: 3, label: 'Demo' },
  { id: 4, label: 'Plan' },
  { id: 5, label: 'Preferences' },
  { id: 6, label: 'Success' }
];

// Platforms data
// const platforms = [
//   { id: 'instagram', name: 'Instagram', icon: 'fab fa-instagram', bgClass: 'bg-pink-600' },
//   { id: 'facebook', name: 'Facebook', icon: 'fab fa-facebook-f', bgClass: 'bg-blue-600' },
//   { id: 'twitter', name: 'X (Twitter)', icon: 'fab fa-x-twitter', bgClass: 'bg-black' },
//   { id: 'linkedin', name: 'LinkedIn', icon: 'fab fa-linkedin-in', bgClass: 'bg-blue-700' },
//   { id: 'tiktok', name: 'TikTok', icon: 'fab fa-tiktok', bgClass: 'bg-black' }
// ];

const platforms = ref([
  { id: 'facebook', name: "Facebook", icon: "logos:facebook", color: "text-blue-600" },
  {  id: 'instagram',name: "Instagram", icon: "skill-icons:instagram", color: "text-pink-500" },
  {  id: 'linkedin',name: "LinkedIn", icon: "logos:linkedin-icon", color: "text-blue-700" },
  { id: 'twitter',name: "X", icon: "logos:x", color: "text-black" },
  { id: 'youtube', name: "YouTube", icon: "logos:youtube-icon", color: "text-red-600" },
  { id: 'pinterest', name: "Pinterest", icon: "logos:pinterest", color: "text-red-500" },
  { id: 'tiktok', name: "TikTok", icon: "logos:tiktok-icon", color: "text-black" }
])



// Plans data
const plans = [
  {
    id: 'starter',
    name: 'Starter',
    price: 9,
    popular: false,
    features: [
      '3 social accounts',
      '30 posts per month',
      'Basic analytics',
      'Email support'
    ]
  },
  {
    id: 'growth',
    name: 'Growth',
    price: 16,
    popular: true,
    features: [
      '10 social accounts',
      'Unlimited posts',
      'Advanced analytics',
      'Priority support',
      'Content suggestions'
    ]
  },
  {
    id: 'agency',
    name: 'Agency',
    price: 25,
    popular: false,
    features: [
      'Unlimited accounts',
      'Unlimited posts',
      'Team collaboration',
      'White-label reports',
      '24/7 dedicated support'
    ]
  }
];

// Timezones
const timezones = [
  { value: '(GMT-12:00) International Date Line West', label: '(GMT-12:00) International Date Line West' },
  { value: '(GMT-11:00) Midway Island', label: '(GMT-11:00) Midway Island' },
  { value: '(GMT-10:00) Hawaii', label: '(GMT-10:00) Hawaii' },
  { value: '(GMT-08:00) Pacific Time (US & Canada)', label: '(GMT-08:00) Pacific Time (US & Canada)' },
  { value: '(GMT-07:00) Mountain Time (US & Canada)', label: '(GMT-07:00) Mountain Time (US & Canada)' },
  { value: '(GMT-06:00) Central Time (US & Canada)', label: '(GMT-06:00) Central Time (US & Canada)' },
  { value: '(GMT-05:00) Eastern Time (US & Canada)', label: '(GMT-05:00) Eastern Time (US & Canada)' },
  { value: '(GMT+00:00) London', label: '(GMT+00:00) London' },
  { value: '(GMT+01:00) Berlin', label: '(GMT+01:00) Berlin' },
  { value: '(GMT+02:00) Cairo', label: '(GMT+02:00) Cairo' },
  { value: '(GMT+03:00) Moscow', label: '(GMT+03:00) Moscow' },
  { value: '(GMT+05:30) Mumbai', label: '(GMT+05:30) Mumbai' },
  { value: '(GMT+08:00) Beijing', label: '(GMT+08:00) Beijing' },
  { value: '(GMT+09:00) Tokyo', label: '(GMT+09:00) Tokyo' },
  { value: '(GMT+10:00) Sydney', label: '(GMT+10:00) Sydney' }
];

// Frequencies
const frequencies = [
  { value: 'daily', label: 'Daily' },
  { value: 'weekly', label: 'Weekly' },
  { value: 'custom', label: 'Custom' }
];

// Navigation methods
const nextStep = () => {
  if (currentStep.value < 6) {
    currentStep.value++;
  }
};

const prevStep = () => {
  if (currentStep.value > 1) {
    currentStep.value--;
  }
};

const skipStep = () => {
  if (currentStep.value === 2 || currentStep.value === 3) {
    currentStep.value++;
  }
};



watch(currentStep, (newStep) => {
  if (newStep === 6) {
    createConfetti();
  }
});


// Mock API Methods
const loginWithGoogle = () => {
  console.log('Google login clicked');
  user.value.name = 'Alex Johnson';
  nextStep();
};

const signupWithEmail = () => {
  if (email.value) {
    console.log('Signing up with email:', email.value);
    user.value.name = email.value.split('@')[0];
    showEmailForm.value = false;
    nextStep();
  }
};

const connectPlatform = (platformId) => {
  if (!connectedPlatforms.value.includes(platformId)) {
    connectedPlatforms.value.push(platformId);
    console.log('Connected platform:', platformId);
  }
};

const scheduleDemo = () => {
  console.log('Demo scheduled');
  nextStep();
};

const selectPlan = (planId) => {
  selectedPlan.value = planId;
  console.log('Selected plan:', planId);
};

const goToDashboard = () => {
  console.log('Going to dashboard');
  // createConfetti();
  router.visit('/dashboard');
  // In real app: window.location.href = '/dashboard';
};






// Add this function
const createConfetti = () => {
  // Create confetti container
  const container = document.createElement('div');
  container.className = 'confetti-container';
  container.style.cssText = `
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 9999;
  `;
  document.body.appendChild(container);

  const colors = ['#2563EB', '#FACC15', '#10B981', '#EF4444', '#8B5CF6'];

  for (let i = 0; i < 150; i++) {
    const confetti = document.createElement('div');
    confetti.style.cssText = `
      position: absolute;
      width: 10px;
      height: 10px;
      background-color: ${colors[Math.floor(Math.random() * colors.length)]};
      border-radius: 50%;
      top: -20px;
      left: ${Math.random() * 100}%;
      animation: confetti-fall ${Math.random() * 3 + 2}s linear forwards;
      animation-delay: ${Math.random() * 2}s;
    `;
    container.appendChild(confetti);
  }

  // Add the animation CSS
  const style = document.createElement('style');
  style.textContent = `
    @keyframes confetti-fall {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(100vh) rotate(720deg);
        opacity: 0;
      }
    }
  `;
  document.head.appendChild(style);

  // Clean up after animation
  setTimeout(() => {
    container.remove();
    style.remove();
  }, 5000);
};

// Call it in goToDashboard
// const goToDashboard = () => {
//   createConfetti();
//   console.log('Going to dashboard');
//   router.visit('/dashboard');
// };
</script>