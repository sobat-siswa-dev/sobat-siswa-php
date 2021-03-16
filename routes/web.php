<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    RegistrationController,
    LoginController
};

use App\Http\Controllers\Application\{
    GlobalController,
    MasterController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware("auth.custom")->group(function () {
    Route::get("/dashboard", [GlobalController::class, 'dashboardPage']);
    Route::prefix("/master")->group(function () {
        Route::any("/class", [MasterController::class, 'classPage']);
        Route::any("/classGroup", [MasterController::class, 'classGroupPage']);
        Route::any("/student", [MasterController::class, 'studentPage']);
        Route::any("/alumn", [MasterController::class, 'alumnPage']);
        Route::any("/rule", [MasterController::class, 'rulePage']);
    });  
    Route::any("/logout", [LoginController::class, 'logoutPage']);
});

Route::prefix("/registration")->group(function () {
    Route::any("/", [RegistrationController::class, 'rootPage']);
    Route::any("/step-1", [RegistrationController::class, 'step1Page'])->middleware("registration");
    Route::any("/step-2", [RegistrationController::class, 'step2Page'])->middleware("registration");
    Route::any("/final", [RegistrationController::class, 'finalPage'])->middleware("registration");
    Route::any("/finish", [RegistrationController::class, 'finishPage'])->middleware("registration");
});

Route::any("/login", function () {
    return redirect(url('/login-student'));
});
Route::any("/login-student", [LoginController::class, 'studentPage']);
Route::any("/login-teacher", [LoginController::class, 'teacherPage']);