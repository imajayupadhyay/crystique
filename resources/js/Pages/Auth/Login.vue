<template>
  <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <Head title="Login - Crystique" />

    <div class="max-w-md w-full">
      <!-- Logo and Header -->
      <div class="text-center mb-8">
        <Link href="/" class="inline-block mb-6">
          <h1 class="text-3xl tracking-[0.3em] font-serif text-gray-900 hover:text-gray-700 transition-colors">
            CRYSTIQUE
          </h1>
        </Link>
        <h2 class="text-3xl font-medium text-gray-900 mb-2 tracking-wide">Welcome back!</h2>
        <p class="text-gray-600">Sign in to your account to continue</p>
      </div>

      <!-- Login Form Card -->
      <div class="bg-white border border-gray-300 p-8">
        <form @submit.prevent="handleSubmit" class="space-y-6">
          <!-- Email Field -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
              Email Address
            </label>
            <input
              id="email"
              v-model="form.email"
              type="email"
              required
              autofocus
              class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
              :class="{ 'border-red-500': errors.email }"
              placeholder="john@example.com"
            />
            <p v-if="errors.email" class="mt-1 text-sm text-red-600">{{ errors.email }}</p>
          </div>

          <!-- Password Field -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <label for="password" class="block text-sm font-medium text-gray-700 uppercase tracking-wider">
                Password
              </label>
              <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors uppercase tracking-wider">
                Forgot?
              </a>
            </div>
            <input
              id="password"
              v-model="form.password"
              type="password"
              required
              class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
              :class="{ 'border-red-500': errors.password }"
              placeholder="••••••••"
            />
            <p v-if="errors.password" class="mt-1 text-sm text-red-600">{{ errors.password }}</p>
          </div>

          <!-- Remember Me -->
          <div class="flex items-center">
            <input
              id="remember"
              v-model="form.remember"
              type="checkbox"
              class="w-4 h-4 text-gray-900 border-gray-300 focus:ring-gray-900"
            />
            <label for="remember" class="ml-2 block text-sm text-gray-700">
              Remember me for 30 days
            </label>
          </div>

          <!-- Submit Button -->
          <button
            type="submit"
            :disabled="processing"
            class="w-full px-6 py-4 bg-gray-900 text-white text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-800 transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
          >
            <svg v-if="processing" class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>{{ processing ? 'Signing in...' : 'Sign In' }}</span>
          </button>
        </form>

        <!-- Divider -->
        <div class="mt-6 flex items-center">
          <div class="flex-1 border-t border-gray-300"></div>
          <span class="px-4 text-sm text-gray-500">or</span>
          <div class="flex-1 border-t border-gray-300"></div>
        </div>

        <!-- Register Link -->
        <div class="mt-6 text-center">
          <p class="text-gray-600">
            Don't have an account?
            <Link href="/register" class="font-medium text-gray-900 hover:text-gray-700 transition-colors uppercase tracking-wider text-sm">
              Create one
            </Link>
          </p>
        </div>
      </div>

      <!-- Benefits -->
      <div class="mt-8 bg-white border border-gray-300 p-6">
        <h3 class="text-sm font-medium text-gray-900 mb-3 uppercase tracking-wider">Why sign in?</h3>
        <ul class="space-y-2">
          <li class="flex items-start gap-3">
            <svg class="w-5 h-5 text-gray-700 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm text-gray-600">Track your orders and delivery status</span>
          </li>
          <li class="flex items-start gap-3">
            <svg class="w-5 h-5 text-gray-700 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm text-gray-600">Save your favorite products</span>
          </li>
          <li class="flex items-start gap-3">
            <svg class="w-5 h-5 text-gray-700 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm text-gray-600">Faster checkout with saved addresses</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';

const processing = ref(false);

const form = reactive({
  email: '',
  password: '',
  remember: false,
});

const errors = ref({});

const handleSubmit = () => {
  processing.value = true;
  errors.value = {};

  router.post('/login', form, {
    onError: (err) => {
      errors.value = err;
      processing.value = false;
    },
    onFinish: () => {
      processing.value = false;
    },
  });
};
</script>
