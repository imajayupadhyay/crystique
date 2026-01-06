<template>
  <header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-300">
    <!-- Top Section: Logo and Icons -->
    <div class="container mx-auto px-6 py-4">
      <div class="flex items-center justify-between">
        <!-- Left spacer for alignment -->
        <div class="w-24"></div>

        <!-- Center Logo -->
        <Link href="/" class="flex-1 flex justify-center">
          <h1 class="text-2xl tracking-[0.3em] font-serif text-gray-900 hover:text-gray-700 transition-colors">
            CRYSTIQUE
          </h1>
        </Link>

        <!-- Right Icons -->
        <div class="flex items-center space-x-4 w-24 justify-end">
          <!-- Account Icon -->
          <button
            @click="accountDropdownOpen = !accountDropdownOpen"
            class="relative p-1 hover:opacity-70 transition-opacity"
          >
            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span
              v-if="customer"
              class="absolute -top-0.5 -right-0.5 w-2 h-2 bg-green-500 rounded-full"
            ></span>
          </button>

          <!-- Search Icon -->
          <button
            @click="searchOpen = !searchOpen"
            class="p-1 hover:opacity-70 transition-opacity"
          >
            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </button>

          <!-- Cart Icon -->
          <button
            @click="toggleCart"
            class="relative p-1 hover:opacity-70 transition-opacity"
          >
            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span
              v-if="cartCount > 0"
              class="absolute -top-1 -right-1 bg-black text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-medium"
            >{{ cartCount }}</span>
          </button>

          <!-- Mobile Menu Button -->
          <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-1 hover:opacity-70 transition-opacity">
            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="border-t border-gray-200 hidden md:block">
      <div class="container mx-auto px-6">
        <div class="flex items-center justify-center space-x-8 py-4">
          <Link
            href="/products"
            class="nav-link text-sm tracking-[0.15em] font-bold text-gray-700 hover:text-black transition-colors uppercase"
            :class="{ 'text-black': isActive('/products') || page.url.startsWith('/products/crystals') }"
          >
            HEALING CRYSTALS
          </Link>
          <Link
            href="/products"
            class="nav-link text-sm tracking-[0.15em] font-bold text-gray-700 hover:text-black transition-colors uppercase"
            :class="{ 'text-black': page.url.startsWith('/products/jaap-mala') }"
          >
            JAAP MALA
          </Link>
          <Link
            href="/products"
            class="nav-link text-sm tracking-[0.15em] font-bold text-gray-700 hover:text-black transition-colors uppercase"
            :class="{ 'text-black': page.url.startsWith('/products/jewelry') }"
          >
            JEWELRY
          </Link>
          <Link
            href="/about"
            class="nav-link text-sm tracking-[0.15em] font-bold text-gray-700 hover:text-black transition-colors uppercase"
            :class="{ 'text-black': isActive('/about') }"
          >
            ABOUT
          </Link>
          <Link
            href="/contact"
            class="nav-link text-sm tracking-[0.15em] font-bold text-gray-700 hover:text-black transition-colors uppercase"
            :class="{ 'text-black': isActive('/contact') }"
          >
            CONTACT
          </Link>
        </div>
      </div>
    </nav>

    <!-- Account Dropdown -->
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
        class="absolute right-6 top-16 w-56 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50"
      >
        <!-- Guest Menu -->
        <template v-if="!customer">
          <Link
            href="/login"
            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors"
            @click="accountDropdownOpen = false"
          >
            Login
          </Link>
          <Link
            href="/register"
            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors"
            @click="accountDropdownOpen = false"
          >
            Register
          </Link>
        </template>

        <!-- Authenticated Menu -->
        <template v-else>
          <div class="px-4 py-3 border-b border-gray-100">
            <p class="text-sm font-medium text-gray-900">{{ customer.full_name }}</p>
            <p class="text-xs text-gray-500 mt-0.5">{{ customer.email }}</p>
          </div>
          <Link
            href="/account"
            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors"
            @click="accountDropdownOpen = false"
          >
            My Account
          </Link>
          <button
            @click="handleLogout"
            class="w-full text-left px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors"
          >
            Logout
          </button>
        </template>
      </div>
    </transition>

    <!-- Search Dropdown -->
    <transition
      enter-active-class="transition ease-out duration-200"
      enter-from-class="opacity-0 -translate-y-2"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition ease-in duration-150"
      leave-from-class="opacity-100 translate-y-0"
      leave-to-class="opacity-0 -translate-y-2"
    >
      <div
        v-if="searchOpen"
        class="absolute left-0 right-0 top-full bg-white border-b border-gray-300 shadow-lg"
      >
        <div class="container mx-auto px-6 py-6">
          <div class="relative max-w-2xl mx-auto">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Search for products..."
              class="w-full px-5 py-3 pr-12 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-gray-900 transition-colors"
              @keyup.esc="searchOpen = false"
            />
            <button
              @click="searchOpen = false"
              class="absolute right-3 top-1/2 -translate-y-1/2 p-1 hover:opacity-70 transition-opacity"
            >
              <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </transition>

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
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
          <h2 class="text-xl tracking-[0.2em] font-serif text-gray-900">CRYSTIQUE</h2>
          <button
            @click="mobileMenuOpen = false"
            class="p-2 hover:bg-gray-100 rounded-lg transition-colors"
          >
            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Mobile Menu Navigation -->
        <nav class="flex-1 p-6 space-y-1 overflow-y-auto">
          <Link
            href="/products"
            @click="mobileMenuOpen = false"
            class="block px-4 py-3 text-sm tracking-[0.1em] text-gray-700 hover:bg-gray-50 rounded-lg transition-colors uppercase"
          >
            HEALING CRYSTALS
          </Link>
          <Link
            href="/products"
            @click="mobileMenuOpen = false"
            class="block px-4 py-3 text-sm tracking-[0.1em] text-gray-700 hover:bg-gray-50 rounded-lg transition-colors uppercase"
          >
            JAAP MALA
          </Link>
          <Link
            href="/products"
            @click="mobileMenuOpen = false"
            class="block px-4 py-3 text-sm tracking-[0.1em] text-gray-700 hover:bg-gray-50 rounded-lg transition-colors uppercase"
          >
            JEWELRY
          </Link>
          <Link
            href="/about"
            @click="mobileMenuOpen = false"
            class="block px-4 py-3 text-sm tracking-[0.1em] text-gray-700 hover:bg-gray-50 rounded-lg transition-colors uppercase"
          >
            ABOUT
          </Link>
          <Link
            href="/contact"
            @click="mobileMenuOpen = false"
            class="block px-4 py-3 text-sm tracking-[0.1em] text-gray-700 hover:bg-gray-50 rounded-lg transition-colors uppercase"
          >
            CONTACT
          </Link>

          <div class="border-t border-gray-200 my-4"></div>

          <!-- Account Links -->
          <template v-if="!customer">
            <Link
              href="/login"
              @click="mobileMenuOpen = false"
              class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors"
            >
              Login
            </Link>
            <Link
              href="/register"
              @click="mobileMenuOpen = false"
              class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors"
            >
              Register
            </Link>
          </template>
          <template v-else>
            <div class="px-4 py-3 bg-gray-50 rounded-lg mb-2">
              <p class="text-sm font-medium text-gray-900">{{ customer.full_name }}</p>
              <p class="text-xs text-gray-500 mt-0.5">{{ customer.email }}</p>
            </div>
            <Link
              href="/account"
              @click="mobileMenuOpen = false"
              class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors"
            >
              My Account
            </Link>
            <button
              @click="handleLogout(); mobileMenuOpen = false"
              class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors"
            >
              Logout
            </button>
          </template>
        </nav>
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
const searchOpen = ref(false);
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

.nav-link:hover {
  text-decoration: none;
}
</style>
