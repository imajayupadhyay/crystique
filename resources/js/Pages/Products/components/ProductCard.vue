<template>
  <Link :href="`/products/${product.categorySlug || 'crystals'}/${product.slug || product.id}`" class="group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 block">
    <!-- Product Image -->
    <div class="relative overflow-hidden aspect-square bg-gray-100">
      <img
        :src="product.image"
        :alt="product.name"
        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
      />

      <!-- Badge -->
      <div v-if="product.badge" class="absolute top-4 left-4">
        <span class="px-3 py-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-xs font-semibold rounded-full shadow-lg">
          {{ product.badge }}
        </span>
      </div>

      <!-- Stock Status -->
      <div v-if="!product.inStock" class="absolute top-4 right-4">
        <span class="px-3 py-1 bg-red-500 text-white text-xs font-semibold rounded-full shadow-lg">
          Out of Stock
        </span>
      </div>

      <!-- Quick Actions -->
      <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <div class="flex gap-2">
          <button @click.prevent="addToWishlist" class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-purple-600 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </button>
          <button @click.prevent="quickView" class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-purple-600 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Product Info -->
    <div class="p-5">
      <!-- Category -->
      <p class="text-sm text-purple-600 font-semibold mb-2">{{ product.category }}</p>

      <!-- Product Name -->
      <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-600 transition-colors">
        {{ product.name }}
      </h3>

      <!-- Rating -->
      <div class="flex items-center gap-2 mb-3">
        <div class="flex items-center">
          <svg
            v-for="star in 5"
            :key="star"
            class="w-4 h-4"
            :class="star <= Math.floor(product.rating) ? 'text-yellow-400' : 'text-gray-300'"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
        </div>
        <span class="text-sm text-gray-600">({{ product.reviews }})</span>
      </div>

      <!-- Price and Add to Cart -->
      <div class="flex items-center justify-between">
        <div>
          <div class="flex items-baseline gap-2">
            <span class="text-2xl font-bold text-gray-900">₹{{ product.price }}</span>
            <span v-if="product.originalPrice" class="text-sm text-gray-400 line-through">₹{{ product.originalPrice }}</span>
          </div>
        </div>
        <button
          @click.prevent="addToCart"
          :disabled="!product.inStock"
          class="px-4 py-2 rounded-lg font-semibold transition-all"
          :class="product.inStock
            ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white hover:shadow-lg hover:scale-105'
            : 'bg-gray-200 text-gray-400 cursor-not-allowed'"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </button>
      </div>
    </div>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { useCart } from '../../../composables/useCart';
import { useWishlist } from '../../../composables/useWishlist';

const props = defineProps({
  product: {
    type: Object,
    required: true,
  },
});

// Cart and Wishlist
const { addToCart: addToCartAction, openCart } = useCart();
const { toggleWishlist } = useWishlist();

const addToWishlist = () => {
  toggleWishlist(props.product);
};

const quickView = () => {
  console.log('Quick view');
  // Quick view functionality - can be implemented later
};

const addToCart = () => {
  addToCartAction(props.product, 1);
  openCart();
};
</script>
