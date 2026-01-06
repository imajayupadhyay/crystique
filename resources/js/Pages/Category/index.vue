<template>
  <div class="min-h-screen">
    <Head :title="`${categoryTitle} - Crystique`" />

    <!-- Header -->
    <Header />

    <!-- Hero Banner -->
    <section class="relative h-64 flex items-center justify-center overflow-hidden mt-24">
      <img
        :src="heroImage"
        alt="Category Banner"
        class="absolute inset-0 w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/40"></div>
      <div class="relative z-10 text-center text-white">
        <h1 class="text-3xl md:text-4xl tracking-[0.3em] font-serif uppercase mb-2">
          {{ categoryTitle }}
        </h1>
        <p class="text-sm tracking-[0.2em] uppercase">
          {{ subtitle }}
        </p>
      </div>
    </section>

    <!-- Products Section -->
    <section class="py-12 bg-gray-50">
      <div class="container mx-auto px-6">
        <!-- Toolbar -->
        <div class="flex items-center justify-between mb-8">
          <!-- View Toggle -->
          <div class="flex items-center gap-2">
            <button
              @click="viewMode = 'grid'"
              class="p-2 hover:bg-gray-200 transition-colors"
              :class="viewMode === 'grid' ? 'bg-gray-200' : ''"
            >
              <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 3h8v8H3V3zm10 0h8v8h-8V3zM3 13h8v8H3v-8zm10 0h8v8h-8v-8z"/>
              </svg>
            </button>
            <button
              @click="viewMode = 'list'"
              class="p-2 hover:bg-gray-200 transition-colors"
              :class="viewMode === 'list' ? 'bg-gray-200' : ''"
            >
              <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"/>
              </svg>
            </button>
          </div>

          <!-- Sort Dropdown -->
          <div>
            <select
              v-model="sortBy"
              class="px-4 py-2 text-sm border border-gray-300 focus:outline-none focus:border-gray-900 bg-white"
            >
              <option value="featured">SORT BY</option>
              <option value="price-low">Price: Low to High</option>
              <option value="price-high">Price: High to Low</option>
              <option value="name">Name: A to Z</option>
            </select>
          </div>
        </div>

        <!-- Products Grid -->
        <div
          v-if="viewMode === 'grid'"
          class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
        >
          <Link
            v-for="product in sortedProducts"
            :key="product.id"
            :href="`/${categorySlug}/${product.slug}`"
            class="group bg-white"
          >
            <!-- Product Image -->
            <div class="relative overflow-hidden aspect-square mb-4">
              <img
                :src="product.image"
                :alt="product.name"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              />
            </div>

            <!-- Product Info -->
            <div class="text-center px-2">
              <h3 class="text-sm text-gray-900 mb-2 hover:text-gray-600 transition-colors">
                {{ product.name }}
              </h3>

              <!-- Price -->
              <div class="flex items-center justify-center gap-2 mb-2">
                <span class="text-sm font-medium text-gray-900">
                  ₹{{ (product.price / 100).toFixed(2) }}
                </span>
                <span
                  v-if="product.originalPrice"
                  class="text-sm text-gray-400 line-through"
                >
                  ₹{{ (product.originalPrice / 100).toFixed(2) }}
                </span>
              </div>

              <!-- Rating -->
              <div class="flex items-center justify-center gap-1">
                <div class="flex items-center">
                  <svg
                    v-for="star in 5"
                    :key="star"
                    class="w-4 h-4"
                    :class="star <= Math.round(product.rating) ? 'text-orange-400' : 'text-gray-300'"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <span class="text-xs text-gray-500 ml-1">({{ product.reviews }})</span>
              </div>
            </div>
          </Link>
        </div>

        <!-- Products List View -->
        <div v-else class="space-y-6">
          <Link
            v-for="product in sortedProducts"
            :key="product.id"
            :href="`/${categorySlug}/${product.slug}`"
            class="group bg-white flex gap-6 p-6 hover:shadow-lg transition-shadow"
          >
            <!-- Product Image -->
            <div class="w-48 h-48 flex-shrink-0 overflow-hidden">
              <img
                :src="product.image"
                :alt="product.name"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              />
            </div>

            <!-- Product Info -->
            <div class="flex-1">
              <h3 class="text-lg text-gray-900 mb-2 hover:text-gray-600 transition-colors">
                {{ product.name }}
              </h3>
              <p class="text-sm text-gray-600 mb-4">{{ product.description }}</p>

              <!-- Price -->
              <div class="flex items-center gap-2 mb-2">
                <span class="text-lg font-medium text-gray-900">
                  ₹{{ (product.price / 100).toFixed(2) }}
                </span>
                <span
                  v-if="product.originalPrice"
                  class="text-sm text-gray-400 line-through"
                >
                  ₹{{ (product.originalPrice / 100).toFixed(2) }}
                </span>
              </div>

              <!-- Rating -->
              <div class="flex items-center gap-1">
                <div class="flex items-center">
                  <svg
                    v-for="star in 5"
                    :key="star"
                    class="w-4 h-4"
                    :class="star <= Math.round(product.rating) ? 'text-orange-400' : 'text-gray-300'"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <span class="text-xs text-gray-500 ml-1">({{ product.reviews }})</span>
              </div>
            </div>
          </Link>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';

const props = defineProps({
  category: {
    type: String,
    required: true,
  },
  products: {
    type: Array,
    default: () => [],
  },
});

const viewMode = ref('grid');
const sortBy = ref('featured');

// Category details
const categoryConfig = {
  crystals: {
    title: 'HEALING CRYSTALS',
    subtitle: 'BEST SELLERS',
    hero: 'https://images.unsplash.com/photo-1612528443702-f6741f70a049?w=1200&h=400&fit=crop',
  },
  'jaap-mala': {
    title: 'JAAP MALA',
    subtitle: 'SACRED BEADS',
    hero: 'https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=1200&h=400&fit=crop',
  },
  jewelry: {
    title: 'JEWELRY',
    subtitle: 'HANDCRAFTED DESIGNS',
    hero: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=1200&h=400&fit=crop',
  },
};

const categorySlug = computed(() => props.category);
const categoryTitle = computed(() => categoryConfig[props.category]?.title || 'PRODUCTS');
const subtitle = computed(() => categoryConfig[props.category]?.subtitle || '');
const heroImage = computed(() => categoryConfig[props.category]?.hero || '');

// Sorted products
const sortedProducts = computed(() => {
  let sorted = [...props.products];

  switch (sortBy.value) {
    case 'price-low':
      return sorted.sort((a, b) => a.price - b.price);
    case 'price-high':
      return sorted.sort((a, b) => b.price - a.price);
    case 'name':
      return sorted.sort((a, b) => a.name.localeCompare(b.name));
    default:
      return sorted;
  }
});
</script>

<style scoped>
/* Clean design - no additional styles needed */
</style>
