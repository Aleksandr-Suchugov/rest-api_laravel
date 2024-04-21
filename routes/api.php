<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\CarsController;
use App\Models\Cars;
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
Route::group(['middleware'=> 'auth:sanctum'], function() {
    Route::apiResource('/cars', CarsController::class);
    Route::post('/api/tokens/create', [ApiTokenController::class, 'createToken']);
});
