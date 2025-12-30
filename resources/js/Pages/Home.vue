<template>
  <div class="min-h-screen bg-white">
    <Head title="Crystique - Authentic Crystals & Antique Spiritual Items" />

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
import { Head } from '@inertiajs/vue3';
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import Hero from '../home/Hero.vue';
import FeaturedProducts from '../home/FeaturedProducts.vue';
import Categories from '../home/Categories.vue';
import Features from '../home/Features.vue';
</script>

<style scoped>
/* Additional global styles */
</style>
