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
      v-if="isOpen"
      class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] flex items-center justify-center p-4"
      @click="handleClose"
    ></div>
  </transition>

  <!-- Modal Content -->
  <transition
    enter-active-class="transition-all duration-300 ease-out"
    enter-from-class="opacity-0 scale-95"
    enter-to-class="opacity-100 scale-100"
    leave-active-class="transition-all duration-200 ease-in"
    leave-from-class="opacity-100 scale-100"
    leave-to-class="opacity-0 scale-95"
  >
    <div
      v-if="isOpen"
      class="fixed inset-0 z-[101] flex items-center justify-center p-4 pointer-events-none"
    >
      <div
        class="bg-white rounded-3xl shadow-2xl max-w-lg w-full overflow-hidden pointer-events-auto"
        @click.stop
      >
        <!-- Success Animation Header -->
        <div class="bg-gradient-to-br from-purple-600 to-pink-600 p-8 text-center relative overflow-hidden">
          <!-- Animated circles background -->
          <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full translate-x-1/2 translate-y-1/2 animate-pulse" style="animation-delay: 0.5s;"></div>
          </div>

          <!-- Success Icon -->
          <div class="relative">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce-slow">
              <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">Order Confirmed!</h2>
            <p class="text-white/90">Thank you for your purchase</p>
          </div>
        </div>

        <!-- Order Details -->
        <div class="p-8">
          <!-- Order Number -->
          <div class="bg-purple-50 border-2 border-purple-200 rounded-xl p-4 mb-6">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-sm text-gray-600 mb-1">Order Number</p>
                <p class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                  #{{ orderNumber }}
                </p>
              </div>
              <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
            </div>
          </div>

          <!-- Order Summary -->
          <div class="space-y-3 mb-6">
            <div class="flex items-start gap-3">
              <svg class="w-6 h-6 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <div>
                <p class="font-semibold text-gray-900">Confirmation Email Sent</p>
                <p class="text-sm text-gray-600">We've sent order details to {{ email }}</p>
              </div>
            </div>

            <div class="flex items-start gap-3">
              <svg class="w-6 h-6 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
              </svg>
              <div>
                <p class="font-semibold text-gray-900">Estimated Delivery</p>
                <p class="text-sm text-gray-600">{{ estimatedDelivery }}</p>
              </div>
            </div>

            <div class="flex items-start gap-3">
              <svg class="w-6 h-6 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              <div>
                <p class="font-semibold text-gray-900">Order Total</p>
                <p class="text-sm text-gray-600">${{ total.toFixed(2) }}</p>
              </div>
            </div>
          </div>

          <!-- What's Next -->
          <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
            <h3 class="font-bold text-blue-900 mb-2 flex items-center gap-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              What's Next?
            </h3>
            <ul class="text-sm text-blue-800 space-y-1">
              <li>• You'll receive a confirmation email shortly</li>
              <li>• We'll notify you when your order ships</li>
              <li>• Track your order status anytime</li>
            </ul>
          </div>

          <!-- Action Buttons -->
          <div class="space-y-3">
            <button
              @click="handleClose"
              class="w-full px-6 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold shadow-lg hover:shadow-xl transition-all hover:scale-105 active:scale-95"
            >
              Continue Shopping
            </button>
            <button
              class="w-full px-6 py-4 border-2 border-purple-600 text-purple-600 rounded-xl font-bold hover:bg-purple-50 transition-all"
            >
              Track My Order
            </button>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script setup>
import { computed } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  isOpen: {
    type: Boolean,
    default: false,
  },
  orderNumber: {
    type: String,
    default: '',
  },
  email: {
    type: String,
    default: '',
  },
  total: {
    type: Number,
    default: 0,
  },
});

const emit = defineEmits(['close']);

// Calculate estimated delivery (5-7 business days from now)
const estimatedDelivery = computed(() => {
  const today = new Date();
  const deliveryStart = new Date(today);
  deliveryStart.setDate(today.getDate() + 5);
  const deliveryEnd = new Date(today);
  deliveryEnd.setDate(today.getDate() + 7);

  const options = { month: 'short', day: 'numeric' };
  return `${deliveryStart.toLocaleDateString('en-US', options)} - ${deliveryEnd.toLocaleDateString('en-US', options)}`;
});

const handleClose = () => {
  emit('close');
  // Redirect to home page
  router.visit('/');
};
</script>

<style scoped>
@keyframes bounce-slow {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

.animate-bounce-slow {
  animation: bounce-slow 2s infinite;
}
</style>
