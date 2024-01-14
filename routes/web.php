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
    // Route::get('/register', [HomeController::class, 'register'])->middleware('auth')->name('register');
    // Route Access records
    Route::get('/access-records', function(){
        return view('content.records.access-records');
    });
    // Route Share List
    Route::get('/share-list', function(){
        return view('content.share-list.share-list');
    });
    // Route Add property
    Route::get('/add-property', function(){
        return view('content.properties.add-property');
    });
    // Route property List
    Route::get('/property-list', function(){
        return view('content.properties.property-list');
    });
     // Route Create Agents
     Route::get('/create-agent', function(){
        return view('content.users.create-agent');
    });
     // Route User List
     Route::get('/user-list', function(){
        return view('content.users.user-list');
    });
     // Route All views
     Route::get('/all-views', function(){
        return view('content.all-views.all-views');
    });
     // Route Admin Search
     Route::get('/admin-search', function(){
        return view('content.properties.admin-search.admin-search');
    });
     // Route Terms of Use 
     Route::get('/terms-of-use', function(){
        return view('content.terms-of-use.terms-of-use');
    });
     // Route Online Form
     Route::get('/online-form', function(){
        return view('content.online-form.online-form');
    });
     // Route Common Words
     Route::get('/common-words', function(){
        return view('content.common-words.common-words');
    });


});
