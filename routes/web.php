<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produits',[ProductController::class, 'index'])->name('products');

Route::get('/produits/{product}',[ProductController::class,'show'])->name('product');

Route::get('/compte', [UserController::class, 'index'])->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categorie/{slug}', [CategoryController::class, 'show'])->name('category');




Route::controller(CartController::class)->group(function () {
    Route::get('/panier', 'index')->name('cart');
    Route::match(['post', 'put'], '/panier', 'update')->name('cart.update');
    Route::delete('/panier', 'destroy')->name('cart.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::controller(ProductAdminController::class)->group(function (){
    Route::get('/dashboard/produits','index')->name('dashboard.products');
    Route::get('/dashboard/produits/creation', 'create')->name('dashboard.product.create');
    Route::post('/dashboard/produits/formulaire', 'store')->name('dashboard.product.store');
    Route::get('/dashboard/products/{product}/edit',  'edit')->middleware(['auth'])->name('dashboardProductEdit');
    Route::put('/dashboard/products/{product}/update', 'update')->middleware(['auth'])->name('dashboardProductUpdate');
    Route::delete('/dashboard/produits/{product}/suppression', 'destroy')->middleware(['auth'])->name('product.delete');
});

require __DIR__.'/auth.php';
