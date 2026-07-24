<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServicioController;

// Pantalla Inicial: Redirigir la raíz al Login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas para usuarios NO autenticados (guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Rutas para usuarios Autenticados (auth)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('servicios', ServicioController::class);
});
