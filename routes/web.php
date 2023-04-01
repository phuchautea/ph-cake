<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\ManageCategoryController;
use App\Http\Controllers\Admin\ManageProductController;
use App\Http\Controllers\Admin\ManageOrderController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/collections/all', [CategoryController::class, 'all']);
Route::get('/collections/{category}', [CategoryController::class, 'getByCategorySlug']);

Route::get('/product/{product}', [ProductController::class, 'getBySlug']);

Route::post('/addToCart', [CartController::class, 'index']);
Route::post('/updateCart', [CartController::class, 'update']);
Route::get('/carts', [CartController::class, 'show']);
Route::post('/order', [OrderController::class, 'store']);
Route::get('/order/search/{code}', [OrderController::class, 'search']);
Route::get('/carts/delete/{id}', [CartController::class, 'remove']);

Route::get('/pay/momoResult', [PaymentController::class, 'momoResult']);
Route::post('/pay/ipnMomoResult', [PaymentController::class, 'ipnMomoResult']);
Route::get('/order/success', [OrderController::class, 'success']);
Route::get('/pay/error', [PaymentController::class, 'error']);

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->middleware('checkRole:admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
        #Order routes
        Route::prefix('order')->group(function () {
            Route::get('list', [ManageOrderController::class, 'index']);
            Route::post('/edit/{order}', [ManageOrderController::class, 'update']);
        });
        #Category routes
        Route::prefix('category')->group(function () {
            Route::get('list', [ManageCategoryController::class, 'index']);

            Route::get('add', [ManageCategoryController::class, 'create']);
            Route::post('store', [ManageCategoryController::class, 'store']);

            Route::delete('destroy', [ManageCategoryController::class, 'destroy']);

            Route::get('/edit/{category}', [ManageCategoryController::class, 'edit']);
            Route::post('/edit/{category}', [ManageCategoryController::class, 'update']);
        });

        #Product routes
        Route::prefix('product')->group(function () {
            Route::get('list', [ManageProductController::class, 'index']);

            Route::get('add', [ManageProductController::class, 'create']);
            Route::post('store', [ManageProductController::class, 'store']);

            Route::delete('destroy', [ManageProductController::class, 'destroy']);

            Route::get('/edit/{product}', [ManageProductController::class, 'edit']);
            Route::post('/edit/{product}', [ManageProductController::class, 'update']);
        });

        Route::prefix('images')->group(function () {
            Route::post('upload', [ImageController::class, 'upload']);
        });
    });
});


