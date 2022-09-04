<?php

use App\Http\Controllers\Api\v1\DPA\CityController;
use App\Http\Controllers\Api\v1\DPA\ParishController;
use App\Http\Controllers\Api\v1\DPA\ProvinceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\PatientController;

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

Route::controller(PatientController::class)->group(function() {
    Route::get('/v1/patient', 'index')->name('patient.index');
    Route::post('/v1/patient', 'store')->name('patient.store');
    Route::get('/v1/patient/{id}', 'show')->name('patient.show');
    Route::put('/v1/patient/{id}', 'update')->name('patient.update');
    Route::delete('/v1/patient/{id}', 'destroy')->name(('patient.destroy'));
});

Route::controller(ProvinceController::class)->group(function() {
    Route::get('v1/province', 'index')->name('province.index');
    Route::post('/import', 'importExcel')->name('province.import.excel');
});

Route::controller(CityController::class)->group(function() {
    Route::get('v1/city', 'index')->name('city.index');
    Route::post('/v1/city/import', 'import')->name('city.import');
});

Route::controller(ParishController::class)->group(function() {
    Route::get('v1/parish', 'index')->name('parish.index');
    Route::post('/v1/parish/import', 'import')->name('parish.import');
});