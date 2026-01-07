<template>
  <section class="relative overflow-hidden pb-20" style="background-color: #ddd9ce;">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Text Content -->
        <div class="space-y-6">
          <p class="text-xs tracking-[0.2em] uppercase text-gray-700">
            About Crystique
          </p>

          <h1 class="text-5xl md:text-6xl font-serif text-gray-900 leading-tight">
            Where Ancient Wisdom Meets Modern Living
          </h1>

          <p class="text-xl text-gray-600 leading-relaxed">
            We are passionate curators of authentic healing crystals, sacred spiritual items, and timeless antiques.
            Each piece in our collection carries its own unique energy and story.
          </p>

          <div class="flex flex-wrap gap-4 pt-4">
            <div class="flex items-center gap-3 px-6 py-3 border border-gray-300">
              <div class="w-10 h-10 border border-gray-300 flex items-center justify-center">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <div>
                <p class="font-medium text-gray-900 text-sm">100% Authentic</p>
                <p class="text-xs text-gray-600">Certified Products</p>
              </div>
            </div>

            <div class="flex items-center gap-3 px-6 py-3 border border-gray-300">
              <div class="w-10 h-10 border border-gray-300 flex items-center justify-center">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                </svg>
              </div>
              <div>
                <p class="font-medium text-gray-900 text-sm">Expert Curated</p>
                <p class="text-xs text-gray-600">Handpicked Items</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Image Grid -->
        <div class="relative grid grid-cols-2 gap-4">
          <div class="space-y-4">
            <img
              src="https://images.unsplash.com/photo-1608481337062-4093bf3ed404?w=800&auto=format&fit=crop&q=60"
              alt="Crystal Collection"
              class="w-full h-64 object-cover"
            />
            <img
              src="https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800&auto=format&fit=crop&q=60"
              alt="Healing Crystals"
              class="w-full h-48 object-cover"
            />
          </div>
          <div class="space-y-4 pt-8">
            <img
              src="https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=800&auto=format&fit=crop&q=60"
              alt="Spiritual Items"
              class="w-full h-48 object-cover"
            />
            <img
              src="https://images.unsplash.com/photo-1518683374e22-b0d303cb8501?w=800&auto=format&fit=crop&q=60"
              alt="Sacred Malas"
              class="w-full h-64 object-cover"
            />
          </div>

          <!-- Floating Badge -->
          <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-white p-4 border border-gray-300">
            <div class="flex items-center gap-4">
              <div class="w-14 h-14 border border-gray-300 flex items-center justify-center">
                <span class="text-2xl font-bold text-gray-900">10+</span>
              </div>
              <div>
                <p class="font-medium text-gray-900">Years of</p>
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
/* Clean design - no additional styles needed */
</style>
