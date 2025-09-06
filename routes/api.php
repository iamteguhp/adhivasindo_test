<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\APIAuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ExternalUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|------------------------------------------ --------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [APIAuthController::class, 'login']);

// Logout
Route::middleware('auth:sanctum')->post('/logout', [APIAuthController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function () {
  // CRUD USER
  Route::get('/user/all', [UserController::class, 'getAll']);
  Route::get('/user/get', [UserController::class, 'getUser']);
  Route::post('/user/create', [UserController::class, 'createUser']);
  Route::put('/user/update', [UserController::class, 'updateUser']);
  Route::delete('/user/destroy', [UserController::class, 'deleteUser']);

  // Endpoint cari nama/nim/ymd
  Route::get('/external_user/nama', [ExternalUserController::class, 'getNama']);
  Route::get('/external_user/nim', [ExternalUserController::class, 'getNIM']);
  Route::get('/external_user/ymd', [ExternalUserController::class, 'getYMD']);
});


