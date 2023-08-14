<?php

use App\Http\Controllers\AdminDashboardController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StoreFrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StoreFrontController::class, 'index'])->name('storefront.index');
Route::get('/storefront/{id}', [StoreFrontController::class, 'showStore'])->name('storefront.show');
Route::get('/storefront/showproduct/{id}', [StoreFrontController::class, 'showProduct'])->name('storefront.product');
Route::get('/storefront/confirmation/{id}', [StoreFrontController::class, 'confirmation'])->name('storefront.confirmation');
Route::get('/getNearestStore', [StoresController::class, 'findNearest'])->name('get.nearest.store');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/addtocart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/deletefromcart/{id}', [CartController::class, 'deleteFromCart'])->name('delete.from.cart');
Route::patch('/updatecart/{id}', [CartController::class, 'updateCart'])->name('update.cart');
Route::get('/reordertocart/{id}', [CartController::class, 'reorder'])->name('reorder.to.cart');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/confirmation', [OrderController::class, 'confirmation'])->name('orders.confirmation');

Route::middleware(['auth', 'role:customer'])->prefix('customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class, ['names' => 'products']);
    Route::resource('categories', CategoryController::class, ['names' => 'categories']);
    Route::resource('users', UserController::class, ['names' => 'users']);
    Route::resource('stores', StoresController::class, ['names' => 'stores']);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
