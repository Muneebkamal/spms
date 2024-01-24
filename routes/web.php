<?php

use App\Http\Controllers\CommonWordsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LanguageController;

// --------------
// AUTH ROUTES
// --------------
Auth::routes();

// --------------
// GLOBAL ACCESS ROUTES
// --------------
Route::middleware(['auth'])->group(function () {

    // --------------
    // USER PROFILE ROUTES
    // --------------
    Route::get('/my-profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
    Route::post('/upload-user-image', [UserController::class, 'uploadUserImage'])->name('upload-user-image');

    // --------------
    // GENERAL ROUTES
    // --------------
    Route::get('/', [GeneralController::class, 'index'])->name('home');
    Route::get('/access-records', [GeneralController::class, 'accessRecords']);
    Route::get('/share-list', [GeneralController::class, 'shareList']);
    Route::get('/terms-of-use', [GeneralController::class, 'termOfUse']);
    Route::get('/online-form', [GeneralController::class, 'onlineForm']);
    Route::get('/add-property', [PropertyController::class, 'view']);
    Route::post('/add-property', [PropertyController::class, 'create'])->name('createProperty');
    Route::get('/check-code/{code}', [PropertyController::class, 'verifyCode'])->name('verifyCode');
    Route::get('/property/{code}', [PropertyController::class, 'detail'])->name('property-details');
    Route::get('/property-list', [PropertyController::class, 'index'])->name('property-list');
    Route::get('/admin-search', [PropertyController::class, 'search']);
    Route::get('/advanced-search', [PropertyController::class, 'search']);

    // Route Common Words
    Route::get('/common-words', [CommonWordsController::class, 'index'])->name('common-words');
    Route::post('/create-common-words', [CommonWordsController::class, 'create'])->name('create-common-words');
    Route::post('/update-common-words', [CommonWordsController::class, 'update'])->name('update-common-words');
    Route::get('/del-common-words/{id}', [CommonWordsController::class, 'delete'])->name('del-common-words');

    // --------------
    // ADMIN ACCESS ROUTES
    // --------------
    Route::middleware(['auth', 'checkRole:admin'])->group(function () {
        Route::get('/register', [UserController::class, 'createAgentView'])->middleware('auth')->name('register');
        Route::get('/create-agent', [UserController::class, 'createAgentView'])->name('createAgentView');
        Route::post('/form-agent', [UserController::class, 'createAgent'])->name('createAgent');
        Route::get('/user-list', [UserController::class, 'agentsList'])->name('agentList');
        Route::get('/view-agent/{id}', [UserController::class, 'viewAgent'])->name('viewAgent');
        Route::delete('/delete-agent/{id}', [UserController::class, 'deleteAgent'])->name('deleteAgent');
        Route::get('/user-photo-permission', [UserController::class, 'togglePhotoPermission'])->name('photo-permission');
        Route::get('/user-contact-permission', [UserController::class, 'toggleContactPermission'])->name('contact-permission');
        Route::get('/all-views', [UserController::class, 'allViews']);
    });

    // --------------
    // UI ROUTES
    // --------------
    Route::put('/toggle-theme/{theme}', [GeneralController::class, 'toggleTheme'])->name('toggleTheme');
    Route::get('/{language?}', [LanguageController::class, 'switchLanguage'])->name('switch.language');
});
