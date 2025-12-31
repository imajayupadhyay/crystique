<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Data\ProductData;

Route::get('/', function () {
    return Inertia::render('Home', [
        'featuredProducts' => ProductData::getFeatured(8),
    ]);
});

Route::get('/products', function () {
    return Inertia::render('Products', [
        'products' => ProductData::all(),
        'categories' => ProductData::getCategories(),
    ]);
});

Route::get('/products/{category}/{slug}', function ($category, $slug) {
    $product = ProductData::findBySlug($slug);

    if (!$product) {
        abort(404);
    }

    // Verify category matches
    if ($product['categorySlug'] !== $category) {
        abort(404);
    }

    // Get related products
    $relatedProducts = ProductData::getRelatedProducts($product, 4);

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
