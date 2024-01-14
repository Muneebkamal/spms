<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenralController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;


Auth::routes();

Route::middleware(['auth', 'checkRole:admin,agent'])->group(function () {
    Route::get('/my-profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
    Route::post('/upload-user-image', [UserController::class, 'uploadUserImage'])->name('upload-user-image');

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
    Route::get('/create-agent', [UserController::class, 'createAgentView'])->name('createAgentView');
    Route::post('/form-agent', [UserController::class, 'createAgent'])->name('createAgent');
    // Route User
    Route::get('/user-list', [UserController::class, 'agentsList'])->name('agentList');
    Route::get('/view-agent/{id}', [UserController::class, 'viewAgent'])->name('viewAgent');
    Route::delete('/delete-agent/{id}', [UserController::class, 'deleteAgent'])->name('deleteAgent');
    // Route Premission
    Route::get('/user-photo-permission', [UserController::class, 'togglePhotoPermission'])->name('photo-permission');
    Route::get('/user-contact-permission', [UserController::class, 'toggleContactPermission'])->name('contact-permission');
    // Route All views
    Route::get('/all-views', [UserController::class, 'allViews']);

    Route::put('/toggle-theme/{theme}', [GenralController::class, 'toggleTheme'])->name('toggleTheme');

});
