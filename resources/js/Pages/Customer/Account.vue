<template>
  <div class="min-h-screen bg-white">
    <Head title="My Account - Crystique" />

    <!-- Header -->
    <Header />

    <!-- Main Content -->
    <div class="pt-28 pb-20">
      <div class="container mx-auto px-6">
        <!-- Page Header -->
        <div class="mb-8">
          <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">
            My <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Account</span>
          </h1>
          <p class="text-gray-600 text-lg">Manage your profile and preferences</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <!-- Sidebar -->
          <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl border-2 border-purple-200 p-6 sticky top-28">
              <!-- Profile Summary -->
              <div class="text-center mb-6">
                <div class="w-24 h-24 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                  <span class="text-white font-bold text-3xl">{{ customer.first_name[0] }}{{ customer.last_name[0] }}</span>
                </div>
                <h2 class="text-xl font-bold text-gray-900">{{ customer.full_name }}</h2>
                <p class="text-sm text-gray-600 mt-1">{{ customer.email }}</p>
              </div>

              <!-- Navigation Menu -->
              <nav class="space-y-2">
                <button
                  @click="activeTab = 'profile'"
                  class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all"
                  :class="activeTab === 'profile' ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg' : 'hover:bg-white text-gray-700'"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  <span>Profile Details</span>
                </button>
                <button
                  @click="activeTab = 'orders'"
                  class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all"
                  :class="activeTab === 'orders' ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg' : 'hover:bg-white text-gray-700'"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                  </svg>
                  <span>Order History</span>
                </button>
                <button
                  @click="activeTab = 'security'"
                  class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all"
                  :class="activeTab === 'security' ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg' : 'hover:bg-white text-gray-700'"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                  <span>Security</span>
                </button>
              </nav>
            </div>
          </div>

          <!-- Main Content Area -->
          <div class="lg:col-span-2">
            <!-- Profile Details Tab -->
            <div v-if="activeTab === 'profile'" class="bg-white rounded-2xl border border-gray-200 p-8">
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Profile Information</h2>

              <form @submit.prevent="updateProfile" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                    <input
                      v-model="profileForm.first_name"
                      type="text"
                      required
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                      :class="{ 'border-red-500': profileErrors.first_name }"
                    />
                    <p v-if="profileErrors.first_name" class="mt-1 text-sm text-red-600">{{ profileErrors.first_name }}</p>
                  </div>
                  <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                    <input
                      v-model="profileForm.last_name"
                      type="text"
                      required
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                      :class="{ 'border-red-500': profileErrors.last_name }"
                    />
                    <p v-if="profileErrors.last_name" class="mt-1 text-sm text-red-600">{{ profileErrors.last_name }}</p>
                  </div>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                  <input
                    v-model="profileForm.email"
                    type="email"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    :class="{ 'border-red-500': profileErrors.email }"
                  />
                  <p v-if="profileErrors.email" class="mt-1 text-sm text-red-600">{{ profileErrors.email }}</p>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                  <input
                    v-model="profileForm.phone"
                    type="tel"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                  />
                </div>

                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Street Address</label>
                  <input
                    v-model="profileForm.address"
                    type="text"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                  />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                  <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">City</label>
                    <input
                      v-model="profileForm.city"
                      type="text"
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    />
                  </div>
                  <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">State</label>
                    <input
                      v-model="profileForm.state"
                      type="text"
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    />
                  </div>
                  <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">ZIP Code</label>
                    <input
                      v-model="profileForm.zip_code"
                      type="text"
                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    />
                  </div>
                </div>

                <button
                  type="submit"
                  :disabled="updatingProfile"
                  class="px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold shadow-lg hover:shadow-xl transition-all hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                  {{ updatingProfile ? 'Saving...' : 'Save Changes' }}
                </button>
              </form>
            </div>

            <!-- Order History Tab -->
            <div v-if="activeTab === 'orders'" class="bg-white rounded-2xl border border-gray-200 p-8">
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Order History</h2>

              <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No orders yet</h3>
                <p class="text-gray-600 mb-6">Start shopping to see your order history here</p>
                <Link href="/products" class="inline-block px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold shadow-lg hover:shadow-xl transition-all">
                  Browse Products
                </Link>
              </div>
            </div>

            <!-- Security Tab -->
            <div v-if="activeTab === 'security'" class="bg-white rounded-2xl border border-gray-200 p-8">
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Change Password</h2>

              <form @submit.prevent="updatePassword" class="space-y-6">
                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Current Password</label>
                  <input
                    v-model="passwordForm.current_password"
                    type="password"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    :class="{ 'border-red-500': passwordErrors.current_password }"
                  />
                  <p v-if="passwordErrors.current_password" class="mt-1 text-sm text-red-600">{{ passwordErrors.current_password }}</p>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">New Password</label>
                  <input
                    v-model="passwordForm.password"
                    type="password"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    :class="{ 'border-red-500': passwordErrors.password }"
                  />
                  <p v-if="passwordErrors.password" class="mt-1 text-sm text-red-600">{{ passwordErrors.password }}</p>
                  <p class="mt-1 text-xs text-gray-500">Minimum 8 characters</p>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm New Password</label>
                  <input
                    v-model="passwordForm.password_confirmation"
                    type="password"
                    required
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                  />
                </div>

                <button
                  type="submit"
                  :disabled="updatingPassword"
                  class="px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold shadow-lg hover:shadow-xl transition-all hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                  {{ updatingPassword ? 'Updating...' : 'Update Password' }}
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import Footer from '../../components/Footer.vue';

const props = defineProps({
  customer: {
    type: Object,
    required: true,
  },
});

const activeTab = ref('profile');
const updatingProfile = ref(false);
const updatingPassword = ref(false);

// Profile Form
const profileForm = reactive({
  first_name: props.customer.first_name,
  last_name: props.customer.last_name,
  email: props.customer.email,
  phone: props.customer.phone || '',
  address: props.customer.address || '',
  city: props.customer.city || '',
  state: props.customer.state || '',
  zip_code: props.customer.zip_code || '',
});

const profileErrors = ref({});

// Password Form
const passwordForm = reactive({
  current_password: '',
  password: '',
  password_confirmation: '',
});

const passwordErrors = ref({});

// Update Profile
const updateProfile = () => {
  updatingProfile.value = true;
  profileErrors.value = {};

  router.put('/account', profileForm, {
    onError: (err) => {
      profileErrors.value = err;
      updatingProfile.value = false;
    },
    onFinish: () => {
      updatingProfile.value = false;
    },
  });
};

// Update Password
const updatePassword = () => {
  updatingPassword.value = true;
  passwordErrors.value = {};

  router.put('/account/password', passwordForm, {
    onSuccess: () => {
      passwordForm.current_password = '';
      passwordForm.password = '';
      passwordForm.password_confirmation = '';
    },
    onError: (err) => {
      passwordErrors.value = err;
      updatingPassword.value = false;
    },
    onFinish: () => {
      updatingPassword.value = false;
    },
  });
};
</script>
