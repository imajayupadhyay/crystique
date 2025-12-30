<template>
  <section id="products" class="py-20 bg-gradient-to-b from-white to-purple-50">
    <div class="container mx-auto px-6">
      <!-- Section Header -->
      <div class="text-center mb-16 space-y-4">
        <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">Our Collection</span>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
          Featured <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Products</span>
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
          Handpicked crystals and spiritual items to enhance your journey
        </p>
      </div>

      <!-- Products Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div
          v-for="(product, index) in products"
          :key="index"
          class="group cursor-pointer"
        >
          <!-- Product Card -->
          <div class="relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <!-- Product Image -->
            <div class="relative overflow-hidden aspect-square">
              <img
                :src="product.image"
                :alt="product.name"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
              />

              <!-- Overlay on Hover -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <div class="absolute bottom-4 left-4 right-4 flex gap-2">
                  <button class="flex-1 bg-white/90 backdrop-blur-sm text-gray-900 py-2 rounded-lg font-semibold hover:bg-white transition-all">
                    Add to Cart
                  </button>
                  <button class="p-2 bg-white/90 backdrop-blur-sm rounded-lg hover:bg-white transition-all">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                  </button>
                </div>
              </div>

              <!-- Badge -->
              <div v-if="product.badge" class="absolute top-4 right-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                {{ product.badge }}
              </div>

              <!-- Wishlist Icon -->
              <button class="absolute top-4 left-4 p-2 bg-white/80 backdrop-blur-sm rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
              </button>
            </div>

            <!-- Product Info -->
            <div class="p-6 space-y-3">
              <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-purple-600 uppercase tracking-wider">{{ product.category }}</span>
                <div class="flex items-center space-x-1">
                  <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <span class="text-sm text-gray-600">{{ product.rating }}</span>
                </div>
              </div>

              <h3 class="font-semibold text-lg text-gray-900 group-hover:text-purple-600 transition-colors">
                {{ product.name }}
              </h3>

              <p class="text-sm text-gray-600 line-clamp-2">
                {{ product.description }}
              </p>

              <div class="flex items-center justify-between pt-2">
                <div>
                  <span class="text-2xl font-bold text-gray-900">${{ product.price }}</span>
                  <span v-if="product.originalPrice" class="text-sm text-gray-400 line-through ml-2">${{ product.originalPrice }}</span>
                </div>
                <div class="flex items-center space-x-1 text-green-600 text-sm font-medium">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                  <span>In Stock</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- View All Button -->
      <div class="text-center mt-12">
        <button class="px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full font-semibold hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
          View All Products →
        </button>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';

const products = ref([
  {
    name: 'Amethyst Crystal',
    category: 'Crystals',
    description: 'Natural purple amethyst for peace and spiritual growth',
    price: 45.99,
    originalPrice: 59.99,
    rating: 4.8,
    badge: 'Best Seller',
    image: 'https://plus.unsplash.com/premium_photo-1682309734214-c04dd64e87b4?w=800&auto=format&fit=crop&q=60'
  },
  {
    name: 'Rudraksha Mala',
    category: 'Jaap Mala',
    description: 'Authentic 108 beads rudraksha mala for meditation',
    price: 89.99,
    rating: 4.9,
    badge: 'New',
    image: 'https://images.unsplash.com/photo-1607015640784-fc890cde1ba4?w=800&auto=format&fit=crop&q=60'
  },
  {
    name: 'Rose Quartz Heart',
    category: 'Crystals',
    description: 'Heart-shaped rose quartz for love and compassion',
    price: 32.99,
    originalPrice: 42.99,
    rating: 4.7,
    image: 'https://images.unsplash.com/photo-1590927157296-ba4bb1c9654e?w=800&auto=format&fit=crop&q=60'
  },
  {
    name: 'Antique Singing Bowl',
    category: 'Antiques',
    description: 'Handcrafted Tibetan singing bowl for meditation',
    price: 125.00,
    rating: 5.0,
    badge: 'Limited',
    image: 'https://images.unsplash.com/photo-1545652985-5edd365b12eb?w=800&auto=format&fit=crop&q=60'
  },
  {
    name: 'Clear Quartz Point',
    category: 'Crystals',
    description: 'Large clear quartz point for energy amplification',
    price: 55.99,
    rating: 4.6,
    image: 'https://images.unsplash.com/photo-1608481337062-4093bf3ed404?w=800&auto=format&fit=crop&q=60'
  },
  {
    name: 'Tulsi Mala',
    category: 'Jaap Mala',
    description: 'Sacred tulsi wood mala beads for chanting',
    price: 38.99,
    rating: 4.8,
    image: 'https://images.unsplash.com/photo-1603048588665-791ca8aea617?w=800&auto=format&fit=crop&q=60'
  },
  {
    name: 'Citrine Cluster',
    category: 'Crystals',
    description: 'Natural citrine cluster for abundance and prosperity',
    price: 78.00,
    originalPrice: 95.00,
    rating: 4.9,
    badge: 'Sale',
    image: 'https://images.unsplash.com/photo-1518281420975-50db6e5d0a97?w=800&auto=format&fit=crop&q=60'
  },
  {
    name: 'Brass Incense Holder',
    category: 'Antiques',
    description: 'Vintage brass incense holder with intricate design',
    price: 42.50,
    rating: 4.7,
    image: 'https://images.unsplash.com/photo-1604335399105-a0c585fd81a1?w=800&auto=format&fit=crop&q=60'
  }
]);
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
