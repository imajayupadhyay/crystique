<template>
  <footer class="bg-white text-gray-800 pt-16 pb-8">
    <div class="container mx-auto px-6">
      <!-- Main Footer Content -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
        <!-- Newsletter Section -->
        <div>
          <h3 class="text-xs tracking-[0.2em] font-medium uppercase mb-4">
            STAY IN THE LOOP
          </h3>
          <p class="text-sm text-gray-600 mb-6">
            Sign up to our newsletter to receive exclusive offers.
          </p>
          <div class="space-y-3">
            <input
              type="email"
              placeholder="E-mail"
              class="w-full px-4 py-3 text-sm border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
            />
            <button class="w-full px-6 py-3 bg-gray-900 text-white text-xs tracking-wider uppercase hover:bg-gray-800 transition-colors">
              SUBSCRIBE
            </button>
          </div>
        </div>

        <!-- About Us -->
        <div>
          <h3 class="text-xs tracking-[0.2em] font-medium uppercase mb-4">
            ABOUT US
          </h3>
          <ul class="space-y-3">
            <li>
              <Link href="/about" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                About us
              </Link>
            </li>
            <li>
              <Link href="/about" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                Our Curation Process
              </Link>
            </li>
            <li>
              <Link href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                Rewards
              </Link>
            </li>
            <li>
              <Link href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                VIP Membership
              </Link>
            </li>
          </ul>
        </div>

        <!-- Resources -->
        <div>
          <h3 class="text-xs tracking-[0.2em] font-medium uppercase mb-4">
            RESOURCES
          </h3>
          <ul class="space-y-3">
            <li>
              <Link href="/contact" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                Contact Us
              </Link>
            </li>
            <li>
              <Link href="/account" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                Account
              </Link>
            </li>
            <li>
              <Link href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                Wholesale Application
              </Link>
            </li>
            <li>
              <Link href="#" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                Our Locations
              </Link>
            </li>
          </ul>
        </div>

        <!-- Company Info -->
        <div>
          <h3 class="text-xs tracking-[0.2em] font-medium uppercase mb-4">
            FAMILY OWNED SINCE 2025
          </h3>
          <p class="text-sm text-gray-600 leading-relaxed mb-6">
            Welcome to CRYSTIQUE. From our family to yours, we promise to treat you with dignity and respect while providing unmatched service. Whether you spend ₹10 or ₹10,000, we're honored to serve you and cherish that responsibility every day.
          </p>
          <!-- Social Links -->
          <div class="flex space-x-4">
            <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Bottom Footer -->
      <div class="border-t border-gray-200 pt-6">
        <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
          <!-- Policy Links -->
          <div class="flex flex-wrap gap-4 text-xs text-gray-600">
            <a href="#" class="hover:text-gray-900 transition-colors">Shipping & Returns</a>
            <a href="#" class="hover:text-gray-900 transition-colors">Privacy Policy</a>
            <a href="#" class="hover:text-gray-900 transition-colors">Terms of Service</a>
            <a href="#" class="hover:text-gray-900 transition-colors">Accessibility</a>
          </div>

          <!-- Payment Icons -->
          <div class="flex items-center gap-2">
            <!-- Amazon -->
            <div class="w-10 h-6 bg-white border border-gray-200 rounded flex items-center justify-center">
              <span class="text-xs font-bold">A</span>
            </div>
            <!-- Amex -->
            <div class="w-10 h-6 bg-blue-600 rounded flex items-center justify-center">
              <span class="text-white text-[8px] font-bold">AMEX</span>
            </div>
            <!-- Apple Pay -->
            <div class="w-10 h-6 bg-black rounded flex items-center justify-center">
              <span class="text-white text-[10px]">PAY</span>
            </div>
            <!-- Diners -->
            <div class="w-10 h-6 bg-white border border-gray-200 rounded flex items-center justify-center">
              <span class="text-xs">DC</span>
            </div>
            <!-- Discover -->
            <div class="w-10 h-6 bg-orange-500 rounded flex items-center justify-center">
              <span class="text-white text-[8px] font-bold">DISC</span>
            </div>
            <!-- Google Pay -->
            <div class="w-10 h-6 bg-white border border-gray-200 rounded flex items-center justify-center">
              <span class="text-xs">G</span>
            </div>
            <!-- Mastercard -->
            <div class="w-10 h-6 bg-white border border-gray-200 rounded flex items-center justify-center">
              <div class="flex -space-x-1">
                <div class="w-2 h-2 rounded-full bg-red-500"></div>
                <div class="w-2 h-2 rounded-full bg-orange-400"></div>
              </div>
            </div>
            <!-- PayPal -->
            <div class="w-10 h-6 bg-blue-500 rounded flex items-center justify-center">
              <span class="text-white text-[8px] font-bold">PP</span>
            </div>
            <!-- Shop Pay -->
            <div class="w-10 h-6 bg-purple-600 rounded flex items-center justify-center">
              <span class="text-white text-[8px] font-bold">SHOP</span>
            </div>
            <!-- Visa -->
            <div class="w-10 h-6 bg-blue-700 rounded flex items-center justify-center">
              <span class="text-white text-[10px] font-bold">VISA</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
/* Clean design - no additional styles needed */
</style>
