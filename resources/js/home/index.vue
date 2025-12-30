<template>
  <div class="min-h-screen bg-white">
    <!-- Header -->
    <Header />

    <!-- Hero Section -->
    <Hero />

    <!-- Featured Products -->
    <FeaturedProducts />

    <!-- Categories -->
    <Categories />

    <!-- Features & About -->
    <Features />

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import Hero from './Hero.vue';
import FeaturedProducts from './FeaturedProducts.vue';
import Categories from './Categories.vue';
import Features from './Features.vue';
</script>

<style scoped>
/* Additional global styles */
</style>
