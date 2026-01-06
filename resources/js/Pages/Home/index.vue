<template>
  <div class="min-h-screen">
    <Head title="Crystique - Authentic Crystals & Antique Spiritual Items" />

    <!-- Content -->
    <div class="relative">
      <!-- Header -->
      <Header />

      <!-- Hero Section -->
      <Hero />

      <!-- Values Section -->
      <Values />

      <!-- Categories -->
      <Categories :products="featuredProducts" />

      <!-- Favorites -->
      <Favorites :products="featuredProducts" />

      <!-- Footer -->
      <Footer />
    </div>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';
import Hero from './components/Hero.vue';
import Values from './components/Values.vue';
import Categories from './components/Categories.vue';
import Favorites from './components/Favorites.vue';

const props = defineProps({
  featuredProducts: {
    type: Array,
    default: () => [],
  },
});
</script>

<style scoped>
/* Styles removed - using default background */
</style>
