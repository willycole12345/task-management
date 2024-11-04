<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserCreationController;
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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::get('view', [TaskController::class, 'view']);

});

Route::controller(UserCreationController::class)->group(function () {
    Route::post('createUsers', 'createUsers');
});
Route::controller(TaskController::class)->group(function () {
    Route::post('create', 'store');
    // Route::get('view', 'view');
    Route::get('editrecord/{id}', 'Edit');
    Route::post('updaterecord/{id}', 'update');
    Route::get('delete/{id}', 'destory');
});

