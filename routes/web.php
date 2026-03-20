<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemiconductoresController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;

Route::get("/", [IndexController::class, 'index'])->name('index');
Route::get("/diplomado/asics", [SemiconductoresController::class, 'index'])->name('semiconductores.index');
Route::get("/plataforma/login", [AuthController::class, 'login'])->name('login');
Route::get("/diplomado/asics/register",  [SemiconductoresController::class, 'register'])->name('semiconductores.register');
Route::post("/diplomado/asics/register", [SemiconductoresController::class, 'store'])->name('semiconductores.registro.store');
Route::get("/api/municipios/{stateId}", [SemiconductoresController::class, 'municipiosPorEstado'])->name('api.municipios');