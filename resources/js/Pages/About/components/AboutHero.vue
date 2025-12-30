<template>
  <section class="relative overflow-hidden pb-20">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Text Content -->
        <div class="space-y-6 animate-fade-in-up">
          <div class="inline-block">
            <span class="px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-600 rounded-full text-sm font-semibold">
              About Crystique
            </span>
          </div>

          <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
            Where Ancient
            <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
              Wisdom
            </span>
            Meets Modern Living
          </h1>

          <p class="text-xl text-gray-600 leading-relaxed">
            We are passionate curators of authentic healing crystals, sacred spiritual items, and timeless antiques.
            Each piece in our collection carries its own unique energy and story.
          </p>

          <div class="flex flex-wrap gap-4 pt-4">
            <div class="flex items-center gap-3 px-6 py-3 bg-gray-50 rounded-xl">
              <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <div>
                <p class="font-bold text-gray-900">100% Authentic</p>
                <p class="text-sm text-gray-600">Certified Products</p>
              </div>
            </div>

            <div class="flex items-center gap-3 px-6 py-3 bg-gray-50 rounded-xl">
              <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                </svg>
              </div>
              <div>
                <p class="font-bold text-gray-900">Expert Curated</p>
                <p class="text-sm text-gray-600">Handpicked Items</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Image Grid -->
        <div class="relative grid grid-cols-2 gap-4 animate-fade-in-up animation-delay-300">
          <div class="space-y-4">
            <img
              src="https://images.unsplash.com/photo-1608481337062-4093bf3ed404?w=800&auto=format&fit=crop&q=60"
              alt="Crystal Collection"
              class="w-full h-64 object-cover rounded-2xl shadow-lg"
            />
            <img
              src="https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800&auto=format&fit=crop&q=60"
              alt="Healing Crystals"
              class="w-full h-48 object-cover rounded-2xl shadow-lg"
            />
          </div>
          <div class="space-y-4 pt-8">
            <img
              src="https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=800&auto=format&fit=crop&q=60"
              alt="Spiritual Items"
              class="w-full h-48 object-cover rounded-2xl shadow-lg"
            />
            <img
              src="https://images.unsplash.com/photo-1518683374e22-b0d303cb8501?w=800&auto=format&fit=crop&q=60"
              alt="Sacred Malas"
              class="w-full h-64 object-cover rounded-2xl shadow-lg"
            />
          </div>

          <!-- Floating Badge -->
          <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-white rounded-2xl p-4 shadow-2xl border border-gray-100 animate-float">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center">
                <span class="text-2xl font-bold text-white">10+</span>
              </div>
              <div>
                <p class="font-bold text-gray-900">Years of</p>
                <p class="text-sm text-gray-600">Experience</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
//
</script>

<style scoped>
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

@keyframes float {
  0%, 100% {
    transform: translate(-50%, 0);
  }
  50% {
    transform: translate(-50%, -10px);
  }
}

.animate-fade-in-up {
  animation: fade-in-up 1s ease-out;
}

.animation-delay-300 {
  animation-delay: 300ms;
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}
</style>
