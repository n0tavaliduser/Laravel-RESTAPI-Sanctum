<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MCategoryTaskController;
use App\Http\Controllers\Api\TaskController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // task api
    Route::controller(TaskController::class)->group(function () {
        Route::get('/tasks', 'index');
        Route::get('/task/{id}', 'getOne');
        Route::post('/task', 'store');
        Route::patch('/task/{id}', 'update');
        Route::delete('/task/{id}', 'destroy');
    });

    // m category task api
    Route::controller(MCategoryTaskController::class)->group(function () {
        Route::get('/m_category_task', 'index');
        Route::get('/m_category_task/{id}', 'getOne');
        Route::post('/m_category_task', 'store');
        Route::patch('/m_category_task/{id}', 'update');
        Route::delete('/m_category_task/{id}', 'destroy');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});