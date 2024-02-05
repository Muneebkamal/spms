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

Route::get('/FileSave', [PropertyController::class, 'FileSave']);
// --------------
// AUTHENCATED ROUTES
// --------------
Route::middleware(['auth','activity'])->group(function () {
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
    // PROPERTY ROUTES
    Route::get('/add-property', [PropertyController::class, 'view']);
    Route::post('/add-property', [PropertyController::class, 'create'])->name('createProperty');
    Route::get('/check-code/{code}', [PropertyController::class, 'verifyCode'])->name('verifyCode');
    Route::get('/building-name-check/{code}', [PropertyController::class, 'BuildingNameCheck'])->name('BuildingNameCheck');
    Route::get('/property/{code}', [PropertyController::class, 'detail'])->name('property-details');
    Route::get('/advanced-search', [PropertyController::class, 'search']);
    Route::post('/upload-image', [PropertyController::class, 'uploadImage'])->name('upload-image');
    // COMMON WORDS ROUTES
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
        Route::get('/property-list', [PropertyController::class, 'index'])->name('property-list');
        Route::delete('/delete-property/{code}', [PropertyController::class, 'delete'])->name('delete-property');
        Route::get('/admin-search', [PropertyController::class, 'search']);
        Route::post('/admin-ajax-search', [PropertyController::class, 'AdminAjaxSearch']);
        Route::get('/loadMore', [PropertyController::class, 'loadMore']);

        
    });

    // --------------
    // UI ROUTES
    // --------------
    Route::put('/toggle-theme/{theme}', [GeneralController::class, 'toggleTheme'])->name('toggleTheme');
    Route::get('/{language?}', [LanguageController::class, 'switchLanguage'])->name('switch.language');
});

// --------------
// NOT AUTHENCCATED ROUTES
// --------------
