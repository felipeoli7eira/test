<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web;
use App\Http\Controllers\App;
use App\Http\Controllers\Category;

/* login view */
Route::get('/', [Web::class, 'index'])->name('web.index');

/* Admin panel */
Route::prefix('app')->name('app.')->group(function()
{
    Route::get('/', [App::class, 'index'])->name('index');




     /** category routes section */
    Route::get('/categoria/cadastro', [Category::class, 'create'])->name('category.list');
    Route::post('/categoria', [Category::class, 'store'])->name('category.store');




    /** product routes section */
    Route::get('/produto', [App::class, 'list'])->name('product.list');
    Route::get('/produto/cadastro', [App::class, 'create'])->name('product.create');
    Route::post('/produto', [App::class, 'store'])->name('product.store');
});