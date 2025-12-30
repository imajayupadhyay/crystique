<template>
  <section id="about" class="py-20 bg-gradient-to-b from-purple-50 to-white">
    <div class="container mx-auto px-6">
      <!-- Features Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
        <div
          v-for="(feature, index) in features"
          :key="index"
          class="group"
        >
          <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-purple-100">
            <!-- Icon -->
            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
              <component :is="feature.icon" class="w-8 h-8 text-white" />
            </div>

            <!-- Content -->
            <h3 class="text-xl font-bold text-gray-900 mb-3">
              {{ feature.title }}
            </h3>
            <p class="text-gray-600 text-sm leading-relaxed">
              {{ feature.description }}
            </p>
          </div>
        </div>
      </div>

      <!-- About Section -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Images -->
        <div class="relative">
          <div class="grid grid-cols-2 gap-4">
            <div class="space-y-4">
              <div class="overflow-hidden rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-300">
                <img
                  src="https://images.unsplash.com/photo-1596637754862-54a81dc4a2d2?w=400&auto=format&fit=crop&q=60"
                  alt="Crystal 1"
                  class="w-full h-64 object-cover"
                />
              </div>
              <div class="overflow-hidden rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-300">
                <img
                  src="https://images.unsplash.com/photo-1590927157296-ba4bb1c9654e?w=400&auto=format&fit=crop&q=60"
                  alt="Crystal 2"
                  class="w-full h-48 object-cover"
                />
              </div>
            </div>
            <div class="space-y-4 pt-8">
              <div class="overflow-hidden rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-300">
                <img
                  src="https://images.unsplash.com/photo-1518281420975-50db6e5d0a97?w=400&auto=format&fit=crop&q=60"
                  alt="Crystal 3"
                  class="w-full h-48 object-cover"
                />
              </div>
              <div class="overflow-hidden rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-300">
                <img
                  src="https://images.unsplash.com/photo-1608481337062-4093bf3ed404?w=400&auto=format&fit=crop&q=60"
                  alt="Crystal 4"
                  class="w-full h-64 object-cover"
                />
              </div>
            </div>
          </div>

          <!-- Floating Card -->
          <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-white/90 backdrop-blur-lg rounded-2xl p-6 shadow-2xl border border-purple-100 w-80">
            <div class="flex items-center justify-between">
              <div>
                <div class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">5000+</div>
                <div class="text-sm text-gray-600">Happy Customers</div>
              </div>
              <div class="flex -space-x-2">
                <img src="https://i.pravatar.cc/150?img=1" alt="Customer" class="w-10 h-10 rounded-full border-2 border-white" />
                <img src="https://i.pravatar.cc/150?img=2" alt="Customer" class="w-10 h-10 rounded-full border-2 border-white" />
                <img src="https://i.pravatar.cc/150?img=3" alt="Customer" class="w-10 h-10 rounded-full border-2 border-white" />
                <div class="w-10 h-10 rounded-full border-2 border-white bg-gradient-to-r from-purple-600 to-pink-600 flex items-center justify-center text-white text-xs font-bold">
                  +5K
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content -->
        <div class="space-y-6 lg:pl-8">
          <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">About Crystique</span>

          <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
            Where Ancient Wisdom Meets
            <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent"> Modern Living</span>
          </h2>

          <p class="text-gray-600 text-lg leading-relaxed">
            At Crystique, we believe in the transformative power of crystals and spiritual items. Each piece in our collection is carefully selected and authenticated to ensure you receive genuine products that carry positive energy.
          </p>

          <p class="text-gray-600 leading-relaxed">
            Our journey began with a simple mission: to make authentic spiritual tools accessible to everyone seeking balance, healing, and enlightenment. Today, we're proud to serve thousands of customers worldwide with our curated collection of crystals, malas, and antique spiritual items.
          </p>

          <!-- Stats -->
          <div class="grid grid-cols-3 gap-6 pt-6">
            <div>
              <div class="text-3xl font-bold text-gray-900">10+</div>
              <div class="text-sm text-gray-600">Years Experience</div>
            </div>
            <div>
              <div class="text-3xl font-bold text-gray-900">500+</div>
              <div class="text-sm text-gray-600">Products</div>
            </div>
            <div>
              <div class="text-3xl font-bold text-gray-900">98%</div>
              <div class="text-sm text-gray-600">Satisfaction</div>
            </div>
          </div>

          <!-- CTA -->
          <div class="flex gap-4 pt-4">
            <button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full font-semibold hover:shadow-xl transform hover:scale-105 transition-all duration-300">
              Our Story
            </button>
            <button class="px-6 py-3 bg-purple-100 text-purple-600 rounded-full font-semibold hover:bg-purple-200 transition-all duration-300">
              Contact Us
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, h } from 'vue';

// Feature icons
const ShippingIcon = () => h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24' }, [
  h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4' })
]);

const AuthenticIcon = () => h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24' }, [
  h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z' })
]);

const SupportIcon = () => h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24' }, [
  h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z' })
]);

const SecureIcon = () => h('svg', { fill: 'none', stroke: 'currentColor', viewBox: '0 0 24 24' }, [
  h('path', { 'stroke-linecap': 'round', 'stroke-linejoin': 'round', 'stroke-width': '2', d: 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z' })
]);

const features = ref([
  {
    title: 'Free Shipping',
    description: 'Free shipping on all orders over $50. Fast and secure delivery worldwide.',
    icon: ShippingIcon
  },
  {
    title: '100% Authentic',
    description: 'Every product is verified and certified for authenticity and quality.',
    icon: AuthenticIcon
  },
  {
    title: '24/7 Support',
    description: 'Our expert team is available round the clock to assist you.',
    icon: SupportIcon
  },
  {
    title: 'Secure Payment',
    description: 'Shop with confidence using our encrypted payment gateway.',
    icon: SecureIcon
  }
]);
</script>

<style scoped>
/* Additional styles if needed */
</style>
