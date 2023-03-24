<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\CategoryController;
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
    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Category routes
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'index']);

            Route::get('add', [CategoryController::class, 'create']);
            Route::post('store', [CategoryController::class, 'store']);

            Route::delete('destroy', [CategoryController::class, 'destroy']);

            Route::get('/edit/{category}', [CategoryController::class, 'edit']);
            Route::post('/edit/{category}', [CategoryController::class, 'update']);
        });
    });
    
});

