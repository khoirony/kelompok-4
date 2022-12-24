<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AspirasiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// CRUD USER
Route::get('/user/list', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user/', [UserController::class, 'store']);
Route::post('/user/{id}/update', [UserController::class, 'update']);
Route::get('/user/{id}/delete', [UserController::class, 'destroy']);


// CRUD Aspirasi
Route::get('/aspirasi/list', [AspirasiController::class, 'listaspirasi']);
Route::get('/aspirasi/{id}', [AspirasiController::class, 'detailaspirasi']);
Route::post('/aspirasi/', [AspirasiController::class, 'storeaspirasi']);
Route::post('/aspirasi/{id}/update', [AspirasiController::class, 'updateaspirasi']);
Route::get('/aspirasi/{id}/delete', [AspirasiController::class, 'hapusaspirasi']);