<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\Api\AuthApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthApiController::class, 'register']);
    Route::post('/login', [AuthApiController::class, 'login']);

    Route::get('/email/confirmation/{token}/{email}', [AuthApiController::class, 'confirm'])->name('confirmation');


    Route::group(['middleware' => 'auth:sanctum'], function () {

        Route::get('logout', [AuthApiController::class, 'logout']);
        // Route::get('user', [AuthApiController::class, 'user']);
        Route::post('refresh', [AuthApiController::class, 'refresh']);

        Route::put('update-password', [AuthApiController::class, 'changePassword']);
        Route::put('update-profile', [AuthApiController::class, 'updateProfile']);
    });
});


Route::resource('cities', CityController::class);
Route::resource('municipalities', MunicipalityController::class);
Route::resource('communities', CommunityController::class);
Route::resource('churches', ChurchController::class);
