import { ref, computed, watch } from 'vue';

const WISHLIST_STORAGE_KEY = 'crystique_wishlist';

// Shared state across all components
const wishlistItems = ref([]);
const isWishlistOpen = ref(false);

// Initialize from localStorage
const initializeWishlist = () => {
  if (typeof window !== 'undefined') {
    const stored = localStorage.getItem(WISHLIST_STORAGE_KEY);
    if (stored) {
      try {
        wishlistItems.value = JSON.parse(stored);
      } catch (e) {
        console.error('Failed to parse wishlist data:', e);
        wishlistItems.value = [];
      }
    }
  }
};

// Save to localStorage whenever wishlist changes
watch(wishlistItems, (newWishlist) => {
  if (typeof window !== 'undefined') {
    localStorage.setItem(WISHLIST_STORAGE_KEY, JSON.stringify(newWishlist));
  }
}, { deep: true });

export function useWishlist() {
  // Initialize wishlist on first use
  if (wishlistItems.value.length === 0 && typeof window !== 'undefined') {
    initializeWishlist();
  }

  // Add item to wishlist
  const addToWishlist = (product) => {
    const exists = wishlistItems.value.some(item => item.id === product.id);

    if (!exists) {
      wishlistItems.value.push({
        ...product,
        addedAt: new Date().toISOString(),
      });
    }
  };

  // Remove item from wishlist
  const removeFromWishlist = (productId) => {
    const index = wishlistItems.value.findIndex(item => item.id === productId);
    if (index > -1) {
      wishlistItems.value.splice(index, 1);
    }
  };

  // Toggle item in wishlist
  const toggleWishlist = (product) => {
    if (isInWishlist(product.id)) {
      removeFromWishlist(product.id);
    } else {
      addToWishlist(product);
    }
  };

  // Clear entire wishlist
  const clearWishlist = () => {
    wishlistItems.value = [];
  };

  // Check if product is in wishlist
  const isInWishlist = (productId) => {
    return wishlistItems.value.some(item => item.id === productId);
  };

  // Computed values
  const wishlistCount = computed(() => {
    return wishlistItems.value.length;
  });

  // Toggle wishlist modal
  const toggleWishlistModal = () => {
    isWishlistOpen.value = !isWishlistOpen.value;
  };

  const openWishlistModal = () => {
    isWishlistOpen.value = true;
  };

  const closeWishlistModal = () => {
    isWishlistOpen.value = false;
  };

  return {
    // State
    wishlistItems,
    isWishlistOpen,

    // Actions
    addToWishlist,
    removeFromWishlist,
    toggleWishlist,
    clearWishlist,
    toggleWishlistModal,
    openWishlistModal,
    closeWishlistModal,

    // Getters
    isInWishlist,

    // Computed
    wishlistCount,
  };
}
