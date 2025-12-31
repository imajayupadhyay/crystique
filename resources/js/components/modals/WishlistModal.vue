<template>
  <!-- Modal Overlay -->
  <transition
    enter-active-class="transition-opacity duration-300"
    enter-from-class="opacity-0"
    enter-to-class="opacity-100"
    leave-active-class="transition-opacity duration-200"
    leave-from-class="opacity-100"
    leave-to-class="opacity-0"
  >
    <div
      v-if="isWishlistOpen"
      class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[100]"
      @click="closeWishlistModal"
    ></div>
  </transition>

  <!-- Modal Sidebar -->
  <transition
    enter-active-class="transition-transform duration-300 ease-out"
    enter-from-class="translate-x-full"
    enter-to-class="translate-x-0"
    leave-active-class="transition-transform duration-200 ease-in"
    leave-from-class="translate-x-0"
    leave-to-class="translate-x-full"
  >
    <div
      v-if="isWishlistOpen"
      class="fixed top-0 right-0 h-screen w-full sm:w-[450px] bg-white shadow-2xl z-[101] flex flex-col"
    >
      <!-- Header -->
      <div class="flex items-center justify-between p-6 border-b border-gray-200">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </div>
          <div>
            <h2 class="text-xl font-bold text-gray-900">My Wishlist</h2>
            <p class="text-sm text-gray-500">{{ wishlistCount }} {{ wishlistCount === 1 ? 'item' : 'items' }}</p>
          </div>
        </div>
        <button
          @click="closeWishlistModal"
          class="p-2 rounded-lg hover:bg-gray-100 transition-colors"
        >
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Wishlist Items -->
      <div class="flex-1 overflow-y-auto p-6">
        <!-- Empty State -->
        <div v-if="wishlistItems.length === 0" class="flex flex-col items-center justify-center h-full text-center py-12">
          <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-gray-900 mb-2">Your wishlist is empty</h3>
          <p class="text-gray-600 mb-6">Save your favorite items for later!</p>
          <button
            @click="closeWishlistModal"
            class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all"
          >
            Browse Products
          </button>
        </div>

        <!-- Wishlist Items List -->
        <div v-else class="space-y-4">
          <div
            v-for="item in wishlistItems"
            :key="item.id"
            class="flex gap-4 bg-gray-50 rounded-xl p-4 group hover:shadow-md transition-all"
          >
            <!-- Product Image -->
            <Link :href="`/products/${item.categorySlug}/${item.slug}`" @click="closeWishlistModal" class="flex-shrink-0">
              <img
                :src="item.image"
                :alt="item.name"
                class="w-20 h-20 object-cover rounded-lg"
              />
              <!-- Stock Badge -->
              <div v-if="!item.inStock" class="absolute top-2 left-2 px-2 py-1 bg-red-500 text-white text-xs font-semibold rounded-full">
                Out of Stock
              </div>
            </Link>

            <!-- Product Info -->
            <div class="flex-1 min-w-0">
              <Link :href="`/products/${item.categorySlug}/${item.slug}`" @click="closeWishlistModal">
                <h3 class="font-semibold text-gray-900 mb-1 hover:text-purple-600 transition-colors line-clamp-2">
                  {{ item.name }}
                </h3>
              </Link>
              <p class="text-sm text-gray-600 mb-2">{{ item.category }}</p>
              <div class="flex items-center justify-between">
                <div>
                  <span class="text-lg font-bold text-purple-600">${{ item.price.toFixed(2) }}</span>
                  <span v-if="item.originalPrice" class="text-sm text-gray-400 line-through ml-2">
                    ${{ item.originalPrice.toFixed(2) }}
                  </span>
                </div>

                <!-- Add to Cart Button -->
                <button
                  v-if="item.inStock"
                  @click="moveToCart(item)"
                  class="px-3 py-1.5 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-sm font-semibold rounded-lg hover:shadow-lg transition-all"
                >
                  Add to Cart
                </button>
                <span v-else class="text-sm text-red-500 font-semibold">
                  Unavailable
                </span>
              </div>

              <!-- Rating -->
              <div class="flex items-center gap-1 mt-2">
                <div class="flex items-center">
                  <svg
                    v-for="star in 5"
                    :key="star"
                    class="w-3 h-3"
                    :class="star <= Math.floor(item.rating) ? 'text-yellow-400' : 'text-gray-300'"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <span class="text-xs text-gray-600">({{ item.reviews }})</span>
              </div>
            </div>

            <!-- Remove Button -->
            <button
              @click="removeFromWishlist(item.id)"
              class="flex-shrink-0 w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center transition-colors opacity-0 group-hover:opacity-100"
            >
              <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Footer Actions -->
      <div v-if="wishlistItems.length > 0" class="border-t border-gray-200 p-6 bg-gray-50">
        <div class="space-y-3">
          <button
            @click="addAllToCart"
            class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold shadow-lg hover:shadow-xl transition-all hover:scale-105 active:scale-95"
          >
            Add All to Cart
          </button>
          <button
            @click="closeWishlistModal"
            class="w-full px-6 py-3 border-2 border-purple-600 text-purple-600 rounded-xl font-bold hover:bg-purple-50 transition-all"
          >
            Continue Browsing
          </button>
        </div>
      </div>
    </div>
  </transition>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { useWishlist } from '../../composables/useWishlist';
import { useCart } from '../../composables/useCart';

const {
  wishlistItems,
  isWishlistOpen,
  wishlistCount,
  closeWishlistModal,
  removeFromWishlist,
} = useWishlist();

const { addToCart, openCart } = useCart();

const moveToCart = (item) => {
  addToCart(item, 1);
  removeFromWishlist(item.id);
};

const addAllToCart = () => {
  wishlistItems.value.forEach(item => {
    if (item.inStock) {
      addToCart(item, 1);
    }
  });
  closeWishlistModal();
  openCart();
};
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
