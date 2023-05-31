<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
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
Route::get('/storefront/{id}', [StoreFrontController::class, 'show_store'])->name('storefront.show');
Route::get('/storefront/showproduct/{id}', [StoreFrontController::class, 'show_product'])->name('storefront.product');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/addtocart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/deletefromcart/{id}', [CartController::class, 'deleteFromCart'])->name('delete.from.cart');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/chef/dashboard', function () {
    return view('chef.dashboard');
})->middleware(['auth', 'role:chef'])->name('chef.dashboard');

Route::middleware(['auth', 'role:customer'])->prefix('customer')->group(function(){

});

Route::middleware(['auth', 'role:chef'])->prefix('chef')->group(function(){

});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::resource('products', ProductsController::class, ['names' => 'products']);
    Route::resource('categories', CategoryController::class, ['names' => 'categories']);
    Route::resource('users', UserController::class, ['names' => 'users']);
    Route::resource('stores', StoresController::class, ['names' => 'stores']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
