<template>
  <div class="min-h-screen bg-white">
    <Head :title="`${product.name} - Crystique`" />

    <!-- Header -->
    <Header />

    <!-- Main Content -->
    <div class="pt-28 pb-20">
      <!-- Breadcrumb -->
      <div class="container mx-auto px-6 mb-8">
        <nav class="flex items-center space-x-2 text-sm">
          <Link href="/" class="text-gray-500 hover:text-purple-600 transition-colors">Home</Link>
          <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
          <Link href="/products" class="text-gray-500 hover:text-purple-600 transition-colors">Products</Link>
          <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
          <span class="text-gray-500 hover:text-purple-600 transition-colors">{{ product.category }}</span>
          <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
          <span class="text-gray-900 font-semibold">{{ product.name }}</span>
        </nav>
      </div>

      <!-- Product Detail Section -->
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 mb-20">
          <!-- Left: Image Gallery -->
          <div class="space-y-6">
            <!-- Main Image -->
            <div class="relative rounded-3xl overflow-hidden bg-gray-100 aspect-square group">
              <img
                :src="selectedImage"
                :alt="product.name"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
              />

              <!-- Badges -->
              <div class="absolute top-6 left-6 flex flex-col gap-3">
                <span v-if="product.badge" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-sm font-bold rounded-full shadow-lg backdrop-blur-sm">
                  {{ product.badge }}
                </span>
                <span v-if="!product.inStock" class="px-4 py-2 bg-red-500 text-white text-sm font-bold rounded-full shadow-lg">
                  Out of Stock
                </span>
              </div>

              <!-- Wishlist & Share -->
              <div class="absolute top-6 right-6 flex flex-col gap-3">
                <button class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-pink-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                  </svg>
                </button>
                <button class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-purple-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                  </svg>
                </button>
              </div>

              <!-- Image Navigation Arrows -->
              <button
                @click="previousImage"
                v-if="product.images && product.images.length > 1"
                class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:bg-purple-600 hover:text-white transition-all opacity-0 group-hover:opacity-100"
              >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </button>
              <button
                @click="nextImage"
                v-if="product.images && product.images.length > 1"
                class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:bg-purple-600 hover:text-white transition-all opacity-0 group-hover:opacity-100"
              >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </button>
            </div>

            <!-- Thumbnail Gallery -->
            <div v-if="product.images && product.images.length > 1" class="grid grid-cols-4 gap-4">
              <button
                v-for="(image, index) in product.images"
                :key="index"
                @click="selectImage(image)"
                class="relative rounded-2xl overflow-hidden bg-gray-100 aspect-square border-2 transition-all duration-300 hover:scale-105"
                :class="selectedImage === image ? 'border-purple-600 shadow-lg' : 'border-transparent hover:border-gray-300'"
              >
                <img :src="image" :alt="`${product.name} ${index + 1}`" class="w-full h-full object-cover" />
              </button>
            </div>
          </div>

          <!-- Right: Product Info -->
          <div class="space-y-6">
            <!-- Category -->
            <div class="inline-flex items-center px-4 py-2 bg-purple-50 rounded-full">
              <span class="text-sm font-semibold text-purple-600">{{ product.category }}</span>
            </div>

            <!-- Product Name -->
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
              {{ product.name }}
            </h1>

            <!-- Rating & Reviews -->
            <div class="flex items-center gap-4">
              <div class="flex items-center gap-1">
                <svg
                  v-for="star in 5"
                  :key="star"
                  class="w-5 h-5"
                  :class="star <= Math.floor(product.rating) ? 'text-yellow-400' : 'text-gray-300'"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
              </div>
              <span class="text-lg font-semibold text-gray-900">{{ product.rating }}</span>
              <span class="text-gray-500">({{ product.reviews }} reviews)</span>
            </div>

            <!-- Price -->
            <div class="flex items-baseline gap-4">
              <span class="text-5xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                ${{ product.price }}
              </span>
              <span v-if="product.originalPrice" class="text-2xl text-gray-400 line-through">
                ${{ product.originalPrice }}
              </span>
              <span v-if="product.originalPrice" class="px-3 py-1 bg-green-100 text-green-700 text-sm font-bold rounded-full">
                Save {{ Math.round(((product.originalPrice - product.price) / product.originalPrice) * 100) }}%
              </span>
            </div>

            <!-- Description -->
            <div class="prose max-w-none">
              <p class="text-gray-600 text-lg leading-relaxed">
                {{ product.description || 'Experience the natural beauty and healing energy of authentic crystals. Each piece is carefully selected for its quality and unique properties, making it perfect for meditation, decoration, or energy work.' }}
              </p>
            </div>

            <!-- Features/Benefits -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-6 border-y border-gray-200">
              <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                  <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900">100% Authentic</h4>
                  <p class="text-sm text-gray-600">Genuine natural crystals</p>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                  <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900">Gift Wrapped</h4>
                  <p class="text-sm text-gray-600">Beautiful packaging included</p>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                  <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900">Secure Payment</h4>
                  <p class="text-sm text-gray-600">Safe & encrypted</p>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                  <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900">Fast Shipping</h4>
                  <p class="text-sm text-gray-600">3-5 business days</p>
                </div>
              </div>
            </div>

            <!-- Quantity & Add to Cart -->
            <div class="space-y-4">
              <!-- Quantity Selector -->
              <div class="flex items-center gap-4">
                <span class="text-gray-700 font-semibold">Quantity:</span>
                <div class="flex items-center border-2 border-gray-200 rounded-xl overflow-hidden">
                  <button
                    @click="decrementQuantity"
                    class="px-4 py-3 hover:bg-gray-100 transition-colors"
                    :disabled="quantity <= 1"
                  >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                  </button>
                  <input
                    v-model.number="quantity"
                    type="number"
                    min="1"
                    class="w-16 text-center border-x-2 border-gray-200 py-3 focus:outline-none"
                  />
                  <button
                    @click="incrementQuantity"
                    class="px-4 py-3 hover:bg-gray-100 transition-colors"
                  >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                  </button>
                </div>
              </div>

              <!-- Action Buttons -->
              <div class="flex gap-4">
                <button
                  @click="addToCart"
                  :disabled="!product.inStock"
                  class="flex-1 px-8 py-4 rounded-xl font-bold text-lg shadow-lg transition-all duration-300 flex items-center justify-center gap-3"
                  :class="product.inStock
                    ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white hover:shadow-2xl hover:scale-105 active:scale-95'
                    : 'bg-gray-200 text-gray-400 cursor-not-allowed'"
                >
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <span>{{ product.inStock ? 'Add to Cart' : 'Out of Stock' }}</span>
                </button>
                <button
                  v-if="product.inStock"
                  class="px-8 py-4 border-2 border-purple-600 text-purple-600 rounded-xl font-bold text-lg hover:bg-purple-50 transition-all duration-300 flex items-center justify-center"
                >
                  <span>Buy Now</span>
                </button>
              </div>
            </div>

            <!-- Product Details Accordion -->
            <div class="space-y-3 pt-6">
              <details class="group border border-gray-200 rounded-xl overflow-hidden">
                <summary class="px-6 py-4 cursor-pointer flex items-center justify-between font-semibold text-gray-900 hover:bg-gray-50 transition-colors">
                  <span>Product Details</span>
                  <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </summary>
                <div class="px-6 py-4 bg-gray-50 text-gray-600 space-y-2">
                  <p><strong>Material:</strong> Natural Crystal</p>
                  <p><strong>Origin:</strong> Ethically Sourced</p>
                  <p><strong>Size:</strong> Approximately 2-3 inches</p>
                  <p><strong>Weight:</strong> Varies by piece</p>
                </div>
              </details>

              <details class="group border border-gray-200 rounded-xl overflow-hidden">
                <summary class="px-6 py-4 cursor-pointer flex items-center justify-between font-semibold text-gray-900 hover:bg-gray-50 transition-colors">
                  <span>Healing Properties</span>
                  <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </summary>
                <div class="px-6 py-4 bg-gray-50 text-gray-600">
                  <p>This crystal is known for its calming and balancing properties. It helps promote mental clarity, emotional stability, and spiritual growth.</p>
                </div>
              </details>

              <details class="group border border-gray-200 rounded-xl overflow-hidden">
                <summary class="px-6 py-4 cursor-pointer flex items-center justify-between font-semibold text-gray-900 hover:bg-gray-50 transition-colors">
                  <span>Shipping & Returns</span>
                  <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </summary>
                <div class="px-6 py-4 bg-gray-50 text-gray-600">
                  <p>Free shipping on orders over $50. 30-day return policy for all products. Items must be in original condition.</p>
                </div>
              </details>
            </div>
          </div>
        </div>

        <!-- Customer Reviews Section -->
        <div class="mb-20">
          <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-900">
              Customer <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Reviews</span>
            </h2>
            <button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
              Write a Review
            </button>
          </div>

          <!-- Reviews Grid -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Review Card 1 -->
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200">
              <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    S
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                    <div class="flex items-center gap-1">
                      <svg v-for="star in 5" :key="star" class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>
                    </div>
                  </div>
                </div>
                <span class="text-sm text-gray-500">2 days ago</span>
              </div>
              <p class="text-gray-600 leading-relaxed">
                Absolutely love this crystal! The quality is amazing and it came beautifully packaged. I can already feel the positive energy. Highly recommend!
              </p>
            </div>

            <!-- Review Card 2 -->
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200">
              <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    M
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-900">Michael Chen</h4>
                    <div class="flex items-center gap-1">
                      <svg v-for="star in 5" :key="star" class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>
                    </div>
                  </div>
                </div>
                <span class="text-sm text-gray-500">1 week ago</span>
              </div>
              <p class="text-gray-600 leading-relaxed">
                Perfect for meditation! The size is ideal and the authenticity is clear. Shipping was fast and customer service was excellent.
              </p>
            </div>
          </div>
        </div>

        <!-- Related Products -->
        <div>
          <h2 class="text-3xl font-bold text-gray-900 mb-8">
            You May Also <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Like</span>
          </h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <ProductCard
              v-for="relatedProduct in relatedProducts"
              :key="relatedProduct.id"
              :product="relatedProduct"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';
import ProductCard from '../Products/components/ProductCard.vue';

const props = defineProps({
  product: {
    type: Object,
    required: true,
  },
  relatedProducts: {
    type: Array,
    default: () => [],
  },
});

const quantity = ref(1);
const selectedImage = ref(props.product.images ? props.product.images[0] : props.product.image);
const currentImageIndex = ref(0);

const incrementQuantity = () => {
  quantity.value++;
};

const decrementQuantity = () => {
  if (quantity.value > 1) {
    quantity.value--;
  }
};

const selectImage = (image) => {
  selectedImage.value = image;
  if (props.product.images) {
    currentImageIndex.value = props.product.images.indexOf(image);
  }
};

const nextImage = () => {
  if (props.product.images && props.product.images.length > 0) {
    currentImageIndex.value = (currentImageIndex.value + 1) % props.product.images.length;
    selectedImage.value = props.product.images[currentImageIndex.value];
  }
};

const previousImage = () => {
  if (props.product.images && props.product.images.length > 0) {
    currentImageIndex.value = (currentImageIndex.value - 1 + props.product.images.length) % props.product.images.length;
    selectedImage.value = props.product.images[currentImageIndex.value];
  }
};

const addToCart = () => {
  // Add to cart functionality
  console.log(`Added ${quantity.value} ${props.product.name} to cart`);
  // You can implement your cart logic here
  alert(`Added ${quantity.value} ${props.product.name} to cart!`);
};
</script>

<style scoped>
/* Custom scrollbar for details */
details[open] {
  animation: slideDown 0.3s ease-out;
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
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
