<template>
  <div class="min-h-screen bg-white">
    <Head title="Contact Us - Crystique" />

    <!-- Header -->
    <Header />

    <!-- Contact Section -->
    <ContactForm />

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';
import ContactForm from './components/ContactForm.vue';
</script>

<style scoped>
/* Contact page styles */
</style>
