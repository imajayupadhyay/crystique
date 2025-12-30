<template>
  <aside class="lg:w-80 flex-shrink-0">
    <div class="bg-white rounded-2xl border border-gray-100 p-6 sticky top-24">
      <!-- Filters Header -->
      <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-bold text-gray-900">Filters</h3>
        <button
          @click="clearFilters"
          class="text-sm text-purple-600 hover:text-purple-700 font-semibold"
        >
          Clear All
        </button>
      </div>

      <!-- Categories Filter -->
      <div class="mb-6 pb-6 border-b border-gray-100">
        <h4 class="font-semibold text-gray-900 mb-4">Categories</h4>
        <div class="space-y-3">
          <label
            v-for="category in categories"
            :key="category"
            class="flex items-center cursor-pointer group"
          >
            <input
              type="checkbox"
              :value="category"
              v-model="localFilters.categories"
              class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500 cursor-pointer"
            />
            <span class="ml-3 text-gray-700 group-hover:text-purple-600 transition-colors">{{ category }}</span>
          </label>
        </div>
      </div>

      <!-- Price Range Filter -->
      <div class="mb-6 pb-6 border-b border-gray-100">
        <h4 class="font-semibold text-gray-900 mb-4">Price Range</h4>
        <div class="space-y-4">
          <div class="flex items-center justify-between text-sm text-gray-600">
            <span>${{ localFilters.priceRange[0] }}</span>
            <span>${{ localFilters.priceRange[1] }}</span>
          </div>
          <div class="space-y-2">
            <input
              type="range"
              min="0"
              max="500"
              step="10"
              v-model="localFilters.priceRange[0]"
              class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-purple-600"
            />
            <input
              type="range"
              min="0"
              max="500"
              step="10"
              v-model="localFilters.priceRange[1]"
              class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-purple-600"
            />
          </div>
        </div>
      </div>

      <!-- Rating Filter -->
      <div class="mb-6 pb-6 border-b border-gray-100">
        <h4 class="font-semibold text-gray-900 mb-4">Minimum Rating</h4>
        <div class="space-y-3">
          <label
            v-for="rating in [5, 4, 3, 2, 1]"
            :key="rating"
            class="flex items-center cursor-pointer group"
          >
            <input
              type="radio"
              :value="rating"
              v-model="localFilters.rating"
              name="rating"
              class="w-5 h-5 text-purple-600 border-gray-300 focus:ring-purple-500 cursor-pointer"
            />
            <div class="ml-3 flex items-center gap-1">
              <svg
                v-for="star in 5"
                :key="star"
                class="w-4 h-4"
                :class="star <= rating ? 'text-yellow-400' : 'text-gray-300'"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <span class="text-sm text-gray-600 group-hover:text-purple-600 transition-colors">& Up</span>
            </div>
          </label>
        </div>
      </div>

      <!-- In Stock Filter -->
      <div>
        <label class="flex items-center cursor-pointer group">
          <input
            type="checkbox"
            v-model="localFilters.inStock"
            class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500 cursor-pointer"
          />
          <span class="ml-3 font-semibold text-gray-700 group-hover:text-purple-600 transition-colors">
            In Stock Only
          </span>
        </label>
      </div>
    </div>
  </aside>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
  filters: {
    type: Object,
    required: true,
  },
});

const emit = defineEmits(['update:filters']);

const categories = ['Crystals', 'Jaap Mala', 'Jewelry', 'Incense', 'Antiques'];

const localFilters = ref({ ...props.filters });

watch(localFilters, (newFilters) => {
  emit('update:filters', newFilters);
}, { deep: true });

const clearFilters = () => {
  localFilters.value = {
    categories: [],
    priceRange: [0, 500],
    rating: 0,
    inStock: false,
  };
};
</script>
