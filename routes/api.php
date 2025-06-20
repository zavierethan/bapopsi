<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/getSubRayonByKecamatan/{kecId}', [App\Http\Controllers\SubRayonController::class, 'getSubRayonByKec']);

// Dashboards Summary
Route::get('dashboard/store/get-data-summary/', [App\Http\Controllers\Dashboards\StoreDashboardController::class, 'getTransactionSummary']);
