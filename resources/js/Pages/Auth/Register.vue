<template>
  <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <Head title="Register - Crystique" />

    <div class="max-w-md w-full">
      <!-- Logo and Header -->
      <div class="text-center mb-8">
        <Link href="/" class="inline-block mb-6">
          <h1 class="text-3xl tracking-[0.3em] font-serif text-gray-900 hover:text-gray-700 transition-colors">
            CRYSTIQUE
          </h1>
        </Link>
        <h2 class="text-3xl font-medium text-gray-900 mb-2 tracking-wide">Create your account</h2>
        <p class="text-gray-600">Join us and start your crystal journey today</p>
      </div>

      <!-- Registration Form Card -->
      <div class="bg-white border border-gray-300 p-8">
        <form @submit.prevent="handleSubmit" class="space-y-6">
          <!-- Name Fields -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
                First Name
              </label>
              <input
                id="first_name"
                v-model="form.first_name"
                type="text"
                required
                class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                :class="{ 'border-red-500': errors.first_name }"
                placeholder="John"
              />
              <p v-if="errors.first_name" class="mt-1 text-sm text-red-600">{{ errors.first_name }}</p>
            </div>
            <div>
              <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
                Last Name
              </label>
              <input
                id="last_name"
                v-model="form.last_name"
                type="text"
                required
                class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                :class="{ 'border-red-500': errors.last_name }"
                placeholder="Doe"
              />
              <p v-if="errors.last_name" class="mt-1 text-sm text-red-600">{{ errors.last_name }}</p>
            </div>
          </div>

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
              class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
              :class="{ 'border-red-500': errors.email }"
              placeholder="john@example.com"
            />
            <p v-if="errors.email" class="mt-1 text-sm text-red-600">{{ errors.email }}</p>
          </div>

          <!-- Password Field -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
              Password
            </label>
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
            <p class="mt-1 text-xs text-gray-500">Minimum 8 characters</p>
          </div>

          <!-- Confirm Password Field -->
          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
              Confirm Password
            </label>
            <input
              id="password_confirmation"
              v-model="form.password_confirmation"
              type="password"
              required
              class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
              placeholder="••••••••"
            />
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
            <span>{{ processing ? 'Creating Account...' : 'Create Account' }}</span>
          </button>
        </form>

        <!-- Divider -->
        <div class="mt-6 flex items-center">
          <div class="flex-1 border-t border-gray-300"></div>
          <span class="px-4 text-sm text-gray-500">or</span>
          <div class="flex-1 border-t border-gray-300"></div>
        </div>

        <!-- Login Link -->
        <div class="mt-6 text-center">
          <p class="text-gray-600">
            Already have an account?
            <Link href="/login" class="font-medium text-gray-900 hover:text-gray-700 transition-colors uppercase tracking-wider text-sm">
              Sign in
            </Link>
          </p>
        </div>
      </div>

      <!-- Features -->
      <div class="mt-8 grid grid-cols-3 gap-4 text-center">
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 border border-gray-300 flex items-center justify-center mb-2">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <p class="text-xs text-gray-600 font-medium">Free Shipping</p>
        </div>
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 border border-gray-300 flex items-center justify-center mb-2">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
          </div>
          <p class="text-xs text-gray-600 font-medium">Secure Payments</p>
        </div>
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 border border-gray-300 flex items-center justify-center mb-2">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </div>
          <p class="text-xs text-gray-600 font-medium">Quality Products</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';

const processing = ref(false);

const form = reactive({
  first_name: '',
  last_name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const errors = ref({});

const handleSubmit = () => {
  processing.value = true;
  errors.value = {};

  router.post('/register', form, {
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
