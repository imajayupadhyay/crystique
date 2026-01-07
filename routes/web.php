<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Data\ProductData;
use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\AccountController;

Route::get('/', function () {
    return Inertia::render('Home', [
        'featuredProducts' => ProductData::getFeatured(8),
    ]);
});

// Category Pages
Route::get('/{category}', function ($category) {
    $validCategories = ['crystals', 'jaap-mala', 'jewelry'];

    if (!in_array($category, $validCategories)) {
        abort(404);
    }

    $products = ProductData::findByCategory($category);

    return Inertia::render('Category/index', [
        'category' => $category,
        'products' => $products,
    ]);
})->where('category', 'crystals|jaap-mala|jewelry');

// Product Detail Page
Route::get('/{category}/{slug}', function ($category, $slug) {
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
})->where('category', 'crystals|jaap-mala|jewelry');

Route::get('/cart', function () {
    return Inertia::render('Cart');
});

// Authentication Routes (Guest only)
Route::middleware('guest:customer')->group(function () {
    // Combined auth page
    Route::get('/auth', function () {
        return Inertia::render('Auth/Auth');
    })->name('auth');

    // Redirect old routes to new combined auth page
    Route::get('/register', function () {
        return redirect('/auth');
    })->name('register');

    Route::get('/login', function () {
        return redirect('/auth');
    })->name('login');

    // POST routes for form submissions
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout Route (Authenticated customers only)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('customer.auth')->name('logout');

// Customer Account Routes (Authenticated customers only)
Route::middleware('customer.auth')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
    Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
});

// Checkout Route (Requires authentication)
Route::get('/checkout', function () {
    return Inertia::render('Checkout');
})->middleware('customer.auth');

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/contact', function () {
    return Inertia::render('Contact');
});
