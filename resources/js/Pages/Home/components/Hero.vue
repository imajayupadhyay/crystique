<template>
  <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Content -->
    <div class="relative container mx-auto px-6 py-28">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Text Content -->
        <div class="space-y-8 animate-fade-in-up">
          <div class="inline-block">
            <span class="px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-600 rounded-full text-sm font-semibold">
              ✨ Ancient Wisdom, Modern Living
            </span>
          </div>

          <h1 class="text-5xl md:text-7xl font-bold leading-tight text-gray-900">
            Discover the
            <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-purple-600 bg-clip-text text-transparent">
              Power of Crystals
            </span>
          </h1>

          <p class="text-xl text-gray-600 leading-relaxed">
            Transform your space with authentic healing crystals, sacred jaap malas, and timeless antique spiritual items.
          </p>

          <!-- CTA Buttons -->
          <div class="flex flex-wrap gap-4">
            <button class="group px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full font-semibold transition-all duration-300 hover:scale-105 hover:shadow-2xl">
              <span class="flex items-center gap-2">
                Shop Collection
                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
              </span>
            </button>

            <button class="px-8 py-4 bg-white text-gray-700 rounded-full font-semibold border-2 border-gray-200 hover:border-purple-600 hover:text-purple-600 transition-all duration-300 hover:scale-105 shadow-lg">
              Learn More
            </button>
          </div>

          <!-- Features -->
          <div class="grid grid-cols-3 gap-6 pt-8">
            <div class="text-center">
              <div class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">100%</div>
              <div class="text-sm text-gray-600">Authentic</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">500+</div>
              <div class="text-sm text-gray-600">Products</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">24/7</div>
              <div class="text-sm text-gray-600">Support</div>
            </div>
          </div>
        </div>

        <!-- Hero Image with Glass Card -->
        <div class="relative animate-fade-in-up animation-delay-300">
          <div class="relative group">
            <!-- Main Image Card -->
            <div class="relative overflow-hidden rounded-3xl shadow-2xl transform group-hover:scale-105 transition-all duration-500 bg-gradient-to-br from-purple-50 to-pink-50">
              <div class="relative h-[600px] flex items-center justify-center p-8">
                <img
                  src="https://www.darjewellery.com/product_image/s1200__aHR0cHM6Ly9tZWRpYS5kYXJqZXdlbGxlcnkuaW4vcHJvZHVjdF9pbWFnZXMvczEyMDBfXzE3NDQzNzcwOTc0NTUuanBn"
                  alt="Crystal Collection"
                  class="max-w-full max-h-full object-contain"
                />
              </div>
            </div>

            <!-- Floating Glass Cards -->
            <div class="absolute -top-4 -left-4 bg-white/95 backdrop-blur-lg rounded-2xl p-4 border border-gray-100 shadow-xl animate-float">
              <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
                <div class="text-gray-900">
                  <div class="font-semibold">Certified</div>
                  <div class="text-sm text-gray-600">100% Genuine</div>
                </div>
              </div>
            </div>

            <div class="absolute -bottom-4 -right-4 bg-white/95 backdrop-blur-lg rounded-2xl p-4 border border-gray-100 shadow-xl animate-float animation-delay-1000">
              <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                  </svg>
                </div>
                <div class="text-gray-900">
                  <div class="font-semibold">Free Shipping</div>
                  <div class="text-sm text-gray-600">On orders $50+</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
      <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
      </svg>
    </div>
  </section>
</template>

<script setup>
//
</script>

<style scoped>
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
</style>
