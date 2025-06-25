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

Route::get('/getKelasByCabor/{caborId}', [App\Http\Controllers\SportController::class, 'getKelasByCabor']);

// Dashboards Summary
Route::get('dashboard/store/get-data-summary/', [App\Http\Controllers\Dashboards\StoreDashboardController::class, 'getTransactionSummary']);

// Berita
Route::prefix('posts')->group(function () {
    Route::name('posts.')->group(function () {
        Route::prefix('news')->group(function () {
            Route::name('news.')->group(function () {
                Route::get('/', [App\Http\Controllers\NewsController::class, 'getLists'])->name('get-list');
            });
        });
        Route::prefix('galeries')->group(function () {
            Route::name('galeries.')->group(function () {
                Route::get('/', [App\Http\Controllers\GaleryController::class, 'getLists'])->name('get-list');
            });
        });
    });
});
