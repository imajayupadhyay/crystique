<template>
  <section id="categories" class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <!-- Section Header -->
      <div class="text-center mb-16 space-y-4">
        <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">Explore</span>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
          Shop by <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Category</span>
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
          Find the perfect spiritual companion for your journey
        </p>
      </div>

      <!-- Categories Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div
          v-for="(category, index) in categories"
          :key="index"
          class="group relative overflow-hidden rounded-3xl cursor-pointer transform hover:scale-105 transition-all duration-500"
          :class="index === 0 ? 'lg:col-span-2 lg:row-span-2' : ''"
        >
          <!-- Background Image -->
          <div class="relative overflow-hidden" :class="index === 0 ? 'h-[600px]' : 'h-[280px]'">
            <img
              :src="category.image"
              :alt="category.name"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
            />
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
          </div>

          <!-- Glass Card Content -->
          <div class="absolute inset-0 flex flex-col justify-end p-8">
            <!-- Glass Effect Card -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
              <!-- Icon -->
              <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-4 transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                <component :is="category.icon" class="w-7 h-7 text-white" />
              </div>

              <!-- Category Name -->
              <h3 class="text-2xl font-bold text-white mb-2">
                {{ category.name }}
              </h3>

              <!-- Description -->
              <p class="text-gray-200 text-sm mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                {{ category.description }}
              </p>

              <!-- Items Count & Link -->
              <div class="flex items-center justify-between">
                <span class="text-white/80 text-sm">{{ category.items }} items</span>
                <span class="text-white font-semibold flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <span>Explore</span>
                  <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                  </svg>
                </span>
              </div>
            </div>
          </div>

          <!-- Hover Effects -->
          <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="bg-white/20 backdrop-blur-sm rounded-full p-3">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom CTA -->
      <div class="mt-16 text-center">
        <div class="inline-block bg-gradient-to-r from-purple-100 to-pink-100 rounded-3xl p-8 md:p-12">
          <div class="max-w-2xl mx-auto space-y-4">
            <h3 class="text-3xl font-bold text-gray-900">
              Not sure where to start?
            </h3>
            <p class="text-gray-600">
              Take our quick quiz to find the perfect crystal for your needs
            </p>
            <button class="px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full font-semibold hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
              Take the Quiz
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, h } from 'vue';

// Simple icon components
const CrystalIcon = () => h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24' }, [
  h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4' })
]);

const BeadsIcon = () => h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24' }, [
  h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7' })
]);

const AntiqueIcon = () => h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24' }, [
  h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10' })
]);

const HomeDecorIcon = () => h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24' }, [
  h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6' })
]);

const SpiritualIcon = () => h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24' }, [
  h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z' })
]);

const categories = ref([
  {
    name: 'Healing Crystals',
    description: 'Discover the power of natural crystals for healing, protection, and spiritual growth',
    items: 250,
    icon: CrystalIcon,
    image: 'https://images.unsplash.com/photo-1608481337062-4093bf3ed404?w=1200&auto=format&fit=crop&q=60'
  },
  {
    name: 'Jaap Mala',
    description: 'Authentic prayer beads for meditation and spiritual practice',
    items: 85,
    icon: BeadsIcon,
    image: 'https://images.unsplash.com/photo-1607015640784-fc890cde1ba4?w=600&auto=format&fit=crop&q=60'
  },
  {
    name: 'Antique Items',
    description: 'Rare spiritual antiques with rich history and energy',
    items: 120,
    icon: AntiqueIcon,
    image: 'https://images.unsplash.com/photo-1545652985-5edd365b12eb?w=600&auto=format&fit=crop&q=60'
  },
  {
    name: 'Home Decor',
    description: 'Beautiful spiritual decor to energize your space',
    items: 180,
    icon: HomeDecorIcon,
    image: 'https://images.unsplash.com/photo-1604335399105-a0c585fd81a1?w=600&auto=format&fit=crop&q=60'
  },
  {
    name: 'Spiritual Tools',
    description: 'Essential tools for your spiritual journey and practices',
    items: 95,
    icon: SpiritualIcon,
    image: 'https://images.unsplash.com/photo-1512428813834-c702c7702b78?w=600&auto=format&fit=crop&q=60'
  }
]);
</script>

<style scoped>
/* Additional custom styles if needed */
</style>
