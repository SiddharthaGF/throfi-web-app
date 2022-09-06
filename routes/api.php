<?php

use App\Http\Controllers\Api\v1\DPA\DistrictController;
use App\Http\Controllers\Api\v1\DPA\ZoneController;
use App\Http\Controllers\Api\v1\DPA\StateController;
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

Route::controller(StateController::class)->group(function() {
    Route::get('v1/state', 'index')->name('state.index');
    Route::post('/import', 'importExcel')->name('state.import.excel');
});

Route::controller(DistrictController::class)->group(function() {
    Route::get('v1/district', 'index')->name('district.index');
    Route::get('v1/district/{id}', 'show')->name('district.show');
    Route::post('/v1/district/import', 'import')->name('district.import');
});

Route::controller(ZoneController::class)->group(function() {
    Route::get('v1/zone', 'index')->name('zone.index');
    Route::get('v1/{zone}', 'index')->name('zone.index');
    Route::post('/v1/zone/import', 'import')->name('zone.import');
});