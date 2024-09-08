<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', [ProductsController::class,'index'])->name('home');
Route::get('/add-product',[ProductsController::class,'addProduct'])->name('add-product');
Route::post('/store-product',[ProductsController::class,'store'])->name('store-product');
Route::get('/edit-product',[ProductsController::class,'editProduct'])->name('edit-product');
Route::get('/view-product/{id}',[ProductsController::class,'viewProduct'])->name('view-product');
Route::get('/delete-product/{id}',[ProductsController::class,'removeProduct'])->name('delete-product');
Route::put('/update-submit/{id}',[ProductsController::class,'updateProduct'])->name('update-submit');