<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studetController;
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

Route::post('/getData',[studetController::class, 'getData'])->name('getData');
Route::get('/apidemo',[ApiController::class,'apidemoo']);
Route::post('/store',[ApiController::class,'store']);
Route::get('/show/{id}',[ApiController::class,'show']);
Route::put('/update/{id}',[ApiController::class,'update']);
Route::delete('/del/{id}',[ApiController::class,'del']);
