<!-- <template>
  <section id="pricing" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Simple, Transparent Pricing</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Affordable plans in UGX, designed specifically for African businesses. Save 20% with annual billing.
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div 
          v-for="(plan, index) in pricingPlans" 
          :key="index" 
          :class="`bg-white rounded-xl shadow-lg p-8 relative border ${plan.borderColor} ${
            plan.popular ? 'ring-2 ring-purple-600 transform scale-105' : ''
          }`"
           @click="selectPlan(plan.name)"
        >
          <div v-if="plan.popular" class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-purple-600 text-white px-4 py-1 rounded-full text-sm font-medium">
            Most Popular
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ plan.name }}</h3>
          <p class="text-gray-600 mb-6">{{ plan.description }}</p>
          <div class="mb-6">
            <span class="text-4xl font-bold text-gray-900">{{ plan.price }}</span>
            <span class="text-gray-600 ml-2">{{ plan.period }}</span>
          </div>
          <ul class="space-y-3 mb-8">
            <li v-for="(feature, featureIndex) in plan.features" :key="featureIndex" class="flex items-center">
              <Check class="w-5 h-5 text-green-500 mr-2" />
              <span class="text-gray-700">{{ feature }}</span>
            </li>
          </ul>
          <button :class="`w-full py-3 px-6 rounded-lg font-medium transition-colors ${
            plan.popular 
              ? 'bg-purple-600 text-white hover:bg-purple-700' 
              : 'bg-gray-100 text-gray-900 hover:bg-gray-200'
          }`">
            Get Started
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import Check from './icons/Check.vue'
import { useAuthStore } from '../stores/auth'
//import { useRouter } from 'vue-router'
const authStore = useAuthStore()
const { login } = authStore

//const router = useRouter()

const pricingPlans = ref([
  {
    name: "Starter",
    price: "25,000 UGX",
    period: "per month",
    description: "Perfect for solo entrepreneurs",
    features: [
      "Up to 3 social accounts",
      "50 posts per month",
      "Basic AI insights",
      "Email support"
    ],
    popular: false,
    borderColor: "border-gray-200"
  },
  {
    name: "Growth",
    price: "65,000 UGX",
    period: "per month",
    description: "Ideal for growing businesses",
    features: [
      "Up to 10 social accounts",
      "200 posts per month",
      "Advanced AI insights",
      "Team collaboration (3 members)",
      "Priority support"
    ],
    popular: true,
    borderColor: "border-purple-200"
  },
  {
    name: "Agency",
    price: "150,000 UGX",
    period: "per month",
    description: "For agencies and large teams",
    features: [
      "Unlimited social accounts",
      "Unlimited posts",
      "Premium AI insights",
      "Team collaboration (10 members)",
      "Client management",
      "24/7 dedicated support"
    ],
    popular: false,
    borderColor: "border-orange-200"
  }
])

const selectPlan = (planName) => {
  console.log('Selecting plan:', planName)
  try {
    login(planName)
    console.log('Login successful')
    // showPlanSelection.value = false
    console.log('Navigating to dashboard...')
    //router.push('/dashboard')
  } catch (error) {
    console.error('Error selecting plan:', error)
  }
}
</script>
 -->



 <template>
  <section id="pricing" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Simple, Transparent Pricing</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Affordable plans in UGX, designed specifically for African businesses. Save 20% with annual billing.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div 
          v-for="(plan, index) in pricingPlans" 
          :key="index"
          :class="[
            'bg-white rounded-xl shadow-lg p-8 relative border cursor-pointer transition-transform hover:scale-105',
            plan.borderColor,
            plan.popular ? 'ring-2 ring-purple-600 transform scale-105' : ''
          ]"
        >
          <div v-if="plan.popular" class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-purple-600 text-white px-4 py-1 rounded-full text-sm font-medium">
            Most Popular
          </div>

          <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ plan.name }}</h3>
          <p class="text-gray-600 mb-6">{{ plan.description }}</p>

          <div class="mb-6">
            <span class="text-4xl font-bold text-gray-900">{{ plan.price }}</span>
            <span class="text-gray-600 ml-2">{{ plan.period }}</span>
          </div>

          <ul class="space-y-3 mb-8">
            <li 
              v-for="(feature, featureIndex) in plan.features" 
              :key="featureIndex" 
              class="flex items-center"
            >
              <Check class="w-5 h-5 text-green-500 mr-2" />
              <span class="text-gray-700">{{ feature }}</span>
            </li>
          </ul>

          <button 
            :class="[
              'w-full py-3 px-6 rounded-lg font-medium transition-colors',
              plan.popular 
                ? 'bg-purple-600 text-white hover:bg-purple-700' 
                : 'bg-gray-100 text-gray-900 hover:bg-gray-200'
            ]"
            @click="openFlutterwave(plan)"
          >
            Get Started
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'
import Check from './icons/Check.vue'
import { useAuthStore } from '../stores/auth'
const authStore = useAuthStore()

// Flutterwave public key from your Flutterwave dashboard
const FLW_PUBLIC_KEY = 'FLWPUBK_TEST-dff0eb8b36d66123856c77088b4aeab7-X' // replace with your actual public key

const pricingPlans = ref([
  {
    name: "Starter",
    price: "25000",
    displayPrice: "25,000 UGX",
    period: "per month",
    description: "Perfect for solo entrepreneurs",
    features: [
      "Up to 3 social accounts",
      "50 posts per month",
      "Basic AI insights",
      "Email support"
    ],
    popular: false,
    borderColor: "border-gray-200"
  },
  {
    name: "Growth",
    price: "65000",
    displayPrice: "65,000 UGX",
    period: "per month",
    description: "Ideal for growing businesses",
    features: [
      "Up to 10 social accounts",
      "200 posts per month",
      "Advanced AI insights",
      "Team collaboration (3 members)",
      "Priority support"
    ],
    popular: true,
    borderColor: "border-purple-200"
  },
  {
    name: "Agency",
    price: "150000",
    displayPrice: "150,000 UGX",
    period: "per month",
    description: "For agencies and large teams",
    features: [
      "Unlimited social accounts",
      "Unlimited posts",
      "Premium AI insights",
      "Team collaboration (10 members)",
      "Client management",
      "24/7 dedicated support"
    ],
    popular: false,
    borderColor: "border-orange-200"
  }
])

const openFlutterwave = (plan) => {
  const userEmail = authStore?.user?.email || 'guest@example.com'
  const txRef = `POSTPILOT-${Date.now()}-${plan.name}`

  FlutterwaveCheckout({
    public_key: FLW_PUBLIC_KEY,
    tx_ref: txRef,
    amount: parseInt(plan.price),
    currency: "UGX",
    payment_options: "card, mobilemoneyuganda",
    customer: {
      email: userEmail,
      name: authStore?.user?.name || 'Guest User'
    },
    customizations: {
      title: "Post Pilot Hub Subscription",
      description: `Subscription for ${plan.name} plan`,
      logo: "https://yourdomain.com/logo.png"
    },
    // callback: (data) => {
    //   console.log("Payment callback:", data)
    //   if (data.status === "successful") {
    //     // TODO: verify payment via backend API
    //     alert(`✅ Payment successful for ${plan.name} plan!`)
    //   } else {
    //     alert(`❌ Payment failed or cancelled.`)
    //   }
    // },
    // onclose: () => {
    //   console.log("Flutterwave modal closed")
    // }
    callback: async (data) => {
  if (data.status === "successful") {
    await fetch("/api/payments/verify", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ transaction_id: data.transaction_id }),
    })
    alert(`✅ Payment successful! Your ${plan.name} plan is now active.`)
  } else {
    alert("❌ Payment failed or cancelled.")
  }
},
  })
}
</script>

