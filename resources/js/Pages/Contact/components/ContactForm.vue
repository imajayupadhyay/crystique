<template>
  <section class="min-h-screen bg-white pt-32 pb-20 relative overflow-hidden">
    <!-- Animated SVG Background -->
    <div class="absolute inset-0 z-0">
      <svg class="absolute w-full h-full" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:rgb(147,51,234);stop-opacity:0.1" />
            <stop offset="100%" style="stop-color:rgb(219,39,119);stop-opacity:0.1" />
          </linearGradient>
        </defs>

        <!-- Animated Circles -->
        <circle class="animate-float-slow" cx="10%" cy="20%" r="120" fill="url(#grad1)" />
        <circle class="animate-float-slower" cx="90%" cy="30%" r="100" fill="url(#grad1)" />
        <circle class="animate-float" cx="20%" cy="80%" r="80" fill="url(#grad1)" />
        <circle class="animate-float-slow" cx="85%" cy="75%" r="150" fill="url(#grad1)" />
        <circle class="animate-float-slower" cx="50%" cy="50%" r="60" fill="url(#grad1)" />

        <!-- Wavy Lines -->
        <path class="animate-wave" d="M0,100 Q250,50 500,100 T1000,100 T1500,100 T2000,100"
              stroke="rgb(147,51,234)" stroke-width="2" fill="none" opacity="0.2"/>
        <path class="animate-wave-slow" d="M0,200 Q250,150 500,200 T1000,200 T1500,200 T2000,200"
              stroke="rgb(219,39,119)" stroke-width="2" fill="none" opacity="0.2"/>
      </svg>
    </div>

    <div class="container mx-auto px-6 relative z-10">
      <!-- Section Header -->
      <div class="text-center mb-16 space-y-4 animate-fade-in-up">
        <span class="inline-block px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-600 rounded-full text-sm font-semibold">
          Get In Touch
        </span>
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
          Let's Start a
          <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent"> Conversation</span>
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto text-lg">
          Have questions about our crystals or need guidance? We're here to help you on your spiritual journey.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
        <!-- Contact Form -->
        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100 animate-fade-in-up animation-delay-200">
          <div class="flex items-center space-x-3 mb-6">
            <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900">Send us a Message</h3>
          </div>

          <form @submit.prevent="handleSubmit" class="space-y-6">
            <!-- Name Input -->
            <div>
              <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
              <input
                v-model="form.name"
                type="text"
                id="name"
                required
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-300"
                placeholder="John Doe"
              />
            </div>

            <!-- Email Input -->
            <div>
              <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
              <input
                v-model="form.email"
                type="email"
                id="email"
                required
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-300"
                placeholder="john@example.com"
              />
            </div>

            <!-- Phone Input -->
            <div>
              <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
              <input
                v-model="form.phone"
                type="tel"
                id="phone"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-300"
                placeholder="+1 (555) 123-4567"
              />
            </div>

            <!-- Subject Input -->
            <div>
              <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject *</label>
              <select
                v-model="form.subject"
                id="subject"
                required
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-300"
              >
                <option value="" disabled>Select a subject</option>
                <option value="product-inquiry">Product Inquiry</option>
                <option value="order-status">Order Status</option>
                <option value="guidance">Spiritual Guidance</option>
                <option value="wholesale">Wholesale Orders</option>
                <option value="other">Other</option>
              </select>
            </div>

            <!-- Message Textarea -->
            <div>
              <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message *</label>
              <textarea
                v-model="form.message"
                id="message"
                rows="5"
                required
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 resize-none hover:border-purple-300"
                placeholder="Tell us more about how we can help you..."
              ></textarea>
            </div>

            <!-- Submit Button -->
            <button
              type="submit"
              class="w-full py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300 flex items-center justify-center space-x-2"
            >
              <span>Send Message</span>
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
              </svg>
            </button>
          </form>
        </div>

        <!-- Contact Information -->
        <div class="space-y-6 animate-fade-in-up animation-delay-400">
          <!-- Contact Cards -->
          <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100">
            <div class="flex items-center space-x-3 mb-6">
              <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-900">Contact Information</h3>
            </div>

            <div class="space-y-6">
              <!-- Email -->
              <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-colors group cursor-pointer">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-gradient-to-r group-hover:from-purple-600 group-hover:to-pink-600 transition-all">
                  <svg class="w-6 h-6 text-purple-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div>
                  <h4 class="text-gray-900 font-semibold mb-1">Email</h4>
                  <p class="text-gray-600 text-sm">info@crystique.com</p>
                  <p class="text-gray-600 text-sm">support@crystique.com</p>
                </div>
              </div>

              <!-- Phone -->
              <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-colors group cursor-pointer">
                <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-gradient-to-r group-hover:from-purple-600 group-hover:to-pink-600 transition-all">
                  <svg class="w-6 h-6 text-pink-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
                <div>
                  <h4 class="text-gray-900 font-semibold mb-1">Phone</h4>
                  <p class="text-gray-600 text-sm">+1 (555) 123-4567</p>
                  <p class="text-gray-600 text-sm">Mon-Fri 9am-6pm EST</p>
                </div>
              </div>

              <!-- Address -->
              <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-colors group cursor-pointer">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-gradient-to-r group-hover:from-purple-600 group-hover:to-pink-600 transition-all">
                  <svg class="w-6 h-6 text-indigo-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <h4 class="text-gray-900 font-semibold mb-1">Address</h4>
                  <p class="text-gray-600 text-sm">123 Spiritual Lane</p>
                  <p class="text-gray-600 text-sm">Crystal Valley, CA 90210</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Social Media Links -->
          <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Follow Us</h3>
            <p class="text-gray-600 text-sm mb-6">
              Join our community and stay updated with the latest crystals and spiritual wisdom.
            </p>

            <div class="grid grid-cols-4 gap-3">
              <!-- Facebook -->
              <a href="#" class="social-link group">
                <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </a>

              <!-- Instagram -->
              <a href="#" class="social-link group">
                <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
              </a>

              <!-- Twitter -->
              <a href="#" class="social-link group">
                <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
              </a>

              <!-- WhatsApp -->
              <a href="#" class="social-link group">
                <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
              </a>
            </div>
          </div>

          <!-- Quick Response Badge -->
          <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl p-6 text-white shadow-xl">
            <div class="flex items-center space-x-4">
              <div class="w-14 h-14 bg-white/20 backdrop-blur-lg rounded-2xl flex items-center justify-center">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <div>
                <h4 class="font-bold text-lg">Quick Response</h4>
                <p class="text-white/90 text-sm">We typically respond within 24 hours</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';

const form = ref({
  name: '',
  email: '',
  phone: '',
  subject: '',
  message: ''
});

const handleSubmit = () => {
  console.log('Form submitted:', form.value);
  alert('Thank you for your message! We will get back to you soon.');

  // Reset form
  form.value = {
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
  };
};
</script>

<style scoped>
.social-link {
  aspect-ratio: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 0.75rem;
  background-color: rgb(243, 244, 246);
  transition: all 0.3s ease;
}

.social-link:hover {
  background: linear-gradient(to right, rgb(147, 51, 234), rgb(219, 39, 119));
  transform: scale(1.1);
}

@keyframes float-slow {
  0%, 100% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(20px, -20px);
  }
}

@keyframes float-slower {
  0%, 100% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(-30px, 30px);
  }
}

@keyframes float {
  0%, 100% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(15px, 15px);
  }
}

@keyframes wave {
  0% {
    d: path('M0,100 Q250,50 500,100 T1000,100 T1500,100 T2000,100');
  }
  50% {
    d: path('M0,100 Q250,150 500,100 T1000,100 T1500,100 T2000,100');
  }
  100% {
    d: path('M0,100 Q250,50 500,100 T1000,100 T1500,100 T2000,100');
  }
}

@keyframes wave-slow {
  0% {
    d: path('M0,200 Q250,150 500,200 T1000,200 T1500,200 T2000,200');
  }
  50% {
    d: path('M0,200 Q250,250 500,200 T1000,200 T1500,200 T2000,200');
  }
  100% {
    d: path('M0,200 Q250,150 500,200 T1000,200 T1500,200 T2000,200');
  }
}

.animate-float-slow {
  animation: float-slow 8s ease-in-out infinite;
}

.animate-float-slower {
  animation: float-slower 10s ease-in-out infinite;
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

.animate-wave {
  animation: wave 15s ease-in-out infinite;
}

.animate-wave-slow {
  animation: wave-slow 20s ease-in-out infinite;
}

@keyframes fade-in-up {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in-up {
  animation: fade-in-up 0.8s ease-out;
}

.animation-delay-200 {
  animation-delay: 0.2s;
  animation-fill-mode: backwards;
}

.animation-delay-400 {
  animation-delay: 0.4s;
  animation-fill-mode: backwards;
}
</style>
