<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\CreateAccountController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\User\ReactionController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::post('signUp', [CreateAccountController::class, 'signUp'])->name('account.signUp');
    Route::post('verifyPhone', [CreateAccountController::class, 'verifyPhone'])->name('account.verifyPhone');
    Route::post('createUserAccount', [CreateAccountController::class, 'createUserAccount'])->name('account.createUser');


    Route::post('auth', [AuthController::class, 'auth'])->name('auth');


    Route::prefix('chat')
        ->middleware('auth:api')
        ->group(function () {
            Route::get('list', [ChatController::class, 'list'])->name('chat.list');
            Route::post('store', [ChatController::class, 'store'])->name('chat.store');
            Route::get('show', [ChatController::class, 'show'])->name('chat.show');
        });

    Route::prefix('user')
        ->middleware('auth:api')
        ->group(function () {
            Route::post('reaction', ReactionController::class)->name('reaction.send');
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
