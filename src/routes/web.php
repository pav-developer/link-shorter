<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('home');
})->name('home');*/

Route::get('/', [LinkController::class, 'index'])->name('home');
Route::post('/', [LinkController::class, 'store'])->name('home.store');
Route::get('/go/{token}', [LinkController::class, 'goaway'])->name('links.goaway');

