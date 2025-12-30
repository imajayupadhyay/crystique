<template>
  <div class="min-h-screen bg-white">
    <!-- Header -->
    <Header />

    <!-- Contact Section -->
    <ContactForm />

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import ContactForm from './components/ContactForm.vue';
</script>

<style scoped>
/* Contact page styles */
</style>
