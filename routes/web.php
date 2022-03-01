<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;

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
    return view('base');
});

Route::get('/index.html', [HomeController::class, 'index']);

Route::get('/products.html', [ProductController::class, 'index']);

Route::get('/product/{product}.html', [ProductController::class, 'show']);

Route::get('/contact.html', [ContactController::class, 'index']);

Route::get('/category/{category}.html', [CategoryController::class, 'show']);


Route::get('/admin.html', [AdminController::class, 'index']);

Route::get('/admin/products.html', [AdminProductController::class, 'index']);

Route::get('/admin/product/creer.html', [AdminProductController::class, 'create']);

Route::post('/admin/product/creer.html', [AdminProductController::class, 'store']);

Route::get('/admin/product/{product}/edit.html', [AdminProductController::class, 'edit']);

Route::put('/admin/product/{product}.html', [AdminProductController::class, 'update']);

Route::get('/admin/product/{product}/delete', [CategoryController::class, 'delete']);