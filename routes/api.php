<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Ristorante;

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

Route::get('/postman', 'PostmanController@index');

Route::get('ristorante', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Ristorante::all();
});
 
Route::get('ristorante/{id}', function($id) {
    return Ristorante::find($id);
});

Route::post('ristorante', function(Request $request) {
    return Ristorante::create($request->all);
});

Route::put('ristorante/{id}', function(Request $request, $id) {
    $ristorante = Ristorante::findOrFail($id);
    $ristorante->update($request->all());

    return $ristorante;
});

Route::delete('ristorante/{id}', function($id) {
    Ristorante::find($id)->delete();

    return 204;
});