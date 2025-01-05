<?php

use App\Http\Controllers\web\AdminController;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\DashboardCashierController;
use App\Http\Controllers\web\LoginController;
use App\Http\Controllers\web\ProductCategoryController;
use App\Http\Controllers\web\ProductController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| ROUTE AUTH 🟢
|--------------------------------------------------------------------------
*/

Route::controller(LoginController::class)->prefix('/')->group(function () {
    Route::get('/', 'index')->name('login');
});
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| END ROUTE AUTH 🟤
|--------------------------------------------------------------------------
*/




/*
|--------------------------------------------------------------------------
| ROUTE ADMIN 🟢
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'admin'], function () {
    Route::prefix('/admin')->group(function () {
        Route::controller(AdminController::class)->prefix('/dashboard')->group(function () {
            Route::get('/', 'index')->name('dashboard');
        });

        Route::controller(ProductController::class)->prefix('/product')->group(function () {
            Route::get('/', 'index')->name('product.index');
            Route::get('/create', 'create')->name('product.create');
        });

        Route::controller(ProductCategoryController::class)->prefix('/product-category')->group(function () {
            Route::get('/', 'index')->name('product-category.index');
            Route::post('/', 'store')->name('product-category.store');
            Route::delete('/{id}', 'destroy')->name('product-category.delete');
            Route::post('/edit/{id}', 'update')->name('product-category.update');
        });
    });
});

/*
|--------------------------------------------------------------------------
| END ADMIN 🟤
|--------------------------------------------------------------------------
*/


Route::controller(DashboardCashierController::class)->prefix('/cashier')->group(function () {
    Route::get('/', 'index')->name('cashier.index');
});
