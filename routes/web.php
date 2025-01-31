<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MenuLinkController::class, 'index'])->name('home');
Route::get('/menu-links/{imageUrl}', [App\Http\Controllers\MenuLinkController::class, 'index'])->name('menu-links');
Route::get('/products/show-public', [App\Http\Controllers\ProductController::class, 'showPublic'])->name('products.show.public');
Route::resource('products', App\Http\Controllers\ProductController::class)->middleware('auth');

require __DIR__.'/auth.php';
