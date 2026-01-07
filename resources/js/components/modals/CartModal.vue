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
      v-if="isCartOpen"
      class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[100]"
      @click="closeCart"
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
      v-if="isCartOpen"
      class="fixed top-0 right-0 h-screen w-full sm:w-[450px] bg-white shadow-2xl z-[101] flex flex-col"
    >
      <!-- Header -->
      <div class="flex items-center justify-between p-6 border-b border-gray-300">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 border border-gray-300 flex items-center justify-center">
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div>
            <h2 class="text-xl font-medium text-gray-900 tracking-wide uppercase">Shopping Cart</h2>
            <p class="text-sm text-gray-500">{{ cartCount }} {{ cartCount === 1 ? 'item' : 'items' }}</p>
          </div>
        </div>
        <button
          @click="closeCart"
          class="p-2 hover:bg-gray-100 transition-colors"
        >
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Cart Items -->
      <div class="flex-1 overflow-y-auto p-6">
        <!-- Empty State -->
        <div v-if="cartItems.length === 0" class="flex flex-col items-center justify-center h-full text-center py-12">
          <div class="w-24 h-24 border border-gray-300 flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
          </div>
          <h3 class="text-lg font-medium text-gray-900 mb-2 tracking-wide uppercase">Your cart is empty</h3>
          <p class="text-gray-600 mb-6">Add some products to get started!</p>
          <button
            @click="closeCart"
            class="px-6 py-3 bg-gray-900 text-white text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-800 transition-colors"
          >
            Continue Shopping
          </button>
        </div>

        <!-- Cart Items List -->
        <div v-else class="space-y-4">
          <div
            v-for="item in cartItems"
            :key="item.id"
            class="flex gap-4 bg-gray-50 border border-gray-300 p-4 group hover:border-gray-400 transition-all"
          >
            <!-- Product Image -->
            <Link :href="`/products/${item.categorySlug}/${item.slug}`" @click="closeCart" class="flex-shrink-0">
              <img
                :src="item.image"
                :alt="item.name"
                class="w-20 h-20 object-cover"
              />
            </Link>

            <!-- Product Info -->
            <div class="flex-1 min-w-0">
              <Link :href="`/products/${item.categorySlug}/${item.slug}`" @click="closeCart">
                <h3 class="font-medium text-gray-900 mb-1 hover:text-gray-700 transition-colors line-clamp-1">
                  {{ item.name }}
                </h3>
              </Link>
              <p class="text-sm text-gray-600 mb-2">{{ item.category }}</p>
              <div class="flex items-center justify-between">
                <span class="text-lg font-medium text-gray-900">₹{{ item.price }}</span>

                <!-- Quantity Controls -->
                <div class="flex items-center gap-2">
                  <button
                    @click="updateQuantity(item.id, item.quantity - 1)"
                    class="w-7 h-7 bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors"
                  >
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                  </button>
                  <span class="w-8 text-center font-medium">{{ item.quantity }}</span>
                  <button
                    @click="updateQuantity(item.id, item.quantity + 1)"
                    class="w-7 h-7 bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors"
                  >
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <!-- Remove Button -->
            <button
              @click="removeFromCart(item.id)"
              class="flex-shrink-0 w-8 h-8 hover:bg-gray-200 flex items-center justify-center transition-colors opacity-0 group-hover:opacity-100"
            >
              <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Footer with Totals and Checkout -->
      <div v-if="cartItems.length > 0" class="border-t border-gray-300 p-6 bg-gray-50">
        <!-- Totals -->
        <div class="space-y-3 mb-4">
          <div class="flex justify-between text-gray-600">
            <span>Subtotal</span>
            <span class="font-medium">₹{{ cartSubtotal }}</span>
          </div>
          <div class="flex justify-between text-gray-600">
            <span>Tax (10%)</span>
            <span class="font-medium">₹{{ cartTax }}</span>
          </div>
          <div class="flex justify-between text-gray-600">
            <span>Shipping</span>
            <span class="font-medium">
              {{ cartShipping === 0 ? 'FREE' : `₹${cartShipping}` }}
            </span>
          </div>
          <div v-if="cartTotal >= 2000" class="text-sm text-gray-900 font-medium">
            You qualified for free shipping!
          </div>
          <div v-else class="text-sm text-gray-500">
            Add ₹{{ 2000 - cartTotal }} more for free shipping
          </div>
          <div class="flex justify-between text-lg font-medium text-gray-900 pt-3 border-t border-gray-900">
            <span>Total</span>
            <span>₹{{ cartGrandTotal }}</span>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-3">
          <Link
            href="/cart"
            @click="closeCart"
            class="w-full px-6 py-3 bg-gray-900 text-white text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-800 transition-colors flex items-center justify-center"
          >
            View Cart
          </Link>
          <button
            @click="closeCart"
            class="w-full px-6 py-3 border border-gray-900 text-gray-900 text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-900 hover:text-white transition-colors"
          >
            Continue Shopping
          </button>
        </div>
      </div>
    </div>
  </transition>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { useCart } from '../../composables/useCart';

const {
  cartItems,
  isCartOpen,
  cartCount,
  cartSubtotal,
  cartTax,
  cartShipping,
  cartTotal,
  cartGrandTotal,
  closeCart,
  updateQuantity,
  removeFromCart,
} = useCart();
</script>

<style scoped>
.line-clamp-1 {
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
