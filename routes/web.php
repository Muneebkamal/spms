<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Auth::routes();
Route::middleware(['auth'])->group(function () {    
    Route::get('/', [HomeController::class, 'index'])->name('home');


    Route::get('/my-profile', [AdminController::class, 'index'])->name('profile');
    Route::post('/changePassword', [AdminController::class, 'changePassword'])->name('changePassword');

    Route::get('/register', [HomeController::class, 'register'])->middleware('auth')->name('register');
});