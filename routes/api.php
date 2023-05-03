<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('mobil', MobilController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
]);
Route::resource('motor', MotorController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
]);
