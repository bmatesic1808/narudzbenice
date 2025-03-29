<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
    return view('auth.login');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');
    Route::get('/orders/edit/{id}', [\App\Http\Controllers\OrderController::class, 'edit'])->name('orders.edit');
    Route::get('/orders/pdf/show/{id}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/pdf/download/{id}', [\App\Http\Controllers\OrderController::class, 'download'])->name('orders.download');
    Route::get('/orders/export', [\App\Http\Controllers\OrderController::class, 'showExportsPage'])->name('orders.exports.page');
    Route::get('/orders/excel/export', [\App\Http\Controllers\OrderController::class, 'exportToExcel'])->name('orders.excel.export');

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
});
