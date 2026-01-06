<template>
  <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
      <!-- Section Title -->
      <div class="mb-8">
        <h2 class="text-xl tracking-[0.2em] font-serif text-gray-900 uppercase mb-6">
          OUR FAVORITES
        </h2>

        <!-- Tabs -->
        <div class="flex flex-wrap gap-4 mb-12">
          <button
            v-for="(tab, index) in tabs"
            :key="index"
            @click="activeTab = tab"
            class="px-6 py-3 text-sm tracking-wide transition-all duration-300"
            :class="activeTab === tab
              ? 'bg-[#ddd9ce] text-gray-900'
              : 'bg-white text-gray-700 hover:bg-gray-100'"
          >
            {{ tab }}
          </button>
        </div>
      </div>

      <!-- Products Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <Link
          v-for="(product, index) in displayedProducts"
          :key="index"
          :href="`/products/${product.categorySlug}/${product.slug}`"
          class="group bg-white"
        >
          <!-- Product Image -->
          <div class="relative overflow-hidden aspect-square mb-4">
            <img
              :src="product.image"
              :alt="product.name"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
            />
            <!-- Badge -->
            <div
              v-if="product.badge"
              class="absolute top-4 left-4 bg-[#b8956a] text-white px-3 py-1 text-xs tracking-wider uppercase"
            >
              {{ product.badge }}
            </div>
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

      <!-- View All Button -->
      <div class="text-center">
        <Link href="/crystals">
          <button class="px-8 py-3 bg-gray-800 text-white text-xs tracking-[0.15em] uppercase hover:bg-gray-700 transition-all duration-300">
            VIEW ALL
          </button>
        </Link>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  products: {
    type: Array,
    default: () => [],
  },
});

// Tabs
const tabs = ['Tumbled Stones', 'Palm Stones', 'Gemstone Hearts'];
const activeTab = ref('Tumbled Stones');

// Display products based on active tab
const displayedProducts = computed(() => {
  if (!props.products || props.products.length === 0) {
    return [];
  }

  // Get all products and limit to 4 per tab
  let filtered = [];

  if (activeTab.value === 'Tumbled Stones') {
    // Show crystal products for Tumbled Stones
    filtered = props.products.filter(p => p.categorySlug === 'crystals').slice(0, 4);
  } else if (activeTab.value === 'Palm Stones') {
    // Show jaap mala products for Palm Stones
    filtered = props.products.filter(p => p.categorySlug === 'jaap-mala').slice(0, 4);
    // If not enough, add some crystals
    if (filtered.length < 4) {
      const crystals = props.products.filter(p => p.categorySlug === 'crystals').slice(0, 4 - filtered.length);
      filtered = [...filtered, ...crystals];
    }
  } else if (activeTab.value === 'Gemstone Hearts') {
    // Show jewelry products for Gemstone Hearts
    filtered = props.products.filter(p => p.categorySlug === 'jewelry').slice(0, 4);
    // If not enough, add some crystals
    if (filtered.length < 4) {
      const crystals = props.products.filter(p => p.categorySlug === 'crystals').slice(0, 4 - filtered.length);
      filtered = [...filtered, ...crystals];
    }
  }

  // Ensure we always show 4 products
  if (filtered.length < 4 && props.products.length >= 4) {
    filtered = props.products.slice(0, 4);
  }

  return filtered;
});
</script>

<style scoped>
/* Clean design - no additional styles needed */
</style>
