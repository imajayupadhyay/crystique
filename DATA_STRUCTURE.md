# Product Data Structure Documentation

## Overview
All product data is now centrally managed in `app/Data/ProductData.php`. This makes it easy to maintain products and will simplify migration to a real database in the future.

## File Structure
```
app/
└── Data/
    └── ProductData.php  # Central product data management
```

## Adding New Products

### 1. Open the ProductData.php file
Location: `app/Data/ProductData.php`

### 2. Add a new product to the array in the `all()` method

```php
[
    'id' => 9,  // Unique ID
    'slug' => 'product-name',  // URL-friendly slug
    'name' => 'Product Name',  // Display name
    'category' => 'Crystals',  // Display category
    'categorySlug' => 'crystals',  // URL-friendly category
    'price' => 49.99,  // Current price
    'originalPrice' => 69.99,  // Optional: Original price (for sale items)
    'rating' => 4.8,  // Rating (0-5)
    'reviews' => 150,  // Number of reviews
    'image' => 'https://...',  // Main product image URL
    'images' => [  // Gallery images (3-5 recommended)
        'https://...',
        'https://...',
    ],
    'inStock' => true,  // Stock status
    'badge' => 'New',  // Optional: Badge text (Best Seller, New, Popular, Sale)
    'description' => 'Full product description...',  // Detailed description
],
```

## Available Categories

Current categories:
- **Crystals** (`crystals`)
- **Jaap Mala** (`jaap-mala`)
- **Jewelry** (`jewelry`)

To add a new category, just use it in your product and it will be automatically available.

## Available Methods in ProductData

### `ProductData::all()`
Returns all products as an array.
```php
$products = ProductData::all();
```

### `ProductData::findBySlug($slug)`
Find a product by its slug.
```php
$product = ProductData::findBySlug('amethyst-crystal');
```

### `ProductData::findById($id)`
Find a product by its ID.
```php
$product = ProductData::findById(1);
```

### `ProductData::findByCategory($category)`
Get all products in a specific category.
```php
$crystals = ProductData::findByCategory('crystals');
```

### `ProductData::getRelatedProducts($product, $limit = 4)`
Get related products (same category, different product).
```php
$related = ProductData::getRelatedProducts($product, 4);
```

### `ProductData::getCategories()`
Get all unique categories.
```php
$categories = ProductData::getCategories();
```

### `ProductData::search($query)`
Search products by name, description, or category.
```php
$results = ProductData::search('amethyst');
```

### `ProductData::getFeatured($limit = 8)`
Get featured products (prioritizes products with badges and high ratings).
```php
$featured = ProductData::getFeatured(8);
```

## How Data Flows

### 1. Backend (Laravel Routes)
```php
// routes/web.php
use App\Data\ProductData;

Route::get('/products', function () {
    return Inertia::render('Products', [
        'products' => ProductData::all(),
    ]);
});
```

### 2. Frontend (Vue Components)
```vue
<script setup>
const props = defineProps({
  products: Array,
});
</script>

<template>
  <div v-for="product in products" :key="product.id">
    {{ product.name }}
  </div>
</template>
```

## Migration to Database (Future)

When you're ready to move to a database:

1. Create a `products` table migration
2. Create a `Product` model
3. Replace `ProductData::all()` with `Product::all()`
4. Import the data from `ProductData.php` to your database
5. Update routes to use Eloquent models instead of ProductData

The data structure is designed to match what your database will look like, making migration easy!

## URL Structure

Products use hierarchical SEO-friendly URLs:
```
/products/{category-slug}/{product-slug}

Examples:
- /products/crystals/amethyst-crystal
- /products/jaap-mala/rudraksha-mala
- /products/jewelry/tiger-eye-bracelet
```

## Tips

1. **Slugs must be unique** across all products
2. **Images**: Use high-quality images (800px+ width recommended)
3. **Descriptions**: Write detailed, engaging descriptions (150-300 characters)
4. **Pricing**: Use 2 decimal places (e.g., 49.99, not 49.9)
5. **Stock**: Update `inStock` to `false` when out of stock
6. **Badges**: Use sparingly (only for special products)

## Example: Adding a New Product

```php
// In app/Data/ProductData.php, add to the array in all() method:

[
    'id' => 9,
    'slug' => 'lapis-lazuli-sphere',
    'name' => 'Lapis Lazuli Sphere',
    'category' => 'Crystals',
    'categorySlug' => 'crystals',
    'price' => 65.99,
    'originalPrice' => 85.99,
    'rating' => 4.9,
    'reviews' => 87,
    'image' => 'https://images.unsplash.com/photo-1234567890?w=800',
    'images' => [
        'https://images.unsplash.com/photo-1234567890?w=800',
        'https://images.unsplash.com/photo-0987654321?w=800',
        'https://images.unsplash.com/photo-1122334455?w=800',
    ],
    'inStock' => true,
    'badge' => 'Limited Edition',
    'description' => 'Beautiful deep blue Lapis Lazuli sphere, known for wisdom, truth, and spiritual enlightenment. Perfect for meditation and home decor.',
],
```

After adding, the product will automatically:
- Appear on the products page
- Be searchable
- Be available at `/products/crystals/lapis-lazuli-sphere`
- Show in related products for other crystals
- Be eligible to appear in featured products

## Need Help?

The data structure is self-contained in one file, making it easy to:
- Add new products
- Update existing products
- Modify product information
- Test different data scenarios

Just edit `app/Data/ProductData.php` and refresh your browser!
