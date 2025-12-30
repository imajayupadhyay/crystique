<template>
  <div class="min-h-screen bg-white relative overflow-hidden">
    <Head title="Crystique - Authentic Crystals & Antique Spiritual Items" />

    <!-- Animated SVG Background -->
    <div class="fixed inset-0 z-0">
      <svg class="absolute w-full h-full" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:rgb(147,51,234);stop-opacity:0.1" />
            <stop offset="100%" style="stop-color:rgb(219,39,119);stop-opacity:0.1" />
          </linearGradient>
        </defs>

        <!-- Animated Circles -->
        <circle class="animate-float-slow" cx="10%" cy="20%" r="120" fill="url(#grad1)" />
        <circle class="animate-float-slower" cx="90%" cy="30%" r="100" fill="url(#grad1)" />
        <circle class="animate-float" cx="20%" cy="80%" r="80" fill="url(#grad1)" />
        <circle class="animate-float-slow" cx="85%" cy="75%" r="150" fill="url(#grad1)" />
        <circle class="animate-float-slower" cx="50%" cy="50%" r="60" fill="url(#grad1)" />

        <!-- Wavy Lines -->
        <path class="animate-wave" d="M0,100 Q250,50 500,100 T1000,100 T1500,100 T2000,100"
              stroke="rgb(147,51,234)" stroke-width="2" fill="none" opacity="0.2"/>
        <path class="animate-wave-slow" d="M0,200 Q250,150 500,200 T1000,200 T1500,200 T2000,200"
              stroke="rgb(219,39,119)" stroke-width="2" fill="none" opacity="0.2"/>
      </svg>
    </div>

    <!-- Content -->
    <div class="relative z-10">
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
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';
import Hero from './components/Hero.vue';
import FeaturedProducts from './components/FeaturedProducts.vue';
import Categories from './components/Categories.vue';
import Features from './components/Features.vue';
</script>

<style scoped>
@keyframes float-slow {
  0%, 100% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(20px, -20px);
  }
}

@keyframes float-slower {
  0%, 100% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(-30px, 30px);
  }
}

@keyframes float {
  0%, 100% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(15px, 15px);
  }
}

@keyframes wave {
  0% {
    d: path('M0,100 Q250,50 500,100 T1000,100 T1500,100 T2000,100');
  }
  50% {
    d: path('M0,100 Q250,150 500,100 T1000,100 T1500,100 T2000,100');
  }
  100% {
    d: path('M0,100 Q250,50 500,100 T1000,100 T1500,100 T2000,100');
  }
}

@keyframes wave-slow {
  0% {
    d: path('M0,200 Q250,150 500,200 T1000,200 T1500,200 T2000,200');
  }
  50% {
    d: path('M0,200 Q250,250 500,200 T1000,200 T1500,200 T2000,200');
  }
  100% {
    d: path('M0,200 Q250,150 500,200 T1000,200 T1500,200 T2000,200');
  }
}

.animate-float-slow {
  animation: float-slow 8s ease-in-out infinite;
}

.animate-float-slower {
  animation: float-slower 10s ease-in-out infinite;
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

.animate-wave {
  animation: wave 15s ease-in-out infinite;
}

.animate-wave-slow {
  animation: wave-slow 20s ease-in-out infinite;
}
</style>
