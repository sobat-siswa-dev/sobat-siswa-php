<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Rest\{
    LoginController,
    StAttitudeController
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

Route::prefix("/student")->group(function (){
    Route::post("/login", [LoginController::class, 'loginStudentEp']);
    Route::middleware("rest.student")->group(function () {
        Route::post("/profile", [LoginController::class, 'profileStudentEp']);
        Route::prefix("/attitude")->group(function () {
            Route::get("/trophy", [StAttitudeController::class, 'trophyStudentEd']);
            Route::get("/violation", [StAttitudeController::class, 'violationStudentEd']);
            Route::get("/counseling", [StAttitudeController::class, 'counselingStudentEd']);
        });
    });
});

Route::post("/refreshToken", [LoginController::class, 'refreshTokenEp']);