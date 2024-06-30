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

Route::get('/home', [App\Http\Controllers\InicioController::class, 'index'])->name('home');
Route::get('/cursos', [CursoController::class, 'index'])->name('courses.index')->middleware('auth');
Route::get('/cursos/crear', [CursoController::class, 'create'])->name('courses.create')->middleware('auth');
