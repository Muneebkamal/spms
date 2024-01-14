`<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenralController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;


Auth::routes();
Route::middleware(['auth', 'checkRole:admin,agent'])->group(function () {
    Route::get('/my-profile', [UserController::class, 'index'])->name('profile');
    Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');



    Route::get('/', [GenralController::class, 'index'])->name('home');
    // Route Access records
    Route::get('/access-records', [GenralController::class, 'accessRecords']);
    // Route Share List
    Route::get('/share-list', [GenralController::class, 'shareList']);
    // Route Terms of Use
    Route::get('/terms-of-use', [GenralController::class, 'termOfUse']);
    // Route Online Form
    Route::get('/online-form', [GenralController::class, 'onlineForm']);
    // Route Add property
    Route::get('/add-property', [PropertyController::class, 'create']);
    // Route Common Words
    Route::get('/common-words', function(){
        return view('content.common-words.common-words');
    });
    Route::get('/admin-search', [PropertyController::class, 'search']);
    Route::get('/advanced-search', [PropertyController::class, 'search']);
});
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/register', [UserController::class, 'register'])->middleware('auth')->name('register');

    // Route property List
    Route::get('/property-list', [PropertyController::class, 'index']);
    // Route Create Agents
    Route::get('/create-agent', [UserController::class, 'index']);
    // Route User List
    Route::get('/user-list', [UserController::class, 'index']);
    // Route All views
    Route::get('/all-views', [UserController::class, 'index']);

});
