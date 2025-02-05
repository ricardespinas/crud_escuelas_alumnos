<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\EscuelaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('escuelas.index');
})->name('landing-page');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login_post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::resource('escuelas', EscuelaController::class);
    Route::resource('alumnos', AlumnoController::class);
});
