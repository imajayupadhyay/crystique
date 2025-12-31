<template>
  <div class="min-h-screen bg-white">
    <Head title="Shopping Cart - Crystique" />

    <!-- Header -->
    <Header />

    <!-- Main Content -->
    <div class="pt-28 pb-20">
      <div class="container mx-auto px-6">
        <!-- Page Header -->
        <div class="mb-8">
          <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Shopping <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Cart</span>
          </h1>
          <p class="text-gray-600 text-lg">{{ cartCount }} {{ cartCount === 1 ? 'item' : 'items' }} in your cart</p>
        </div>

        <!-- Empty Cart State -->
        <div v-if="cartItems.length === 0" class="flex flex-col items-center justify-center py-20">
          <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mb-6">
            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
          </div>
          <h2 class="text-2xl font-bold text-gray-900 mb-3">Your cart is empty</h2>
          <p class="text-gray-600 mb-8 max-w-md text-center">
            Looks like you haven't added any items to your cart yet. Start shopping to fill it up!
          </p>
          <Link href="/products" class="px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold shadow-lg hover:shadow-xl transition-all hover:scale-105">
            Start Shopping
          </Link>
        </div>

        <!-- Cart with Items -->
        <div v-else class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <!-- Cart Items -->
          <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
              <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900">Cart Items</h2>
              </div>

              <div class="divide-y divide-gray-200">
                <div
                  v-for="item in cartItems"
                  :key="item.id"
                  class="p-6 hover:bg-gray-50 transition-colors"
                >
                  <div class="flex gap-6">
                    <!-- Product Image -->
                    <Link :href="`/products/${item.categorySlug}/${item.slug}`" class="flex-shrink-0">
                      <img
                        :src="item.image"
                        :alt="item.name"
                        class="w-32 h-32 object-cover rounded-xl hover:scale-105 transition-transform"
                      />
                    </Link>

                    <!-- Product Details -->
                    <div class="flex-1 min-w-0">
                      <div class="flex justify-between items-start mb-2">
                        <div>
                          <Link :href="`/products/${item.categorySlug}/${item.slug}`">
                            <h3 class="text-lg font-bold text-gray-900 hover:text-purple-600 transition-colors line-clamp-2">
                              {{ item.name }}
                            </h3>
                          </Link>
                          <p class="text-sm text-gray-600 mt-1">{{ item.category }}</p>
                          <div v-if="item.badge" class="inline-block mt-2 px-3 py-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-xs font-semibold rounded-full">
                            {{ item.badge }}
                          </div>
                        </div>

                        <!-- Price (Mobile) -->
                        <div class="lg:hidden text-right">
                          <div class="text-xl font-bold text-purple-600">₹{{ item.price * item.quantity }}</div>
                          <div class="text-sm text-gray-500">₹{{ item.price }} each</div>
                        </div>
                      </div>

                      <!-- Quantity and Actions -->
                      <div class="flex items-center justify-between mt-4">
                        <!-- Quantity Controls -->
                        <div class="flex items-center gap-3">
                          <span class="text-sm text-gray-600 font-medium">Quantity:</span>
                          <div class="flex items-center border-2 border-gray-200 rounded-xl overflow-hidden">
                            <button
                              @click="updateQuantity(item.id, item.quantity - 1)"
                              class="px-4 py-2 hover:bg-gray-100 transition-colors"
                            >
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                              </svg>
                            </button>
                            <input
                              :value="item.quantity"
                              @input="updateQuantity(item.id, parseInt($event.target.value) || 1)"
                              type="number"
                              min="1"
                              class="w-16 text-center border-x-2 border-gray-200 py-2 focus:outline-none font-semibold"
                            />
                            <button
                              @click="updateQuantity(item.id, item.quantity + 1)"
                              class="px-4 py-2 hover:bg-gray-100 transition-colors"
                            >
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                              </svg>
                            </button>
                          </div>
                        </div>

                        <!-- Price (Desktop) -->
                        <div class="hidden lg:block text-right">
                          <div class="text-xl font-bold text-purple-600">₹{{ item.price * item.quantity }}</div>
                          <div class="text-sm text-gray-500">₹{{ item.price }} each</div>
                        </div>
                      </div>

                      <!-- Remove Button -->
                      <button
                        @click="removeFromCart(item.id)"
                        class="mt-4 flex items-center gap-2 text-red-600 hover:text-red-700 font-medium transition-colors"
                      >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Remove
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Continue Shopping -->
            <div class="mt-6">
              <Link href="/products" class="inline-flex items-center gap-2 text-purple-600 hover:text-purple-700 font-semibold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Continue Shopping
              </Link>
            </div>
          </div>

          <!-- Order Summary -->
          <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl border-2 border-purple-200 p-6 sticky top-28">
              <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>

              <div class="space-y-4 mb-6">
                <div class="flex justify-between text-gray-700">
                  <span>Subtotal ({{ cartCount }} items)</span>
                  <span class="font-semibold">₹{{ cartSubtotal }}</span>
                </div>
                <div class="flex justify-between text-gray-700">
                  <span>Tax (10%)</span>
                  <span class="font-semibold">₹{{ cartTax }}</span>
                </div>
                <div class="flex justify-between text-gray-700">
                  <span>Shipping</span>
                  <span class="font-semibold">
                    {{ cartShipping === 0 ? 'FREE' : `₹${cartShipping}` }}
                  </span>
                </div>

                <!-- Free Shipping Progress -->
                <div v-if="cartTotal < 2000" class="pt-4 border-t border-purple-200">
                  <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Free shipping at ₹2000</span>
                    <span>₹{{ 2000 - cartTotal }} away</span>
                  </div>
                  <div class="w-full bg-gray-200 rounded-full h-2">
                    <div
                      class="bg-gradient-to-r from-purple-600 to-pink-600 h-2 rounded-full transition-all duration-300"
                      :style="{ width: `${Math.min((cartTotal / 2000) * 100, 100)}%` }"
                    ></div>
                  </div>
                </div>
                <div v-else class="pt-4 border-t border-purple-200">
                  <div class="flex items-center gap-2 text-green-600 font-semibold">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    You qualified for free shipping!
                  </div>
                </div>

                <div class="flex justify-between text-xl font-bold text-gray-900 pt-4 border-t-2 border-purple-300">
                  <span>Total</span>
                  <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                    ₹{{ cartGrandTotal }}
                  </span>
                </div>
              </div>

              <!-- Checkout Button -->
              <Link
                href="/checkout"
                class="w-full px-6 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold shadow-lg hover:shadow-2xl transition-all hover:scale-105 active:scale-95 flex items-center justify-center gap-2 mb-3"
              >
                <span>Proceed to Checkout</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
              </Link>

              <!-- Security Badge -->
              <div class="flex items-center justify-center gap-2 text-sm text-gray-600">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Secure Checkout
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';
import { useCart } from '../../composables/useCart';

const {
  cartItems,
  cartCount,
  cartSubtotal,
  cartTax,
  cartShipping,
  cartTotal,
  cartGrandTotal,
  updateQuantity,
  removeFromCart,
} = useCart();
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Hide number input arrows */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type="number"] {
  -moz-appearance: textfield;
}
</style>
