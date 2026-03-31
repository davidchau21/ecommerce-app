<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\AdminController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Public Web Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/products', [PageController::class, 'productsIndex'])->name('products.index');
Route::get('/products/{id}', [PageController::class, 'productsShow'])->name('products.show');

// Auth Required Web Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/cart', [PageController::class, 'cart'])->name('cart.index');
    Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout.index');
    
    // API-like Web Routes for Cart/Orders (Inertia forms)
    Route::post('/cart', [PageController::class, 'addToCart'])->name('cart.store');
    Route::delete('/cart/{id}', [PageController::class, 'removeFromCart'])->name('cart.destroy');
    Route::patch('/cart/{id}', [PageController::class, 'updateCart'])->name('cart.update');
    Route::post('/orders', [PageController::class, 'placeOrder'])->name('orders.store');
});

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/products', [AdminController::class, 'productsIndex'])->name('admin.products.index');
    Route::get('/products/create', [AdminController::class, 'productsCreate'])->name('admin.products.create');
    Route::post('/products', [AdminController::class, 'productsStore'])->name('admin.products.store');
    Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('admin.categories.index');
});

// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
