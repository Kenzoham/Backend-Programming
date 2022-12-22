<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Membuat end-point register dengan http request post
Route::post('/register', [AuthController::class, 'register']);
// Membuat end-point login dengan http request post
Route::post('/login', [AuthController::class, 'login']);



# Membuat group end-point dengan middleware sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Membuat endpoint patients (Get All Resources)
    // menggunakan methode GE
    Route::get('/patients', [PatientController::class, 'index']);
    
    // Membuat endpoint patients (Add Resources)
    // menggunakan methode post
    Route::post('/patients', [PatientController::class, 'store']);
    
    // Membuat endpoint patients/{id} (Get Detail Resources)
    // menggunakan methode get
    Route::get('/patients/{id}', [PatientController::class, 'show']);
    
    // Membuat endpoint patients/{id} (Edit Resources)
    // menggunakan methode PUT
    Route::put('/patients/{id}', [PatientController::class, 'update']);
    
    // Membuat endpoint patients/{id} (Delete Resources)
    // menggunakan methode delete
    Route::delete('/patients/{id}', [PatientController::class, 'destroy']);
    
    // Membuat endpoint patients/search/{name} (Search Resources by Name)
    // menggunakan methode GET
    Route::get('/patients/search/{name}', [PatientController::class, 'search']);
    
    // Membuat endpoint patients/status/positive (Search Resources by Name)
    // menggunakan methode GET
    Route::get('/patients/status/positive', [PatientController::class, 'positive']);
    
    // Membuat endpoint patients/status/recovered (Search Resources by Name)
    // menggunakan methode GET
    Route::get('/patients/status/recovered', [PatientController::class, 'recovered']);
    
    // Membuat endpoint patients/status/dead (Search Resources by Name)
    // menggunakan methode GET
    Route::get('/patients/status/dead', [PatientController::class, 'dead']);
});
