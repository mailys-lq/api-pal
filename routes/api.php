<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReadingListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::apiResource('reading_list', ReadingListController::class);

Route::apiResource('favorite', FavoriteController::class);

Route::apiResource('user', UserController::class);