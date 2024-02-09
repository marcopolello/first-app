<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Ristorante;
use App\Http\Controllers\PostmanController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ChartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/panel', function () {
    return Inertia::render('Ciao', []);
});

Route::get('/ristorante', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Ristorante::all();
});

Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.index');

// Altre route per gestire le creazione, modifica e eliminazione dei ristoranti
Route::post('/create/ristorante', [AdminPanelController::class, 'store'])->name('ristoranti.store');
Route::delete('/delete/ristorante/{id}', [AdminPanelController::class, 'delete'])->name('ristoranti.delete');

Route::get('/percorso', [PostmanController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/chart', [ChartController::class, 'chartView']);