import { ref, computed, watch } from 'vue';

const CART_STORAGE_KEY = 'crystique_cart';

// Shared state across all components
const cartItems = ref([]);
const isCartOpen = ref(false);

// Initialize from localStorage
const initializeCart = () => {
  if (typeof window !== 'undefined') {
    const stored = localStorage.getItem(CART_STORAGE_KEY);
    if (stored) {
      try {
        cartItems.value = JSON.parse(stored);
      } catch (e) {
        console.error('Failed to parse cart data:', e);
        cartItems.value = [];
      }
    }
  }
};

// Save to localStorage whenever cart changes
watch(cartItems, (newCart) => {
  if (typeof window !== 'undefined') {
    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(newCart));
  }
}, { deep: true });

export function useCart() {
  // Initialize cart on first use
  if (cartItems.value.length === 0 && typeof window !== 'undefined') {
    initializeCart();
  }

  // Add item to cart
  const addToCart = (product, quantity = 1) => {
    const existingItem = cartItems.value.find(item => item.id === product.id);

    if (existingItem) {
      existingItem.quantity += quantity;
    } else {
      cartItems.value.push({
        ...product,
        quantity,
        addedAt: new Date().toISOString(),
      });
    }
  };

  // Remove item from cart
  const removeFromCart = (productId) => {
    const index = cartItems.value.findIndex(item => item.id === productId);
    if (index > -1) {
      cartItems.value.splice(index, 1);
    }
  };

  // Update item quantity
  const updateQuantity = (productId, quantity) => {
    const item = cartItems.value.find(item => item.id === productId);
    if (item) {
      if (quantity <= 0) {
        removeFromCart(productId);
      } else {
        item.quantity = quantity;
      }
    }
  };

  // Clear entire cart
  const clearCart = () => {
    cartItems.value = [];
  };

  // Check if product is in cart
  const isInCart = (productId) => {
    return cartItems.value.some(item => item.id === productId);
  };

  // Get item quantity
  const getItemQuantity = (productId) => {
    const item = cartItems.value.find(item => item.id === productId);
    return item ? item.quantity : 0;
  };

  // Computed values
  const cartCount = computed(() => {
    return cartItems.value.reduce((total, item) => total + item.quantity, 0);
  });

  const cartTotal = computed(() => {
    return cartItems.value.reduce((total, item) => {
      return total + (item.price * item.quantity);
    }, 0);
  });

  const cartSubtotal = computed(() => cartTotal.value);

  const cartTax = computed(() => cartTotal.value * 0.1); // 10% tax

  const cartShipping = computed(() => {
    return cartTotal.value > 50 ? 0 : 5.99;
  });

  const cartGrandTotal = computed(() => {
    return cartSubtotal.value + cartTax.value + cartShipping.value;
  });

  // Toggle cart modal
  const toggleCart = () => {
    isCartOpen.value = !isCartOpen.value;
  };

  const openCart = () => {
    isCartOpen.value = true;
  };

  const closeCart = () => {
    isCartOpen.value = false;
  };

  return {
    // State
    cartItems,
    isCartOpen,

    // Actions
    addToCart,
    removeFromCart,
    updateQuantity,
    clearCart,
    toggleCart,
    openCart,
    closeCart,

    // Getters
    isInCart,
    getItemQuantity,

    // Computed
    cartCount,
    cartTotal,
    cartSubtotal,
    cartTax,
    cartShipping,
    cartGrandTotal,
  };
}
