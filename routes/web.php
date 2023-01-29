<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\SaleProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest/categories', function () {
    return view('welcome');
});

Route::controller(CategoriesController::class)->group(function () {
    Route::get('/guestcategories', [CategoriesController::class, 'guestcategories'])->name('guestcategories');
    Route::get('/guestcategoriessearch', [CategoriesController::class, 'guestcategoriessearch'])->name('guestcategoriessearch');
    Route::get('/admin/categories/search', [CategoriesController::class, 'adminsearch'])->name('adminsearch');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/guestproduct', [ProductController::class, 'guestproduct'])->name('guestproduct');
    Route::get('/guestproductsearch', [ProductController::class, 'guestproductsearch'])->name('guestproductsearch');
    Route::get('/admin/product/search', [ProductController::class, 'adminproductsearch'])->name('adminproductsearch');
});

Route::controller(SaleController::class)->group(function () {
    Route::get('/admin/sale/search', [SaleController::class, 'adminsalesearch'])->name('adminsalesearch');
    Route::get('/dashboard2', [SaleController::class, 'metoda1'])->name('dashboard2');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/product', ProductController::class,);
    Route::resource('/sale', SaleController::class);
    Route::resource('/saleproduct', SaleProductController::class);
});


// Route::get('/categories', [FrontendCategoriesController::class, 'index'])->name('categories.index');
// Route::get('/categories/{category}', [FrontendCategoriesController::class, 'show'])->name('categories.show');
// Route::get('/product', [FrontendProductController::class, 'index'])->name('product.index');

require __DIR__ . '/auth.php';
