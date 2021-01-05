<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web;

Route::get('/', [Web::class, 'index'])->name('web.index');