<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Rest\{
    LoginController
};

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

Route::prefix("/auth")->group(function () {
    Route::post("/login", [LoginController::class, 'loginEp']);
    Route::post("/refreshToken", [LoginController::class, 'refreshTokenEp']);
});


Route::middleware("rest")->group(function () {
    Route::prefix("/auth")->group(function () {
        Route::post("/profile", [LoginController::class, 'profileEp']);
    });
});