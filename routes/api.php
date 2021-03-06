<?php

use App\Http\Controllers\AdvertsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::get('user', [UserController::class, 'index']);
Route::post('user/create', [UserController::class, 'store']);

Route::get('/adverts', [AdvertsController::class, 'index']);

Route::group([
    // 'middleware' => ['jwt.verify'],
    'prefix' => 'adverts'
], function ($router) {

    Route::get('registers', [AdvertsController::class, 'allAdverts']);
    Route::post('add', [AdvertsController::class, 'store']);

});
