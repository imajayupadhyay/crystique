<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/products', function () {
    return Inertia::render('Products');
});

Route::get('/products/{category}/{slug}', function ($category, $slug) {
    // Mock product data - in a real app, you'd fetch from database
    $products = [
        'amethyst-crystal' => [
            'id' => 1,
            'name' => 'Amethyst Crystal',
            'slug' => 'amethyst-crystal',
            'category' => 'Crystals',
            'categorySlug' => 'crystals',
            'price' => 45.99,
            'originalPrice' => 59.99,
            'rating' => 4.8,
            'reviews' => 124,
            'image' => 'https://images.unsplash.com/photo-1596637754862-54a81dc4a2d2?w=800&auto=format&fit=crop&q=60',
            'images' => [
                'https://images.unsplash.com/photo-1596637754862-54a81dc4a2d2?w=800&auto=format&fit=crop&q=60',
                'https://images.unsplash.com/photo-1584990347449-39b03b2f6021?w=800&auto=format&fit=crop&q=60',
                'https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800&auto=format&fit=crop&q=60',
            ],
            'inStock' => true,
            'badge' => 'Best Seller',
            'description' => 'Experience the calming and protective energy of genuine Amethyst. This stunning purple crystal is known for its ability to enhance spiritual awareness, promote tranquility, and support meditation practices. Each piece is naturally formed and unique.',
        ],
        'rose-quartz-heart' => [
            'id' => 2,
            'name' => 'Rose Quartz Heart',
            'slug' => 'rose-quartz-heart',
            'category' => 'Crystals',
            'categorySlug' => 'crystals',
            'price' => 32.99,
            'rating' => 4.9,
            'reviews' => 89,
            'image' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=800&auto=format&fit=crop&q=60',
            'images' => [
                'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=800&auto=format&fit=crop&q=60',
                'https://images.unsplash.com/photo-1596637754862-54a81dc4a2d2?w=800&auto=format&fit=crop&q=60',
            ],
            'inStock' => true,
            'badge' => 'New',
            'description' => 'Rose Quartz is the stone of universal love. It restores trust and harmony in relationships, encouraging unconditional love. This heart-shaped crystal promotes self-love, friendship, and deep inner healing.',
        ],
        'rudraksha-mala' => [
            'id' => 3,
            'name' => 'Rudraksha Mala',
            'slug' => 'rudraksha-mala',
            'category' => 'Jaap Mala',
            'categorySlug' => 'jaap-mala',
            'price' => 78.99,
            'rating' => 5.0,
            'reviews' => 156,
            'image' => 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=800&auto=format&fit=crop&q=60',
            'images' => [
                'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=800&auto=format&fit=crop&q=60',
            ],
            'inStock' => true,
            'description' => 'Authentic Rudraksha Mala beads for meditation and prayer. Each bead is blessed and energized for spiritual growth and protection. Perfect for daily meditation practice.',
        ],
        'clear-quartz-point' => [
            'id' => 4,
            'name' => 'Clear Quartz Point',
            'slug' => 'clear-quartz-point',
            'category' => 'Crystals',
            'categorySlug' => 'crystals',
            'price' => 28.99,
            'rating' => 4.7,
            'reviews' => 67,
            'image' => 'https://images.unsplash.com/photo-1518683374e22-b0d303cb8501?w=800&auto=format&fit=crop&q=60',
            'images' => [
                'https://images.unsplash.com/photo-1518683374e22-b0d303cb8501?w=800&auto=format&fit=crop&q=60',
            ],
            'inStock' => true,
            'description' => 'Clear Quartz is known as the "master healer" and will amplify energy and thought. It absorbs, stores, releases and regulates energy and is excellent for unblocking it.',
        ],
        'tiger-eye-bracelet' => [
            'id' => 5,
            'name' => 'Tiger Eye Bracelet',
            'slug' => 'tiger-eye-bracelet',
            'category' => 'Jewelry',
            'categorySlug' => 'jewelry',
            'price' => 24.99,
            'rating' => 4.6,
            'reviews' => 92,
            'image' => 'https://images.unsplash.com/photo-1611652022419-a9419f74343a?w=800&auto=format&fit=crop&q=60',
            'images' => [
                'https://images.unsplash.com/photo-1611652022419-a9419f74343a?w=800&auto=format&fit=crop&q=60',
            ],
            'inStock' => false,
            'description' => 'Tiger Eye bracelet for protection and grounding. This powerful stone helps you to release fear and anxiety and aids harmony and balance.',
        ],
        'crystal-mala-beads' => [
            'id' => 6,
            'name' => 'Crystal Mala Beads',
            'slug' => 'crystal-mala-beads',
            'category' => 'Jaap Mala',
            'categorySlug' => 'jaap-mala',
            'price' => 89.99,
            'rating' => 4.8,
            'reviews' => 134,
            'image' => 'https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=800&auto=format&fit=crop&q=60',
            'images' => [
                'https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=800&auto=format&fit=crop&q=60',
            ],
            'inStock' => true,
            'description' => 'Beautiful crystal mala beads for meditation and spiritual practice. Each bead is carefully selected for quality and energy.',
        ],
        'black-tourmaline' => [
            'id' => 7,
            'name' => 'Black Tourmaline',
            'slug' => 'black-tourmaline',
            'category' => 'Crystals',
            'categorySlug' => 'crystals',
            'price' => 36.99,
            'rating' => 4.7,
            'reviews' => 78,
            'image' => 'https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800&auto=format&fit=crop&q=60',
            'images' => [
                'https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800&auto=format&fit=crop&q=60',
            ],
            'inStock' => true,
            'description' => 'Black Tourmaline is a powerful grounding stone that provides protection against negative energies and electromagnetic fields.',
        ],
        'selenite-wand' => [
            'id' => 8,
            'name' => 'Selenite Wand',
            'slug' => 'selenite-wand',
            'category' => 'Crystals',
            'categorySlug' => 'crystals',
            'price' => 42.99,
            'rating' => 4.9,
            'reviews' => 103,
            'image' => 'https://images.unsplash.com/photo-1584990347449-39b03b2f6021?w=800&auto=format&fit=crop&q=60',
            'images' => [
                'https://images.unsplash.com/photo-1584990347449-39b03b2f6021?w=800&auto=format&fit=crop&q=60',
            ],
            'inStock' => true,
            'badge' => 'Popular',
            'description' => 'Selenite is a calming stone that instills deep peace and is excellent for meditation or spiritual work. It can be used to cleanse and charge other crystals.',
        ],
    ];

    $product = $products[$slug] ?? abort(404);

    // Verify category matches
    if ($product['categorySlug'] !== $category) {
        abort(404);
    }

    // Get related products (different products from same category)
    $relatedProducts = array_values(array_filter($products, function($p) use ($product) {
        return $p['category'] === $product['category'] && $p['id'] !== $product['id'];
    }));

    // Limit to 4 related products
    $relatedProducts = array_slice($relatedProducts, 0, 4);

    return Inertia::render('ProductDetail', [
        'product' => $product,
        'relatedProducts' => $relatedProducts,
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/contact', function () {
    return Inertia::render('Contact');
});
