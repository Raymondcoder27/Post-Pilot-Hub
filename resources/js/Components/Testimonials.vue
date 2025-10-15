<template>
  <section id="testimonials" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Trusted by African Entrepreneurs</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Join hundreds of businesses across East Africa who are transforming their social media strategy.
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div 
          v-for="(testimonial, index) in testimonials" 
          :key="index" 
          class="bg-white p-6 rounded-xl shadow-sm border border-gray-200"
        >
          <div class="flex items-center mb-4">
            <img 
              :src="testimonial.avatar" 
              :alt="testimonial.name"
              class="w-12 h-12 rounded-full mr-4 border border-gray-200"
            />
            <div>
              <h4 class="font-bold text-gray-900">{{ testimonial.name }}</h4>
              <p class="text-gray-600 text-sm">{{ testimonial.role }}</p>
            </div>
          </div>
          <p class="text-gray-700 italic">"{{ testimonial.content }}"</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'

const testimonials = ref([
  {
    name: "Sarah Namukasa",
    role: "Founder, Kampala Digital Studio",
    content: "Post Pilot Hub has cut our social media management time by 70%. The AI insights helped us double our engagement in just 2 months!",
    avatar: "https://placehold.co/60x60/white/374151?text=SN"
  },
  {
    name: "David Omondi",
    role: "Marketing Director, Nairobi Tech Solutions",
    content: "Finally, a platform that understands African businesses. The UGX pricing and local support make all the difference.",
    avatar: "https://placehold.co/60x60/white/374151?text=DO"
  },
  {
    name: "Grace Atuhaire",
    role: "Owner, Entebbe Boutique",
    content: "I went from posting randomly to having a consistent brand presence. My sales increased by 40% since using Post Pilot Hub!",
    avatar: "https://placehold.co/60x60/white/374151?text=GA"
  }
])
</script>

