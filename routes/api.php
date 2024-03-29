<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SomethingController;

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
    'prefix' => 'v1',
    'middleware' => 'with_fast_api_key'
], function () {

    Route::post('/just/an/example', [SomethingController::class, 'justAnExample']);
    //Route::get('/rest-api/just/an/example/get', [SomethingController::class, 'justAnExample']);

});

