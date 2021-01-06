<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web;
use App\Http\Controllers\App;

use App\Http\Controllers\Category;
use App\Http\Controllers\Product;

/* login view */
Route::get('/', [Web::class, 'index'])->name('web.index');

/* Admin panel */
Route::prefix('app')->name('app.')->group(function()
{
    Route::get('/', [App::class, 'index'])->name('index');




     /** category routes section */
    Route::get('/categoria', [Category::class, 'list'])->name('category.list');
    Route::post('/categoria', [Category::class, 'store'])->name('category.store');




    /** product routes section */
    Route::get('/produto', [Product::class, 'list'])->name('product.list');
    Route::get('/produto/cadastro', [Product::class, 'create'])->name('product.create');
    Route::post('/produto', [Product::class, 'store'])->name('product.store');
});