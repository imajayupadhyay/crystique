<template>
  <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <Head title="Authentication - Crystique" />

    <div class="max-w-md w-full">
      <!-- Logo and Header -->
      <div class="text-center mb-8">
        <Link href="/" class="inline-block mb-6">
          <h1 class="text-3xl tracking-[0.3em] font-serif text-gray-900 hover:text-gray-700 transition-colors">
            CRYSTIQUE
          </h1>
        </Link>
        <h2 class="text-3xl font-medium text-gray-900 mb-2 tracking-wide">
          {{ isLogin ? 'Welcome back!' : 'Create your account' }}
        </h2>
        <p class="text-gray-600">
          {{ isLogin ? 'Sign in to your account to continue' : 'Join us and start your crystal journey today' }}
        </p>
      </div>

      <!-- Auth Form Card -->
      <div class="bg-white border border-gray-300 p-8">
        <!-- Toggle Buttons -->
        <div class="flex border border-gray-300 mb-6">
          <button
            @click="isLogin = true"
            class="flex-1 px-6 py-3 text-xs tracking-[0.15em] uppercase font-medium transition-colors"
            :class="isLogin ? 'bg-gray-900 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
          >
            Sign In
          </button>
          <button
            @click="isLogin = false"
            class="flex-1 px-6 py-3 text-xs tracking-[0.15em] uppercase font-medium transition-colors"
            :class="!isLogin ? 'bg-gray-900 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
          >
            Register
          </button>
        </div>

        <!-- Login Form -->
        <form v-if="isLogin" @submit.prevent="handleLogin" class="space-y-6">
          <!-- Email Field -->
          <div>
            <label for="login-email" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
              Email Address
            </label>
            <input
              id="login-email"
              v-model="loginForm.email"
              type="email"
              required
              autofocus
              class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
              :class="{ 'border-red-500': loginErrors.email }"
              placeholder="john@example.com"
            />
            <p v-if="loginErrors.email" class="mt-1 text-sm text-red-600">{{ loginErrors.email }}</p>
          </div>

          <!-- Password Field -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <label for="login-password" class="block text-sm font-medium text-gray-700 uppercase tracking-wider">
                Password
              </label>
              <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors uppercase tracking-wider">
                Forgot?
              </a>
            </div>
            <input
              id="login-password"
              v-model="loginForm.password"
              type="password"
              required
              class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
              :class="{ 'border-red-500': loginErrors.password }"
              placeholder="••••••••"
            />
            <p v-if="loginErrors.password" class="mt-1 text-sm text-red-600">{{ loginErrors.password }}</p>
          </div>

          <!-- Remember Me -->
          <div class="flex items-center">
            <input
              id="remember"
              v-model="loginForm.remember"
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
            :disabled="loginProcessing"
            class="w-full px-6 py-4 bg-gray-900 text-white text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-800 transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
          >
            <svg v-if="loginProcessing" class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>{{ loginProcessing ? 'Signing in...' : 'Sign In' }}</span>
          </button>
        </form>

        <!-- Register Form -->
        <form v-else @submit.prevent="handleRegister" class="space-y-6">
          <!-- Name Fields -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
                First Name
              </label>
              <input
                id="first_name"
                v-model="registerForm.first_name"
                type="text"
                required
                class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                :class="{ 'border-red-500': registerErrors.first_name }"
                placeholder="John"
              />
              <p v-if="registerErrors.first_name" class="mt-1 text-sm text-red-600">{{ registerErrors.first_name }}</p>
            </div>
            <div>
              <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
                Last Name
              </label>
              <input
                id="last_name"
                v-model="registerForm.last_name"
                type="text"
                required
                class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
                :class="{ 'border-red-500': registerErrors.last_name }"
                placeholder="Doe"
              />
              <p v-if="registerErrors.last_name" class="mt-1 text-sm text-red-600">{{ registerErrors.last_name }}</p>
            </div>
          </div>

          <!-- Email Field -->
          <div>
            <label for="register-email" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
              Email Address
            </label>
            <input
              id="register-email"
              v-model="registerForm.email"
              type="email"
              required
              class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
              :class="{ 'border-red-500': registerErrors.email }"
              placeholder="john@example.com"
            />
            <p v-if="registerErrors.email" class="mt-1 text-sm text-red-600">{{ registerErrors.email }}</p>
          </div>

          <!-- Password Field -->
          <div>
            <label for="register-password" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
              Password
            </label>
            <input
              id="register-password"
              v-model="registerForm.password"
              type="password"
              required
              class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
              :class="{ 'border-red-500': registerErrors.password }"
              placeholder="••••••••"
            />
            <p v-if="registerErrors.password" class="mt-1 text-sm text-red-600">{{ registerErrors.password }}</p>
            <p class="mt-1 text-xs text-gray-500">Minimum 8 characters</p>
          </div>

          <!-- Confirm Password Field -->
          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">
              Confirm Password
            </label>
            <input
              id="password_confirmation"
              v-model="registerForm.password_confirmation"
              type="password"
              required
              class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-gray-900 transition-colors"
              placeholder="••••••••"
            />
          </div>

          <!-- Submit Button -->
          <button
            type="submit"
            :disabled="registerProcessing"
            class="w-full px-6 py-4 bg-gray-900 text-white text-xs tracking-[0.15em] uppercase font-medium hover:bg-gray-800 transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
          >
            <svg v-if="registerProcessing" class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>{{ registerProcessing ? 'Creating Account...' : 'Create Account' }}</span>
          </button>
        </form>
      </div>

      <!-- Benefits Section (Only shown for login) -->
      <div v-if="isLogin" class="mt-8 bg-white border border-gray-300 p-6">
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

      <!-- Features (Only shown for register) -->
      <div v-else class="mt-8 grid grid-cols-3 gap-4 text-center">
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

const isLogin = ref(true);

// Login form
const loginProcessing = ref(false);
const loginForm = reactive({
  email: '',
  password: '',
  remember: false,
});
const loginErrors = ref({});

// Register form
const registerProcessing = ref(false);
const registerForm = reactive({
  first_name: '',
  last_name: '',
  email: '',
  password: '',
  password_confirmation: '',
});
const registerErrors = ref({});

const handleLogin = () => {
  loginProcessing.value = true;
  loginErrors.value = {};

  router.post('/login', loginForm, {
    onError: (err) => {
      loginErrors.value = err;
      loginProcessing.value = false;
    },
    onFinish: () => {
      loginProcessing.value = false;
    },
  });
};

const handleRegister = () => {
  registerProcessing.value = true;
  registerErrors.value = {};

  router.post('/register', registerForm, {
    onError: (err) => {
      registerErrors.value = err;
      registerProcessing.value = false;
    },
    onFinish: () => {
      registerProcessing.value = false;
    },
  });
};
</script>
