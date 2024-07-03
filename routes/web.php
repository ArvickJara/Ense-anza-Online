<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\InicioController::class, 'index']);
Route::get('/cursos', [CursoController::class, 'index']);
Route::get('/cursos/crear', [CursoController::class, 'create']);

// Listar todos los cursos
Route::get('/cursos', [CursoController::class, 'index']);

// Mostrar el formulario para crear un nuevo curso
Route::get('/cursos/create', [CursoController::class, 'create']);

// Almacenar un nuevo curso
Route::post('/cursos', [CursoController::class, 'store']);

// Mostrar un curso específico
Route::get('/cursos/{curso}', [CursoController::class, 'show']);

// Mostrar el formulario para editar un curso
Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit']);

// Actualizar un curso existente
Route::put('/cursos/{curso}', [CursoController::class, 'update']);

// Eliminar un curso
Route::delete('/cursos/{curso}', [CursoController::class, 'destroy']);

