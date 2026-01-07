<template>
  <div class="min-h-screen">
    <Head title="About Us - Crystique" />

    <!-- Header -->
    <Header />

    <!-- About Page Content -->
    <div class="pt-36" style="background-color: #ddd9ce;">
      <!-- Hero Section -->
      <AboutHero />

      <!-- Our Story -->
      <OurStory />

      <!-- Mission & Vision -->
      <MissionVision />

      <!-- Stats Section -->
      <StatsSection />

      <!-- Values Section -->
      <ValuesSection />

      <!-- Team Section -->
      <TeamSection />
    </div>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';
import AboutHero from './components/AboutHero.vue';
import OurStory from './components/OurStory.vue';
import MissionVision from './components/MissionVision.vue';
import StatsSection from './components/StatsSection.vue';
import ValuesSection from './components/ValuesSection.vue';
import TeamSection from './components/TeamSection.vue';
</script>
