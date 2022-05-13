<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/cars', [Controllers\CarsController::class, 'list'])
    ->name('cars.list');
Route::get('/cars/{id}', [Controllers\CarsController::class, 'find'])
    ->name('cars.find');
Route::post('/cars', [Controllers\CarsController::class, 'create'])
    ->name('cars.create');
Route::delete('/cars/{id}', [Controllers\CarsController::class, 'delete'])
    ->name('cars.delete');
Route::patch('/cars/{id}', [Controllers\CarsController::class, 'update'])
    ->name('cars.update');