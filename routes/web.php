<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminUserController;

//User Routes-->

// Homepage
Route::get('/home', fn() => view('User.Home.home'))->name('home');

// User Authentication
Route::get('/user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserAuthController::class, 'login']);
Route::get('/user/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('/user/register', [UserAuthController::class, 'register']);
Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::get('/user/profile', function () {return view('User.Auth.Profile');})->name('user.profile');

//About
Route::get('/about', function () {return view('User.Module.About');});

//Contact
Route::get('/contact', function () {return view('User.Module.Contact');});

// Cart
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/place-order', [CartController::class, 'placeOrder'])->name('cart.placeOrder');

// Checkout
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');

// Orders
Route::middleware('auth:web')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

//Delivery
Route::post('/orders/{id}/dispatch', [AdminOrderController::class, 'dispatch'])->name('admin.orders.dispatch');


//Admin Routes-->

// Redirect root to admin login
Route::get('/', fn() => redirect()->route('admin.login'));

// Admin Authentication
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register']);
});

// Protected Admin System
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Inventory
    Route::get('/inventory', [ProductController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/create', [ProductController::class, 'create'])->name('inventory.create');
    Route::post('/inventory', [ProductController::class, 'store'])->name('inventory.store');
    Route::get('/inventory/{product}/edit', [ProductController::class, 'edit'])->name('inventory.edit');
    Route::put('/inventory/{product}', [ProductController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory/{product}', [ProductController::class, 'destroy'])->name('inventory.destroy');

    // Categories
    Route::resource('categories', CategoryController::class);
});

//Orders
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
});
Route::post('/admin/orders/{id}/confirm', [OrderController::class, 'confirm'])->name('admin.orders.confirm');

//Users
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');


//User and Admin Routes-->

//category
Route::get('/category/{slug}', [ProductController::class, 'showByCategory'])->name('category.show');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');

//mail
Route::post('/admin/orders/{id}/confirm', [AdminOrderController::class, 'confirm'])->name('admin.orders.confirm');
Route::post('/orders/{id}/confirm', [AdminOrderController::class, 'confirm'])->name('orders.confirm');


