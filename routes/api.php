<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [ProductController::class, 'allProducts']);
Route::get('products/{id}', [ProductController::class, 'singleProduct']);
Route::post('create', [ProductController::class, 'create'])->name('product.create');
Route::put('update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::put('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// sorted product
Route::get('sorted', [ProductController::class, 'productSorted']);
