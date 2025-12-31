<template>
  <teleport to="body">
    <div class="fixed top-4 right-4 z-[9999] flex flex-col gap-3 pointer-events-none">
      <transition-group
        enter-active-class="transition-all duration-300 ease-out"
        enter-from-class="opacity-0 translate-x-full"
        enter-to-class="opacity-100 translate-x-0"
        leave-active-class="transition-all duration-200 ease-in"
        leave-from-class="opacity-100 translate-x-0"
        leave-to-class="opacity-0 translate-x-full"
      >
        <div
          v-for="toast in toasts"
          :key="toast.id"
          class="pointer-events-auto"
        >
          <!-- Success Toast -->
          <div
            v-if="toast.type === 'success'"
            class="bg-white rounded-xl shadow-2xl border-2 border-green-200 p-4 min-w-[320px] max-w-md"
          >
            <div class="flex items-start gap-3">
              <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-gray-900">Success!</p>
                <p class="text-sm text-gray-600 mt-0.5">{{ toast.message }}</p>
              </div>
              <button
                @click="removeToast(toast.id)"
                class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <!-- Progress Bar -->
            <div class="mt-3 h-1 bg-green-100 rounded-full overflow-hidden">
              <div
                class="h-full bg-gradient-to-r from-green-500 to-green-600 rounded-full transition-all duration-[3000ms] ease-linear"
                :style="{ width: toast.progress + '%' }"
              ></div>
            </div>
          </div>

          <!-- Error Toast -->
          <div
            v-else-if="toast.type === 'error'"
            class="bg-white rounded-xl shadow-2xl border-2 border-red-200 p-4 min-w-[320px] max-w-md"
          >
            <div class="flex items-start gap-3">
              <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-gray-900">Error!</p>
                <p class="text-sm text-gray-600 mt-0.5">{{ toast.message }}</p>
              </div>
              <button
                @click="removeToast(toast.id)"
                class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <!-- Progress Bar -->
            <div class="mt-3 h-1 bg-red-100 rounded-full overflow-hidden">
              <div
                class="h-full bg-gradient-to-r from-red-500 to-red-600 rounded-full transition-all duration-[3000ms] ease-linear"
                :style="{ width: toast.progress + '%' }"
              ></div>
            </div>
          </div>

          <!-- Info Toast -->
          <div
            v-else
            class="bg-white rounded-xl shadow-2xl border-2 border-blue-200 p-4 min-w-[320px] max-w-md"
          >
            <div class="flex items-start gap-3">
              <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-gray-900">Info</p>
                <p class="text-sm text-gray-600 mt-0.5">{{ toast.message }}</p>
              </div>
              <button
                @click="removeToast(toast.id)"
                class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <!-- Progress Bar -->
            <div class="mt-3 h-1 bg-blue-100 rounded-full overflow-hidden">
              <div
                class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full transition-all duration-[3000ms] ease-linear"
                :style="{ width: toast.progress + '%' }"
              ></div>
            </div>
          </div>
        </div>
      </transition-group>
    </div>
  </teleport>
</template>

<script setup>
import { ref, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const toasts = ref([]);
let toastId = 0;

const addToast = (message, type = 'info', duration = 3000) => {
  const id = toastId++;
  const toast = {
    id,
    message,
    type,
    progress: 100,
  };

  toasts.value.push(toast);

  // Animate progress bar
  const startTime = Date.now();
  const interval = setInterval(() => {
    const elapsed = Date.now() - startTime;
    const remaining = Math.max(0, 100 - (elapsed / duration) * 100);
    toast.progress = remaining;

    if (remaining === 0) {
      clearInterval(interval);
    }
  }, 16); // ~60fps

  // Auto remove after duration
  setTimeout(() => {
    removeToast(id);
  }, duration);
};

const removeToast = (id) => {
  const index = toasts.value.findIndex(t => t.id === id);
  if (index > -1) {
    toasts.value.splice(index, 1);
  }
};

// Watch for flash messages
watch(
  () => page.props.flash,
  (flash) => {
    if (flash?.success) {
      addToast(flash.success, 'success');
    }
    if (flash?.error) {
      addToast(flash.error, 'error');
    }
  },
  { deep: true, immediate: true }
);
</script>
