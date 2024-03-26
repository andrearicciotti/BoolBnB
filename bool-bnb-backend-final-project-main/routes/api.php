<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ViewController;
use App\Models\Apartment_info;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::get('/apartments', [ApartmentController::class, 'index']);
Route::get('/apartments/{slug}', [ApartmentController::class, 'show']);
Route::get('/get-apartments', [ApartmentController::class, 'getFilteredApartments']);
Route::get('/services', [ServiceController::class, 'index']);
Route::post('apartments/{slug}/messages', [MessageController::class, 'sendMessage']);
Route::post('/get-view', [ViewController::class, 'store']);
