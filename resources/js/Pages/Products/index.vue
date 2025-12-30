<template>
  <div class="min-h-screen bg-white">
    <Head title="Products - Crystique" />

    <!-- Header -->
    <Header />

    <!-- Products Page Content -->
    <section class="pt-28 pb-20">
      <div class="container mx-auto px-6">
        <!-- Page Header -->
        <div class="mb-8">
          <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Our <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Collection</span>
          </h1>
          <p class="text-gray-600 text-lg">Discover authentic healing crystals and spiritual items</p>
        </div>

        <!-- Search and Sort Bar -->
        <div class="mb-8 flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
          <!-- Search -->
          <div class="w-full md:w-96 relative">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Search products..."
              class="w-full px-4 py-3 pl-12 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
            />
            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>

          <!-- Sort and View Toggle -->
          <div class="flex items-center gap-4">
            <!-- Sort -->
            <select
              v-model="sortBy"
              class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
            >
              <option value="featured">Featured</option>
              <option value="price-low">Price: Low to High</option>
              <option value="price-high">Price: High to Low</option>
              <option value="name">Name: A to Z</option>
              <option value="rating">Highest Rated</option>
            </select>

            <!-- Filter Toggle (Mobile) -->
            <button
              @click="filtersOpen = !filtersOpen"
              class="md:hidden px-4 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-semibold shadow-lg"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-8">
          <!-- Filters Sidebar -->
          <ProductFilters
            v-model:filters="filters"
            :class="filtersOpen ? 'block' : 'hidden lg:block'"
          />

          <!-- Products Grid -->
          <ProductGrid
            :products="filteredProducts"
            :loading="loading"
          />
        </div>
      </div>
    </section>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';
import ProductFilters from './components/ProductFilters.vue';
import ProductGrid from './components/ProductGrid.vue';

const searchQuery = ref('');
const sortBy = ref('featured');
const filtersOpen = ref(false);
const loading = ref(false);

const filters = ref({
  categories: [],
  priceRange: [0, 500],
  rating: 0,
  inStock: false,
});

// Mock products data
const products = ref([
  {
    id: 1,
    name: 'Amethyst Crystal',
    category: 'Crystals',
    price: 45.99,
    originalPrice: 59.99,
    rating: 4.8,
    reviews: 124,
    image: 'https://images.unsplash.com/photo-1596637754862-54a81dc4a2d2?w=800&auto=format&fit=crop&q=60',
    inStock: true,
    badge: 'Best Seller',
  },
  {
    id: 2,
    name: 'Rose Quartz Heart',
    category: 'Crystals',
    price: 32.99,
    rating: 4.9,
    reviews: 89,
    image: 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=800&auto=format&fit=crop&q=60',
    inStock: true,
    badge: 'New',
  },
  {
    id: 3,
    name: 'Rudraksha Mala',
    category: 'Jaap Mala',
    price: 78.99,
    rating: 5.0,
    reviews: 156,
    image: 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=800&auto=format&fit=crop&q=60',
    inStock: true,
  },
  {
    id: 4,
    name: 'Clear Quartz Point',
    category: 'Crystals',
    price: 28.99,
    rating: 4.7,
    reviews: 67,
    image: 'https://images.unsplash.com/photo-1518683374e22-b0d303cb8501?w=800&auto=format&fit=crop&q=60',
    inStock: true,
  },
  {
    id: 5,
    name: 'Tiger Eye Bracelet',
    category: 'Jewelry',
    price: 24.99,
    rating: 4.6,
    reviews: 92,
    image: 'https://images.unsplash.com/photo-1611652022419-a9419f74343a?w=800&auto=format&fit=crop&q=60',
    inStock: false,
  },
  {
    id: 6,
    name: 'Crystal Mala Beads',
    category: 'Jaap Mala',
    price: 89.99,
    rating: 4.8,
    reviews: 134,
    image: 'https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=800&auto=format&fit=crop&q=60',
    inStock: true,
  },
  {
    id: 7,
    name: 'Black Tourmaline',
    category: 'Crystals',
    price: 36.99,
    rating: 4.7,
    reviews: 78,
    image: 'https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800&auto=format&fit=crop&q=60',
    inStock: true,
  },
  {
    id: 8,
    name: 'Selenite Wand',
    category: 'Crystals',
    price: 42.99,
    rating: 4.9,
    reviews: 103,
    image: 'https://images.unsplash.com/photo-1584990347449-39b03b2f6021?w=800&auto=format&fit=crop&q=60',
    inStock: true,
    badge: 'Popular',
  },
]);

// Filtered products
const filteredProducts = computed(() => {
  let result = [...products.value];

  // Search filter
  if (searchQuery.value) {
    result = result.filter(product =>
      product.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
  }

  // Category filter
  if (filters.value.categories.length > 0) {
    result = result.filter(product =>
      filters.value.categories.includes(product.category)
    );
  }

  // Price range filter
  result = result.filter(product =>
    product.price >= filters.value.priceRange[0] &&
    product.price <= filters.value.priceRange[1]
  );

  // Rating filter
  if (filters.value.rating > 0) {
    result = result.filter(product => product.rating >= filters.value.rating);
  }

  // In stock filter
  if (filters.value.inStock) {
    result = result.filter(product => product.inStock);
  }

  // Sort
  switch (sortBy.value) {
    case 'price-low':
      result.sort((a, b) => a.price - b.price);
      break;
    case 'price-high':
      result.sort((a, b) => b.price - a.price);
      break;
    case 'name':
      result.sort((a, b) => a.name.localeCompare(b.name));
      break;
    case 'rating':
      result.sort((a, b) => b.rating - a.rating);
      break;
  }

  return result;
});
</script>
