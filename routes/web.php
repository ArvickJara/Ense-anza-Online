<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [CursoController::class, 'mostrarCursos']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\InicioController::class, 'index']);
Route::get('/cursos', [CursoController::class, 'index']);
Route::get('/cursos/crear', [CursoController::class, 'create']);
Route::get('/subscription', [SubscriptionController::class, 'show'])->name('subscription.show');
Route::post('/subscription', [SubscriptionController::class, 'store'])->name('subscription.store');

Route::get('/home', function () {
    if (Auth::check() && Auth::user()->role == 'student' && !Auth::user()->subscription) {
        return redirect()->route('subscription.show');
    }
    return app(HomeController::class)->index();
})->name('home');

// Rutas CRUD cursos
Route::get('/cursos', [CursoController::class, 'index']);
Route::get('/cursos/create', [CursoController::class, 'create']);
Route::post('/cursos', [CursoController::class, 'store']);
Route::get('/cursos/{curso}', [CursoController::class, 'show']);
Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit']);
Route::put('/cursos/{curso}', [CursoController::class, 'update']);
Route::delete('/cursos/{curso}', [CursoController::class, 'destroy']);

