<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\ManageCategoryController;
use App\Http\Controllers\Admin\ManageProductController;
use App\Http\Controllers\Admin\ImageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->middleware('checkRole:admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

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

