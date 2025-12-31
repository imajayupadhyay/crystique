<template>
  <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-lg transition-all duration-300">
    <nav class="container mx-auto px-6 py-4">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
            <span class="text-white font-bold text-xl">C</span>
          </div>
          <span class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
            Crystique
          </span>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8">
          <Link href="/" class="nav-link font-semibold" :class="[
            isActive('/') ? 'text-purple-600' : 'text-gray-700 hover:text-purple-600',
            isActive('/') && 'active'
          ]">Home</Link>
          <Link href="/products" class="nav-link font-semibold" :class="[
            isActive('/products') || page.url.startsWith('/products/') ? 'text-purple-600' : 'text-gray-700 hover:text-purple-600',
            (isActive('/products') || page.url.startsWith('/products/')) && 'active'
          ]">Products</Link>
          <Link href="/about" class="nav-link font-semibold" :class="[
            isActive('/about') ? 'text-purple-600' : 'text-gray-700 hover:text-purple-600',
            isActive('/about') && 'active'
          ]">About</Link>
          <Link href="/contact" class="nav-link font-semibold" :class="[
            isActive('/contact') ? 'text-purple-600' : 'text-gray-700 hover:text-purple-600',
            isActive('/contact') && 'active'
          ]">Contact</Link>
        </div>

        <!-- Action Buttons -->
        <div class="hidden md:flex items-center space-x-4">
          <!-- Search Bar -->
          <div class="relative">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Search..."
              class="w-48 px-4 py-2 pl-10 rounded-full text-sm transition-all duration-300 focus:w-64 focus:outline-none focus:ring-2 focus:ring-purple-500 bg-gray-50 text-gray-900 placeholder-gray-400 border border-gray-200"
            />
            <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>

          <button @click="toggleWishlistModal" class="p-2 rounded-full transition-all duration-300 relative group hover:bg-gray-100">
            <svg class="w-6 h-6 text-gray-700 group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <span v-if="wishlistCount > 0" class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">{{ wishlistCount }}</span>
          </button>
          <button @click="toggleCart" class="p-2 rounded-full transition-all duration-300 relative group hover:bg-gray-100">
            <svg class="w-6 h-6 text-gray-700 group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span v-if="cartCount > 0" class="absolute -top-1 -right-1 bg-purple-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">{{ cartCount }}</span>
          </button>

          <!-- Account Dropdown -->
          <div class="relative">
            <button
              @click="accountDropdownOpen = !accountDropdownOpen"
              class="p-2 rounded-full transition-all duration-300 relative group hover:bg-gray-100"
            >
              <svg
                class="w-6 h-6 transition-colors"
                :class="customer ? 'text-purple-600' : 'text-gray-700 group-hover:text-purple-600'"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              <!-- Logged In Indicator -->
              <span
                v-if="customer"
                class="absolute -top-1 -right-1 w-3 h-3 bg-green-500 border-2 border-white rounded-full animate-pulse"
              ></span>
            </button>

            <!-- Dropdown Menu -->
            <transition
              enter-active-class="transition ease-out duration-200"
              enter-from-class="opacity-0 scale-95"
              enter-to-class="opacity-100 scale-100"
              leave-active-class="transition ease-in duration-150"
              leave-from-class="opacity-100 scale-100"
              leave-to-class="opacity-0 scale-95"
            >
              <div
                v-if="accountDropdownOpen"
                class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50"
              >
                <!-- Guest Menu -->
                <template v-if="!customer">
                  <Link
                    href="/login"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-colors"
                    @click="accountDropdownOpen = false"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-semibold">Login</span>
                  </Link>
                  <Link
                    href="/register"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-colors"
                    @click="accountDropdownOpen = false"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span class="font-semibold">Register</span>
                  </Link>
                </template>

                <!-- Authenticated Menu -->
                <template v-else>
                  <div class="px-4 py-3 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-pink-50">
                    <div class="flex items-center gap-2 mb-1.5">
                      <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                      <p class="text-xs font-bold text-green-600">Logged In</p>
                    </div>
                    <p class="text-sm font-semibold text-gray-900">{{ customer.full_name }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">{{ customer.email }}</p>
                  </div>
                  <Link
                    href="/account"
                    class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-colors"
                    @click="accountDropdownOpen = false"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="font-semibold">My Account</span>
                  </Link>
                  <button
                    @click="handleLogout"
                    class="w-full flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-semibold">Logout</span>
                  </button>
                </template>
              </div>
            </transition>
          </div>

          <!-- CTA Button -->
          <Link href="/products" class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center space-x-2">
            <span>Shop Now</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </Link>
        </div>

        <!-- Mobile Menu Button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg transition-all hover:bg-gray-100">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

    </nav>

    <!-- Mobile Menu Overlay -->
    <transition
      enter-active-class="transition-opacity duration-300"
      enter-from-class="opacity-0"
      enter-to-class="opacity-100"
      leave-active-class="transition-opacity duration-200"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <div
        v-if="mobileMenuOpen"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[60] md:hidden"
        @click="mobileMenuOpen = false"
      ></div>
    </transition>

    <!-- Mobile Menu Sidebar -->
    <transition
      enter-active-class="transition-transform duration-300 ease-out"
      enter-from-class="translate-x-full"
      enter-to-class="translate-x-0"
      leave-active-class="transition-transform duration-200 ease-in"
      leave-from-class="translate-x-0"
      leave-to-class="translate-x-full"
    >
      <div v-if="mobileMenuOpen" class="fixed top-0 right-0 h-screen w-[80%] bg-white shadow-2xl z-[70] md:hidden overflow-y-auto flex flex-col">
        <!-- Mobile Menu Header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
          <div class="flex items-center space-x-2">
            <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center shadow-lg">
              <span class="text-white font-bold text-xl">C</span>
            </div>
            <span class="text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
              Crystique
            </span>
          </div>
          <button
            @click="mobileMenuOpen = false"
            class="p-2 rounded-lg hover:bg-gray-100 transition-colors"
          >
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Mobile Menu Navigation -->
        <nav class="flex-1 p-6 space-y-2 overflow-y-auto">
          <Link
            href="/"
            @click="mobileMenuOpen = false"
            class="flex items-center space-x-3 px-4 py-4 rounded-xl font-semibold transition-all duration-300"
            :class="isActive('/') ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700'"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>Home</span>
          </Link>

          <Link
            href="/products"
            @click="mobileMenuOpen = false"
            class="flex items-center space-x-3 px-4 py-4 rounded-xl font-semibold transition-all duration-300"
            :class="isActive('/products') ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700'"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            <span>Products</span>
          </Link>

          <Link
            href="/about"
            @click="mobileMenuOpen = false"
            class="flex items-center space-x-3 px-4 py-4 rounded-xl font-semibold transition-all duration-300"
            :class="isActive('/about') ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700'"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>About</span>
          </Link>

          <Link
            href="/contact"
            @click="mobileMenuOpen = false"
            class="flex items-center space-x-3 px-4 py-4 rounded-xl font-semibold transition-all duration-300"
            :class="isActive('/contact') ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700'"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span>Contact</span>
          </Link>

          <!-- Divider -->
          <div class="border-t border-gray-100 my-2"></div>

          <!-- Account Links -->
          <template v-if="!customer">
            <Link
              href="/login"
              @click="mobileMenuOpen = false"
              class="flex items-center space-x-3 px-4 py-4 rounded-xl font-semibold transition-all duration-300 hover:bg-gray-50 text-gray-700"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
              </svg>
              <span>Login</span>
            </Link>
            <Link
              href="/register"
              @click="mobileMenuOpen = false"
              class="flex items-center space-x-3 px-4 py-4 rounded-xl font-semibold transition-all duration-300 hover:bg-gray-50 text-gray-700"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
              </svg>
              <span>Register</span>
            </Link>
          </template>
          <template v-else>
            <div class="px-4 py-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl mx-4 border-2 border-purple-200 relative">
              <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                <p class="text-xs font-bold text-green-600">Logged In</p>
              </div>
              <p class="text-sm font-semibold text-gray-900">{{ customer.full_name }}</p>
              <p class="text-xs text-gray-500 mt-0.5">{{ customer.email }}</p>
            </div>
            <Link
              href="/account"
              @click="mobileMenuOpen = false"
              class="flex items-center space-x-3 px-4 py-4 rounded-xl font-semibold transition-all duration-300"
              :class="isActive('/account') ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg' : 'hover:bg-gray-50 text-gray-700'"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              <span>My Account</span>
            </Link>
            <button
              @click="handleLogout(); mobileMenuOpen = false"
              class="w-full flex items-center space-x-3 px-4 py-4 rounded-xl font-semibold transition-all duration-300 hover:bg-red-50 text-gray-700 hover:text-red-600"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              <span>Logout</span>
            </button>
          </template>
        </nav>

        <!-- Mobile Menu Footer -->
        <div class="p-6 border-t border-gray-100 bg-gray-50 flex-shrink-0">
          <div class="flex items-center space-x-4">
            <button class="flex-1 p-3 bg-white rounded-xl hover:bg-gray-100 transition-colors shadow-sm">
              <svg class="w-6 h-6 text-gray-700 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
            <button @click="toggleWishlistModal(); mobileMenuOpen = false" class="flex-1 p-3 bg-white rounded-xl hover:bg-gray-100 transition-colors shadow-sm relative">
              <svg class="w-6 h-6 text-gray-700 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
              <span v-if="wishlistCount > 0" class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">{{ wishlistCount }}</span>
            </button>
            <button @click="toggleCart(); mobileMenuOpen = false" class="flex-1 p-3 bg-white rounded-xl hover:bg-gray-100 transition-colors shadow-sm relative">
              <svg class="w-6 h-6 text-gray-700 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              <span v-if="cartCount > 0" class="absolute -top-1 -right-1 bg-purple-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">{{ cartCount }}</span>
            </button>
          </div>
        </div>
      </div>
    </transition>

    <!-- Cart Modal -->
    <CartModal />

    <!-- Wishlist Modal -->
    <WishlistModal />
  </header>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Link, usePage, router } from '@inertiajs/vue3';
import { useCart } from '../composables/useCart';
import { useWishlist } from '../composables/useWishlist';
import CartModal from './modals/CartModal.vue';
import WishlistModal from './modals/WishlistModal.vue';

const page = usePage();
const mobileMenuOpen = ref(false);
const searchQuery = ref('');
const accountDropdownOpen = ref(false);

// Get customer from shared Inertia data
const customer = computed(() => page.props.auth?.customer);

// Cart and Wishlist
const { cartCount, toggleCart } = useCart();
const { wishlistCount, toggleWishlistModal } = useWishlist();

// Check if a route is active
const isActive = (path) => {
  return page.url === path;
};

// Handle logout
const handleLogout = () => {
  router.post('/logout', {}, {
    onFinish: () => {
      accountDropdownOpen.value = false;
    },
  });
};
</script>

<style scoped>
.nav-link {
  position: relative;
}

.nav-link::after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(to right, rgb(147, 51, 234), rgb(219, 39, 119));
  transition: width 0.3s ease;
}

.nav-link:hover::after {
  width: 100%;
}

.nav-link.active::after {
  width: 100%;
  height: 3px;
}
</style>
