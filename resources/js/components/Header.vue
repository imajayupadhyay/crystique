<template>
  <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" :class="headerScrolled ? 'bg-white/90 backdrop-blur-lg shadow-lg' : 'bg-black/20 backdrop-blur-sm'">
    <nav class="container mx-auto px-6 py-4">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
            <span class="text-white font-bold text-xl">C</span>
          </div>
          <span class="text-2xl font-bold transition-colors duration-300" :class="headerScrolled ? 'bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent' : 'text-white'">
            Crystique
          </span>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8">
          <Link href="/" class="nav-link" :class="headerScrolled ? 'text-gray-700 hover:text-purple-600' : 'text-white hover:text-purple-300'">Home</Link>
          <a href="/#products" class="nav-link" :class="headerScrolled ? 'text-gray-700 hover:text-purple-600' : 'text-white hover:text-purple-300'">Products</a>
          <a href="/#categories" class="nav-link" :class="headerScrolled ? 'text-gray-700 hover:text-purple-600' : 'text-white hover:text-purple-300'">Categories</a>
          <a href="/#about" class="nav-link" :class="headerScrolled ? 'text-gray-700 hover:text-purple-600' : 'text-white hover:text-purple-300'">About</a>
          <Link href="/contact" class="nav-link" :class="headerScrolled ? 'text-gray-700 hover:text-purple-600' : 'text-white hover:text-purple-300'">Contact</Link>
        </div>

        <!-- Action Buttons -->
        <div class="hidden md:flex items-center space-x-4">
          <button class="p-2 rounded-full transition-all duration-300 relative group" :class="headerScrolled ? 'hover:bg-gray-100' : 'hover:bg-white/20'">
            <svg class="w-6 h-6 transition-colors" :class="headerScrolled ? 'text-gray-700 group-hover:text-purple-600' : 'text-white group-hover:text-purple-300'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </button>
          <button class="p-2 rounded-full transition-all duration-300 relative group" :class="headerScrolled ? 'hover:bg-gray-100' : 'hover:bg-white/20'">
            <svg class="w-6 h-6 transition-colors" :class="headerScrolled ? 'text-gray-700 group-hover:text-purple-600' : 'text-white group-hover:text-purple-300'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">3</span>
          </button>
          <button class="p-2 rounded-full transition-all duration-300 relative group" :class="headerScrolled ? 'hover:bg-gray-100' : 'hover:bg-white/20'">
            <svg class="w-6 h-6 transition-colors" :class="headerScrolled ? 'text-gray-700 group-hover:text-purple-600' : 'text-white group-hover:text-purple-300'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="absolute -top-1 -right-1 bg-purple-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">2</span>
          </button>
        </div>

        <!-- Mobile Menu Button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg transition-all" :class="headerScrolled ? 'hover:bg-gray-100' : 'hover:bg-white/20'">
          <svg class="w-6 h-6" :class="headerScrolled ? 'text-gray-700' : 'text-white'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu -->
      <transition
        enter-active-class="transition duration-300 ease-out"
        enter-from-class="opacity-0 -translate-y-4"
        enter-to-class="opacity-100 translate-y-0"
        leave-active-class="transition duration-200 ease-in"
        leave-from-class="opacity-100 translate-y-0"
        leave-to-class="opacity-0 -translate-y-4"
      >
        <div v-if="mobileMenuOpen" class="md:hidden mt-4 py-4 bg-white/90 backdrop-blur-lg rounded-lg shadow-xl">
          <Link href="/" class="block px-4 py-3 hover:bg-purple-50 transition-colors">Home</Link>
          <a href="/#products" class="block px-4 py-3 hover:bg-purple-50 transition-colors">Products</a>
          <a href="/#categories" class="block px-4 py-3 hover:bg-purple-50 transition-colors">Categories</a>
          <a href="/#about" class="block px-4 py-3 hover:bg-purple-50 transition-colors">About</a>
          <Link href="/contact" class="block px-4 py-3 hover:bg-purple-50 transition-colors">Contact</Link>
        </div>
      </transition>
    </nav>
  </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const scrolled = ref(false);
const mobileMenuOpen = ref(false);

// Check if we're on a page that should always show the scrolled header style
const isWhiteBackgroundPage = computed(() => {
  return page.url === '/contact';
});

// Header should be in scrolled state if either scrolled down or on white background page
const headerScrolled = computed(() => scrolled.value || isWhiteBackgroundPage.value);

const handleScroll = () => {
  scrolled.value = window.scrollY > 50;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
  handleScroll(); // Check initial scroll position
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<style scoped>
.nav-link {
  position: relative;
}

.nav-link::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(to right, rgb(147, 51, 234), rgb(219, 39, 119));
  transition: width 0.3s ease;
}

.nav-link:hover::after {
  width: 100%;
}
</style>
