<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('welcome'); });
Route::group(['middleware'=> 'auth'], function() {
  Route::get('/add_cars', [CarsController::class, 'create']);
  Route::get('/cars_list', [CarsController::class, 'index']);
  Route::post('/add_cars', [CarsController::class, 'store']);
});
Auth::routes();
Route::group(['middleware'=> 'auth:sanctum'], function() {
  Route::get('/api/user', [ProfileController::class, 'index']);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');