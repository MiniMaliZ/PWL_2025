<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LevelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register-api', App\Http\Controllers\Api\RegisterController::class)->name('register-api');
Route::post('/login-api', App\Http\Controllers\Api\LoginController::class)->name('login-api');
Route::post('/logout-api', App\Http\Controllers\Api\LogoutController::class)->name('logout-api');

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});

Route::get('/levels', [LevelController::class, 'index']);
Route::post('/levels', [LevelController::class, 'store']);
Route::get('/levels/{level}', [LevelController::class, 'show']);
Route::put('/levels/{level}', [LevelController::class, 'update']);
Route::delete('/levels/{level}', [LevelController::class, 'destroy']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
