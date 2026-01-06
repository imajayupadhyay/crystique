<template>
  <div class="min-h-screen bg-white">
    <Head :title="`${product.name} - Crystique`" />

    <!-- Header -->
    <Header />

    <!-- Main Content -->
    <div class="pt-36 pb-20">
      <!-- Breadcrumb -->
      <div class="container mx-auto px-6 mb-8">
        <nav class="flex items-center space-x-2 text-sm text-gray-600">
          <Link href="/" class="hover:text-gray-900 transition-colors">Home</Link>
          <span>/</span>
          <Link :href="`/${product.categorySlug}`" class="hover:text-gray-900 transition-colors">{{ product.category }}</Link>
          <span>/</span>
          <span class="text-gray-900">{{ product.name }}</span>
        </nav>
      </div>

      <!-- Product Detail Section -->
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 mb-20">
          <!-- Left: Image Gallery -->
          <div class="space-y-4">
            <!-- Main Image -->
            <div class="relative overflow-hidden bg-gray-50 aspect-square">
              <img
                :src="selectedImage"
                :alt="product.name"
                class="w-full h-full object-cover"
              />

              <!-- Badge -->
              <div v-if="product.badge" class="absolute top-4 left-4">
                <span class="px-4 py-2 bg-black text-white text-xs tracking-wider uppercase">
                  {{ product.badge }}
                </span>
              </div>

              <!-- Wishlist -->
              <button
                @click="toggleWishlist(product)"
                class="absolute top-4 right-4 w-10 h-10 bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-900 hover:text-white transition-all"
                :class="isInWishlist(product.id) ? 'bg-gray-900 text-white' : ''"
              >
                <svg class="w-5 h-5" :fill="isInWishlist(product.id) ? 'currentColor' : 'none'" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
              </button>

              <!-- Navigation Arrows -->
              <button
                @click="previousImage"
                v-if="product.images && product.images.length > 1"
                class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-900 hover:text-white transition-all"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </button>
              <button
                @click="nextImage"
                v-if="product.images && product.images.length > 1"
                class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-900 hover:text-white transition-all"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                class="relative overflow-hidden bg-gray-50 aspect-square border-2 transition-all"
                :class="selectedImage === image ? 'border-gray-900' : 'border-transparent hover:border-gray-400'"
              >
                <img :src="image" :alt="`${product.name} ${index + 1}`" class="w-full h-full object-cover" />
              </button>
            </div>
          </div>

          <!-- Right: Product Info -->
          <div class="space-y-6">
            <!-- Category -->
            <div class="text-xs tracking-[0.2em] uppercase text-gray-600">
              {{ product.category }}
            </div>

            <!-- Product Name -->
            <h1 class="text-3xl lg:text-4xl font-serif text-gray-900">
              {{ product.name }}
            </h1>

            <!-- Rating & Reviews -->
            <div class="flex items-center gap-4 pb-4 border-b border-gray-200">
              <div class="flex items-center gap-1">
                <svg
                  v-for="star in 5"
                  :key="star"
                  class="w-4 h-4"
                  :class="star <= Math.floor(product.rating) ? 'text-orange-400' : 'text-gray-300'"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
              </div>
              <span class="text-sm text-gray-600">{{ product.rating }} ({{ product.reviews }} reviews)</span>
            </div>

            <!-- Price -->
            <div class="flex items-baseline gap-3">
              <span class="text-3xl font-medium text-gray-900">
                ₹{{ (product.price / 100).toFixed(2) }}
              </span>
              <span v-if="product.originalPrice" class="text-xl text-gray-400 line-through">
                ₹{{ (product.originalPrice / 100).toFixed(2) }}
              </span>
            </div>

            <!-- Description -->
            <div class="py-4 border-b border-gray-200">
              <p class="text-gray-700 leading-relaxed">
                {{ product.description || 'Experience the natural beauty and healing energy of authentic crystals. Each piece is carefully selected for its quality and unique properties, making it perfect for meditation, decoration, or energy work.' }}
              </p>
            </div>

            <!-- Stock Status -->
            <div class="flex items-center gap-2">
              <div v-if="product.inStock" class="flex items-center gap-2 text-sm">
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                <span class="text-gray-700">In Stock</span>
              </div>
              <div v-else class="flex items-center gap-2 text-sm">
                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                <span class="text-gray-700">Out of Stock</span>
              </div>
            </div>

            <!-- Quantity & Add to Cart -->
            <div class="space-y-4 pt-4">
              <!-- Quantity -->
              <div>
                <label class="block text-sm text-gray-700 mb-2">Quantity</label>
                <div class="flex items-center gap-4">
                  <div class="flex items-center border border-gray-300">
                    <button
                      @click="decrementQuantity"
                      class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 transition-colors"
                    >
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                      </svg>
                    </button>
                    <input
                      v-model.number="quantity"
                      type="number"
                      min="1"
                      class="w-16 h-10 text-center border-x border-gray-300 focus:outline-none"
                    />
                    <button
                      @click="incrementQuantity"
                      class="w-10 h-10 flex items-center justify-center hover:bg-gray-100 transition-colors"
                    >
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Add to Cart Button -->
              <button
                @click="addToCart"
                :disabled="!product.inStock"
                class="w-full py-4 text-sm tracking-wider uppercase font-medium transition-all"
                :class="product.inStock
                  ? 'bg-gray-900 text-white hover:bg-gray-800'
                  : 'bg-gray-300 text-gray-500 cursor-not-allowed'"
              >
                {{ product.inStock ? 'Add to Cart' : 'Out of Stock' }}
              </button>
            </div>

            <!-- Product Features -->
            <div class="grid grid-cols-2 gap-4 pt-6 border-t border-gray-200">
              <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-gray-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                  <h4 class="text-sm font-medium text-gray-900">100% Authentic</h4>
                  <p class="text-xs text-gray-600">Genuine crystals</p>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-gray-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
                <div>
                  <h4 class="text-sm font-medium text-gray-900">Fast Shipping</h4>
                  <p class="text-xs text-gray-600">1-2 business days</p>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-gray-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                </svg>
                <div>
                  <h4 class="text-sm font-medium text-gray-900">Gift Wrapped</h4>
                  <p class="text-xs text-gray-600">Beautiful packaging</p>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-gray-700 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                <div>
                  <h4 class="text-sm font-medium text-gray-900">Secure Payment</h4>
                  <p class="text-xs text-gray-600">Safe & encrypted</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Related Products -->
        <div v-if="relatedProducts && relatedProducts.length > 0" class="mt-20">
          <h2 class="text-2xl font-serif tracking-[0.2em] text-gray-900 mb-8 uppercase text-center">
            You May Also Like
          </h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <Link
              v-for="relatedProduct in relatedProducts"
              :key="relatedProduct.id"
              :href="`/${relatedProduct.categorySlug}/${relatedProduct.slug}`"
              class="group bg-white"
            >
              <!-- Product Image -->
              <div class="relative overflow-hidden aspect-square mb-4 bg-gray-50">
                <img
                  :src="relatedProduct.image"
                  :alt="relatedProduct.name"
                  class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                />
              </div>

              <!-- Product Info -->
              <div class="text-center px-2">
                <h3 class="text-sm text-gray-900 mb-2 hover:text-gray-600 transition-colors">
                  {{ relatedProduct.name }}
                </h3>

                <!-- Price -->
                <div class="flex items-center justify-center gap-2 mb-2">
                  <span class="text-sm font-medium text-gray-900">
                    ₹{{ (relatedProduct.price / 100).toFixed(2) }}
                  </span>
                  <span
                    v-if="relatedProduct.originalPrice"
                    class="text-sm text-gray-400 line-through"
                  >
                    ₹{{ (relatedProduct.originalPrice / 100).toFixed(2) }}
                  </span>
                </div>

                <!-- Rating -->
                <div class="flex items-center justify-center gap-1">
                  <div class="flex items-center">
                    <svg
                      v-for="star in 5"
                      :key="star"
                      class="w-4 h-4"
                      :class="star <= Math.round(relatedProduct.rating) ? 'text-orange-400' : 'text-gray-300'"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                  </div>
                  <span class="text-xs text-gray-500 ml-1">({{ relatedProduct.reviews }})</span>
                </div>
              </div>
            </Link>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';
import { useCart } from '../../composables/useCart';
import { useWishlist } from '../../composables/useWishlist';

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

// Cart and Wishlist
const { addToCart: addToCartAction, openCart } = useCart();
const { toggleWishlist, isInWishlist } = useWishlist();

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
  currentImageIndex.value = props.product.images.indexOf(image);
};

const nextImage = () => {
  if (props.product.images && props.product.images.length > 1) {
    currentImageIndex.value = (currentImageIndex.value + 1) % props.product.images.length;
    selectedImage.value = props.product.images[currentImageIndex.value];
  }
};

const previousImage = () => {
  if (props.product.images && props.product.images.length > 1) {
    currentImageIndex.value = currentImageIndex.value === 0 ? props.product.images.length - 1 : currentImageIndex.value - 1;
    selectedImage.value = props.product.images[currentImageIndex.value];
  }
};

const addToCart = () => {
  if (props.product.inStock) {
    addToCartAction(props.product, quantity.value);
    openCart();
  }
};
</script>

<style scoped>
/* Clean design - no additional styles needed */
</style>
