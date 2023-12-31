<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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
Route::post('/', [PersonController::class, 'create']);

Route::get('/', [PersonController::class, 'index']);
Route::get('/{user_id}', [PersonController::class, 'find']);

Route::put('/{user_id}', [PersonController::class, 'update']);
Route::patch('/{user_id}', [PersonController::class, 'update']);

Route::delete('/{user_id}', [PersonController::class, 'destroy']);
// Route::delete('/', [PersonController::class, 'destroyByBody']);

