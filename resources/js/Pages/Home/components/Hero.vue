<template>
  <section class="relative min-h-screen flex items-center" style="background-color: #ddd9ce;">
    <div class="w-full">
      <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen">
        <!-- Left Side: Text Content -->
        <div class="flex items-center justify-center lg:justify-end px-8 lg:px-16 py-20 lg:py-0">
          <div class="max-w-md lg:mr-12">
            <!-- Small Tagline -->
            <p class="text-xs tracking-[0.2em] uppercase text-gray-700 mb-8">
              STEWARDS OF NATURE
            </p>

            <!-- Main Headline -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif leading-tight text-gray-900 mb-10">
              ELEVATE AND<br>
              INSPIRE LIFE<br>
              AT YOUR HOME
            </h1>

            <!-- CTA Button -->
            <Link href="/products" class="inline-block">
              <button class="px-8 py-3 border-2 border-gray-900 text-gray-900 text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-900 hover:text-white transition-all duration-300">
                SHOP NEW AMETHYST
              </button>
            </Link>
          </div>
        </div>

        <!-- Right Side: Image -->
        <div class="flex items-center justify-center lg:justify-start">
          <div class="w-full h-full min-h-[500px] lg:min-h-screen">
            <img
              src="https://kalifano.com/cdn/shop/files/lifestyle-090123-11.jpg?v=1759353399&width=1000"
              alt="Amethyst Crystal"
              class="w-full h-full object-cover"
            />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
/* No additional styles needed */
</style>
