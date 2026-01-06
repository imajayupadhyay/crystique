<template>
  <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <!-- Section Title -->
      <div class="text-center mb-12">
        <h2 class="text-2xl md:text-3xl tracking-[0.2em] font-serif text-gray-900 uppercase">
          OUR CATEGORIES
        </h2>
      </div>

      <!-- Category Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Healing Crystals -->
        <Link href="/products/crystals" class="group relative overflow-hidden aspect-[4/3] cursor-pointer">
          <img
            src="https://images.unsplash.com/photo-1612528443702-f6741f70a049?w=600&h=450&fit=crop"
            alt="Healing Crystals"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          />
          <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
          <div class="absolute bottom-6 left-6">
            <p class="text-white text-xs tracking-[0.2em] uppercase font-medium flex items-center">
              HEALING CRYSTALS
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </p>
          </div>
        </Link>

        <!-- Jaap Mala -->
        <Link href="/products/jaap-mala" class="group relative overflow-hidden aspect-[4/3] cursor-pointer">
          <img
            src="https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=600&h=450&fit=crop"
            alt="Jaap Mala"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          />
          <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
          <div class="absolute bottom-6 left-6">
            <p class="text-white text-xs tracking-[0.2em] uppercase font-medium flex items-center">
              JAAP MALA
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </p>
          </div>
        </Link>

        <!-- Jewelry -->
        <Link href="/products/jewelry" class="group relative overflow-hidden aspect-[4/3] cursor-pointer">
          <img
            src="https://images.unsplash.com/photo-1611652022419-a9419f74343a?w=600&h=450&fit=crop"
            alt="Jewelry"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          />
          <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
          <div class="absolute bottom-6 left-6">
            <p class="text-white text-xs tracking-[0.2em] uppercase font-medium flex items-center">
              JEWELRY
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </p>
          </div>
        </Link>

        <!-- Crystal Geodes -->
        <Link href="/products" class="group relative overflow-hidden aspect-[4/3] cursor-pointer">
          <img
            src="https://images.unsplash.com/photo-1518281361980-b26bfd556770?w=600&h=450&fit=crop"
            alt="Crystal Geodes"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          />
          <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
          <div class="absolute bottom-6 left-6">
            <p class="text-white text-xs tracking-[0.2em] uppercase font-medium flex items-center">
              CRYSTAL GEODES
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </p>
          </div>
        </Link>

        <!-- Meditation Tools -->
        <Link href="/products" class="group relative overflow-hidden aspect-[4/3] cursor-pointer">
          <img
            src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=600&h=450&fit=crop"
            alt="Meditation Tools"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          />
          <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
          <div class="absolute bottom-6 left-6">
            <p class="text-white text-xs tracking-[0.2em] uppercase font-medium flex items-center">
              MEDITATION TOOLS
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </p>
          </div>
        </Link>

        <!-- Home Decor -->
        <Link href="/products" class="group relative overflow-hidden aspect-[4/3] cursor-pointer">
          <img
            src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?w=600&h=450&fit=crop"
            alt="Home Decor"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          />
          <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
          <div class="absolute bottom-6 left-6">
            <p class="text-white text-xs tracking-[0.2em] uppercase font-medium flex items-center">
              HOME DECOR
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </p>
          </div>
        </Link>
      </div>
    </div>
  </section>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  products: {
    type: Array,
    default: () => [],
  },
});
</script>

<style scoped>
/* Clean design - no additional styles needed */
</style>
