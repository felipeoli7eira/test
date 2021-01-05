<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web;
use App\Http\Controllers\App;

/* login view */
Route::get('/', [Web::class, 'index'])->name('web.index');

/* Admin panel */
Route::prefix('app')->name('app.')->group(function()
{
    Route::get('/', [App::class, 'index'])->name('index');
});