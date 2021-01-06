<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web;
use App\Http\Controllers\App;

use App\Http\Controllers\Category;
use App\Http\Controllers\Product;
use App\Http\Controllers\User;

/* login view */
Route::get('/', [Web::class, 'index'])->name('web.index');

/* Admin panel */
Route::prefix('app')->name('app.')->group(function()
{
    Route::get('/', [App::class, 'index'])->name('index');




    /** category routes section */
    Route::get('/categoria',         [Category::class, 'list'])  ->name('category.list');
    Route::post('/categoria',        [Category::class, 'store']) ->name('category.store');
    Route::put('/categoria',         [Category::class, 'update'])->name('category.update');
    Route::delete('/categoria/{id}', [Category::class, 'delete'])->name('category.delete');




    /** product routes section */
    Route::get('/produto',          [Product::class, 'list'])  ->name('product.list');
    Route::get('/produto/cadastro', [Product::class, 'create'])->name('product.create');
    Route::post('/produto',         [Product::class, 'store']) ->name('product.store');




    Route::get('/usuario',          [User::class, 'list'])  ->name('user.list');
    Route::get('/usuario/cadastro', [User::class, 'create'])->name('user.create');
    Route::post('/usuario',         [User::class, 'store']) ->name('user.store');
    Route::delete('/usuario/{id}',  [User::class, 'delete']) ->name('user.delete');
    Route::put('/usuario/{id}',     [User::class, 'update']) ->name('user.update');
});