<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProductController;


Route::get('/categories',function (){
    return view('categories');
});

Route::get('/',[App\Http\Controllers\MyController::class, 'myHome']);

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Auth::routes();

Route::get('/category/{cat}', [App\Http\Controllers\ProductController::class, 'showCategory'])->name('showCategory');
Route::get('/category/{cat}/{product_id}', [App\Http\Controllers\ProductController::class, 'show'])->name('showProduct');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cartIndex');





