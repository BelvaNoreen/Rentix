<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtiketController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\PesananController;

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

Route::resource('/etikets', EtiketController::class)->except(
    ['create','edit']
);

Route::resource('/pemesanans', PesananController::class)->except(
    ['create','edit']
);

Route::post('/register', [AkunController::class, 'register']);
Route::post('/login', [AkunController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AkunController::class, 'logout']);
});