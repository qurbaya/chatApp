<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\CreateAccountController;
use App\Http\Controllers\Chat\ChatController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    // Routes related to account creation
    Route::post('signUp', [CreateAccountController::class, 'signUp'])->name('account.signUp');
    Route::post('verifyPhone', [CreateAccountController::class, 'verifyPhone'])->name('account.verifyPhone');
    Route::post('createUserAccount', [CreateAccountController::class, 'createUserAccount'])->name('account.createUser');

    // Authentication route
    Route::post('auth', [AuthController::class, 'auth'])->name('auth');

    // Chat routes
    Route::prefix('chat')->group(function () {
        Route::get('list', [ChatController::class, 'list'])->name('chat.list');
        Route::post('store', [ChatController::class, 'store'])->name('chat.store');
        Route::get('show', [ChatController::class, 'show'])->name('chat.show');
    });
});

Route::group(
    [
        'as' => 'passport.',
        'prefix' => config('passport.path', 'oauth'),
        'namespace' => '\Laravel\Passport\Http\Controllers',
    ],
    function () {

        Route::post('/token', [
            'uses' => 'AccessTokenController@issueToken',
            'as' => 'token',
            'middleware' => 'throttle',
        ]);
    }
);
