<template>
  <div class="min-h-screen">
    <Head title="Checkout - Crystique" />

    <!-- Header -->
    <Header />

    <!-- Main Content -->
    <div class="pt-36 pb-20 bg-gray-50">
      <div class="container mx-auto px-6">
        <!-- Page Header -->
        <div class="mb-8 text-center">
          <h1 class="text-4xl md:text-5xl font-serif tracking-[0.2em] text-gray-900 mb-4 uppercase">
            Secure Checkout
          </h1>
          <p class="text-gray-600">Complete your order in a few simple steps</p>
        </div>

        <!-- Empty Cart Redirect -->
        <div v-if="cartItems.length === 0" class="max-w-2xl mx-auto text-center py-20">
          <div class="w-32 h-32 border border-gray-300 flex items-center justify-center mb-6 mx-auto">
            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
          </div>
          <h2 class="text-2xl font-medium text-gray-900 mb-3 tracking-wide uppercase">Your cart is empty</h2>
          <p class="text-gray-600 mb-8">Add some products before proceeding to checkout</p>
          <Link href="/products" class="inline-block px-8 py-4 bg-gray-900 text-white text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-800 transition-colors">
            Browse Products
          </Link>
        </div>

        <!-- Checkout Form -->
        <div v-else class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <!-- Left: Checkout Steps -->
          <div class="lg:col-span-2">
            <!-- Step Indicator -->
            <div class="bg-white border border-gray-300 p-6 mb-6">
              <div class="flex items-center justify-between">
                <div
                  v-for="(step, index) in steps"
                  :key="index"
                  class="flex items-center"
                  :class="index < steps.length - 1 ? 'flex-1' : ''"
                >
                  <div class="flex flex-col items-center">
                    <div
                      class="w-10 h-10 border border-gray-300 flex items-center justify-center font-bold transition-all"
                      :class="currentStep > index ? 'bg-gray-900 text-white border-gray-900' : currentStep === index ? 'bg-gray-900 text-white border-gray-900' : 'bg-white text-gray-500'"
                    >
                      <svg v-if="currentStep > index" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                      <span v-else>{{ index + 1 }}</span>
                    </div>
                    <span class="text-xs mt-2 font-medium hidden sm:block uppercase tracking-wider" :class="currentStep >= index ? 'text-gray-900' : 'text-gray-500'">
                      {{ step }}
                    </span>
                  </div>
                  <div v-if="index < steps.length - 1" class="flex-1 h-1 mx-4" :class="currentStep > index ? 'bg-gray-900' : 'bg-gray-200'"></div>
                </div>
              </div>
            </div>

            <!-- Step 1: Shipping Information -->
            <div v-show="currentStep === 0" class="bg-white border border-gray-300 p-8">
              <h2 class="text-2xl font-medium text-gray-900 mb-6 tracking-wide uppercase">Shipping Information</h2>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">First Name *</label>
                  <input
                    v-model="shippingForm.firstName"
                    type="text"
                    required
                    class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                    placeholder="John"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Last Name *</label>
                  <input
                    v-model="shippingForm.lastName"
                    type="text"
                    required
                    class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                    placeholder="Doe"
                  />
                </div>
              </div>

              <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Email Address *</label>
                <input
                  v-model="shippingForm.email"
                  type="email"
                  required
                  class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                  placeholder="john@example.com"
                />
              </div>

              <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Phone Number *</label>
                <input
                  v-model="shippingForm.phone"
                  type="tel"
                  required
                  class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                  placeholder="+1 (555) 123-4567"
                />
              </div>

              <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Street Address *</label>
                <input
                  v-model="shippingForm.address"
                  type="text"
                  required
                  class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                  placeholder="123 Main Street"
                />
              </div>

              <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">City *</label>
                  <input
                    v-model="shippingForm.city"
                    type="text"
                    required
                    class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                    placeholder="New York"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">State *</label>
                  <input
                    v-model="shippingForm.state"
                    type="text"
                    required
                    class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                    placeholder="NY"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">ZIP Code *</label>
                  <input
                    v-model="shippingForm.zipCode"
                    type="text"
                    required
                    class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                    placeholder="10001"
                  />
                </div>
              </div>

              <div class="mt-8 flex justify-end">
                <button
                  @click="nextStep"
                  class="px-8 py-3 bg-gray-900 text-white text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-800 transition-colors"
                >
                  Continue to Payment
                </button>
              </div>
            </div>

            <!-- Step 2: Payment Information -->
            <div v-show="currentStep === 1" class="bg-white border border-gray-300 p-8">
              <h2 class="text-2xl font-medium text-gray-900 mb-6 tracking-wide uppercase">Payment Information</h2>

              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Card Number *</label>
                <input
                  v-model="paymentForm.cardNumber"
                  type="text"
                  required
                  maxlength="19"
                  class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                  placeholder="1234 5678 9012 3456"
                />
              </div>

              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Cardholder Name *</label>
                <input
                  v-model="paymentForm.cardName"
                  type="text"
                  required
                  class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                  placeholder="John Doe"
                />
              </div>

              <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Expiry Date *</label>
                  <input
                    v-model="paymentForm.expiryDate"
                    type="text"
                    required
                    maxlength="5"
                    class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                    placeholder="MM/YY"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">CVV *</label>
                  <input
                    v-model="paymentForm.cvv"
                    type="text"
                    required
                    maxlength="3"
                    class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                    placeholder="123"
                  />
                </div>
              </div>

              <div class="flex items-center gap-3 p-4 bg-gray-100 border border-gray-300 mb-6">
                <svg class="w-6 h-6 text-gray-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <p class="text-sm text-gray-700">Your payment information is encrypted and secure</p>
              </div>

              <div class="mt-8 flex justify-between">
                <button
                  @click="prevStep"
                  class="px-8 py-3 border border-gray-900 text-gray-900 text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-900 hover:text-white transition-colors"
                >
                  Back
                </button>
                <button
                  @click="nextStep"
                  class="px-8 py-3 bg-gray-900 text-white text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-800 transition-colors"
                >
                  Review Order
                </button>
              </div>
            </div>

            <!-- Step 3: Review & Place Order -->
            <div v-show="currentStep === 2" class="bg-white border border-gray-300 p-8">
              <h2 class="text-2xl font-medium text-gray-900 mb-6 tracking-wide uppercase">Review Your Order</h2>

              <!-- Shipping Info Review -->
              <div class="mb-6 p-6 bg-gray-50 border border-gray-300">
                <div class="flex justify-between items-start mb-4">
                  <h3 class="font-medium text-gray-900 uppercase tracking-wider">Shipping Address</h3>
                  <button @click="currentStep = 0" class="text-gray-700 hover:text-gray-900 text-sm font-medium uppercase tracking-wider">Edit</button>
                </div>
                <p class="text-gray-700">{{ shippingForm.firstName }} {{ shippingForm.lastName }}</p>
                <p class="text-gray-700">{{ shippingForm.address }}</p>
                <p class="text-gray-700">{{ shippingForm.city }}, {{ shippingForm.state }} {{ shippingForm.zipCode }}</p>
                <p class="text-gray-700 mt-2">{{ shippingForm.email }}</p>
                <p class="text-gray-700">{{ shippingForm.phone }}</p>
              </div>

              <!-- Payment Info Review -->
              <div class="mb-6 p-6 bg-gray-50 border border-gray-300">
                <div class="flex justify-between items-start mb-4">
                  <h3 class="font-medium text-gray-900 uppercase tracking-wider">Payment Method</h3>
                  <button @click="currentStep = 1" class="text-gray-700 hover:text-gray-900 text-sm font-medium uppercase tracking-wider">Edit</button>
                </div>
                <p class="text-gray-700">Card ending in {{ paymentForm.cardNumber.slice(-4) }}</p>
                <p class="text-gray-700">{{ paymentForm.cardName }}</p>
              </div>

              <!-- Order Items -->
              <div class="mb-6">
                <h3 class="font-medium text-gray-900 mb-4 uppercase tracking-wider">Order Items</h3>
                <div class="space-y-4">
                  <div v-for="item in cartItems" :key="item.id" class="flex gap-4 p-4 bg-gray-50 border border-gray-300">
                    <img :src="item.image" :alt="item.name" class="w-16 h-16 object-cover" />
                    <div class="flex-1">
                      <h4 class="font-medium text-gray-900">{{ item.name }}</h4>
                      <p class="text-sm text-gray-600">Quantity: {{ item.quantity }}</p>
                    </div>
                    <div class="text-right">
                      <p class="font-medium text-gray-900">₹{{ item.price * item.quantity }}</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-8 flex justify-between">
                <button
                  @click="prevStep"
                  class="px-8 py-3 border border-gray-900 text-gray-900 text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-900 hover:text-white transition-colors"
                >
                  Back
                </button>
                <button
                  @click="placeOrder"
                  :disabled="isPlacingOrder"
                  class="px-8 py-3 bg-gray-900 text-white text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-800 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                >
                  {{ isPlacingOrder ? 'Processing...' : 'Place Order' }}
                </button>
              </div>
            </div>
          </div>

          <!-- Right: Order Summary (Sticky) -->
          <div class="lg:col-span-1">
            <div class="bg-white border border-gray-300 p-6 sticky top-28">
              <h2 class="text-xl font-medium text-gray-900 mb-6 tracking-wide uppercase">Order Summary</h2>

              <div class="space-y-4 mb-6">
                <div class="flex justify-between text-gray-700">
                  <span>Subtotal ({{ cartCount }} items)</span>
                  <span class="font-medium">₹{{ cartSubtotal }}</span>
                </div>
                <div class="flex justify-between text-gray-700">
                  <span>Tax</span>
                  <span class="font-medium">₹{{ cartTax }}</span>
                </div>
                <div class="flex justify-between text-gray-700">
                  <span>Shipping</span>
                  <span class="font-medium">
                    {{ cartShipping === 0 ? 'FREE' : `₹${cartShipping}` }}
                  </span>
                </div>
                <div class="flex justify-between text-xl font-medium text-gray-900 pt-4 border-t border-gray-900">
                  <span>Total</span>
                  <span>₹{{ cartGrandTotal }}</span>
                </div>
              </div>

              <!-- Trust Badges -->
              <div class="space-y-3 pt-6 border-t border-gray-300">
                <div class="flex items-center gap-3 text-sm text-gray-600">
                  <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Secure payment processing
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-600">
                  <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Free returns within 30 days
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-600">
                  <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  100% satisfaction guaranteed
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <Footer />

    <!-- Order Confirmation Modal -->
    <OrderConfirmationModal
      :isOpen="showOrderConfirmation"
      :orderNumber="orderNumber"
      :email="shippingForm.email"
      :total="cartGrandTotal"
      @close="handleOrderConfirmationClose"
    />
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';
import OrderConfirmationModal from '../../components/modals/OrderConfirmationModal.vue';
import { useCart } from '../../composables/useCart';

const {
  cartItems,
  cartCount,
  cartSubtotal,
  cartTax,
  cartShipping,
  cartGrandTotal,
  clearCart,
} = useCart();

const currentStep = ref(0);
const steps = ['Shipping', 'Payment', 'Review'];
const isPlacingOrder = ref(false);
const showOrderConfirmation = ref(false);
const orderNumber = ref('');

const shippingForm = ref({
  firstName: '',
  lastName: '',
  email: '',
  phone: '',
  address: '',
  city: '',
  state: '',
  zipCode: '',
});

const paymentForm = ref({
  cardNumber: '',
  cardName: '',
  expiryDate: '',
  cvv: '',
});

const nextStep = () => {
  if (currentStep.value < steps.length - 1) {
    currentStep.value++;
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
};

const prevStep = () => {
  if (currentStep.value > 0) {
    currentStep.value--;
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
};

const placeOrder = () => {
  isPlacingOrder.value = true;

  // Simulate order processing
  setTimeout(() => {
    // Generate a random order number
    orderNumber.value = 'ORD' + Math.random().toString(36).substring(2, 11).toUpperCase();

    // In a real app, you would send this to your backend
    console.log('Order placed:', {
      orderNumber: orderNumber.value,
      shipping: shippingForm.value,
      payment: paymentForm.value,
      items: cartItems.value,
      total: cartGrandTotal.value,
    });

    // Clear cart
    clearCart();

    // Show order confirmation modal
    isPlacingOrder.value = false;
    showOrderConfirmation.value = true;
  }, 2000);
};

const handleOrderConfirmationClose = () => {
  showOrderConfirmation.value = false;
  // The modal handles the redirect to home page
};
</script>
