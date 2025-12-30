<template>
  <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-purple-900 via-pink-800 to-indigo-900">
      <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
        <div class="absolute top-40 right-20 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-40 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
      </div>
    </div>

    <!-- Content -->
    <div class="relative container mx-auto px-6 py-32">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Text Content -->
        <div class="text-white space-y-8 animate-fade-in-up">
          <div class="inline-block">
            <span class="px-4 py-2 bg-white/10 backdrop-blur-lg rounded-full text-sm border border-white/20">
              ✨ Ancient Wisdom, Modern Living
            </span>
          </div>

          <h1 class="text-5xl md:text-7xl font-bold leading-tight">
            Discover the
            <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-yellow-400 bg-clip-text text-transparent">
              Power of Crystals
            </span>
          </h1>

          <p class="text-xl text-gray-200 leading-relaxed">
            Transform your space with authentic healing crystals, sacred jaap malas, and timeless antique spiritual items.
          </p>

          <!-- CTA Buttons -->
          <div class="flex flex-wrap gap-4">
            <button class="group relative px-8 py-4 bg-white text-purple-900 rounded-full font-semibold overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl">
              <span class="relative z-10">Shop Collection</span>
              <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></div>
              <span class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                Shop Collection →
              </span>
            </button>

            <button class="px-8 py-4 bg-white/10 backdrop-blur-lg text-white rounded-full font-semibold border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105">
              Learn More
            </button>
          </div>

          <!-- Features -->
          <div class="grid grid-cols-3 gap-6 pt-8">
            <div class="text-center">
              <div class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">100%</div>
              <div class="text-sm text-gray-300">Authentic</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">500+</div>
              <div class="text-sm text-gray-300">Products</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">24/7</div>
              <div class="text-sm text-gray-300">Support</div>
            </div>
          </div>
        </div>

        <!-- Hero Image with Glass Card -->
        <div class="relative animate-fade-in-up animation-delay-300">
          <div class="relative group">
            <!-- Main Image Card -->
            <div class="relative overflow-hidden rounded-3xl shadow-2xl transform group-hover:scale-105 transition-all duration-500">
              <img
                src="https://images.unsplash.com/photo-1608481337062-4093bf3ed404?w=800&auto=format&fit=crop&q=60"
                alt="Crystal Collection"
                class="w-full h-[600px] object-cover"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
            </div>

            <!-- Floating Glass Cards -->
            <div class="absolute -top-4 -left-4 bg-white/10 backdrop-blur-lg rounded-2xl p-4 border border-white/20 shadow-xl animate-float">
              <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
                <div class="text-white">
                  <div class="font-semibold">Certified</div>
                  <div class="text-sm text-gray-300">100% Genuine</div>
                </div>
              </div>
            </div>

            <div class="absolute -bottom-4 -right-4 bg-white/10 backdrop-blur-lg rounded-2xl p-4 border border-white/20 shadow-xl animate-float animation-delay-1000">
              <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                  </svg>
                </div>
                <div class="text-white">
                  <div class="font-semibold">Free Shipping</div>
                  <div class="text-sm text-gray-300">On orders $50+</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
      </svg>
    </div>
  </section>
</template>

<script setup>
//
</script>

<style scoped>
@keyframes blob {
  0%, 100% {
    transform: translate(0, 0) scale(1);
  }
  33% {
    transform: translate(30px, -50px) scale(1.1);
  }
  66% {
    transform: translate(-20px, 20px) scale(0.9);
  }
}

@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
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

.animate-blob {
  animation: blob 7s infinite;
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}

.animate-fade-in-up {
  animation: fade-in-up 1s ease-out;
}

.animation-delay-300 {
  animation-delay: 300ms;
}

.animation-delay-1000 {
  animation-delay: 1000ms;
}

.animation-delay-2000 {
  animation-delay: 2s;
}

.animation-delay-4000 {
  animation-delay: 4s;
}
</style>
