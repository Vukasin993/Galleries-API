<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentsController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=> 'auth:api'], function () {
    Route::get('/galleries/{id}', [GalleriesController::class, 'show']);
    Route::post('/galleries', [GalleriesController::class, 'store']);
    Route::delete('/galleries/{id}', [GalleriesController::class, 'destroy']);
    Route::get('/my-galleries', [UserController::class, 'userGall']);
    Route::post('/galleries/{id}/comments', [CommentsController::class, 'store']);
    Route::delete('/comments/{id}', [CommentsController::class, 'destroy']);
    Route::get('/authors/{id}', [UserController::class, 'show']);
    Route::get('/comments', [CommentsController::class, 'index']);
    Route::get('/comments/{id}', [CommentsController::class, 'show']);
});


Route::get('/galleries', [GalleriesController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'loggedUser']);
Route::post('/refresh-token', [AuthController::class, 'refreshToken']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/register', [AuthController::class, 'register']);