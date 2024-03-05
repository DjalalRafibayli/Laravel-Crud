<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/product', [ProductController::class , 'Index'])->name('products.index');
Route::get('/product/create', [ProductController::class , 'Create'])->name('products.create');
Route::post('/product', [ProductController::class , 'Store'])->name('products.store'); 
Route::get('/product/{product}/edit', [ProductController::class , 'edit'])->name('products.edit'); 
Route::put('/product/{product}/update', [ProductController::class , 'update'])->name('products.update'); 
Route::delete('/product/{product}/delete', [ProductController::class , 'delete'])->name('products.delete'); 
