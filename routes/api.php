<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\CreateAccountController;
use App\Http\Controllers\Chat\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('signUp',[CreateAccountController::class,'signUp']);
Route::post('verifyPhone',[CreateAccountController::class,'verifyPhone']);
Route::post('createUserAccount',[CreateAccountController::class,'createUserAccount']);



Route::post('auth',[AuthController::class,'auth']);
Route::get('list',[ChatController::class,'list'])->middleware('auth:api');
Route::post('store',[ChatController::class,'store'])->middleware('auth:api');
Route::get('show',[ChatController::class,'show'])->middleware('auth:api');

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
