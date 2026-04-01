<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemiconductoresController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\DiplomadosController;

Route::get("/", [IndexController::class, 'index'])->name('index');
Route::get("/diplomado/asics", [SemiconductoresController::class, 'index'])->name('semiconductores.index');
Route::get("/plataforma/login", [AuthController::class, 'login'])->name('login');
Route::get("/diplomado/asics/register",  [SemiconductoresController::class, 'register'])->name('semiconductores.register');
Route::post("/diplomado/asics/register", [SemiconductoresController::class, 'store'])->name('semiconductores.registro.store');
Route::get("/api/municipios/{stateId}", [SemiconductoresController::class, 'municipiosPorEstado'])->name('api.municipios');


Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login_admin'])->name('auth.login');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::middleware('auth')->group(function(){
    Route::get('/admin/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');
    Route::get("/admin/graduates/asics",[DiplomadosController::class, 'asics'])->name('admin.diplomados.asics');
    Route::get("/admin/graduates/asics/download/cv/{id}",[DiplomadosController::class, 'download_cv'])->name('asics.cv');
    Route::get("/admin/graduates/asics/download/letter/{id}",[DiplomadosController::class, 'download_letter'])->name('asics.letter');
    Route::get("/admin/graduates/asics/download/support/{id}",[DiplomadosController::class, 'download_support'])->name('asics.support');
    Route::post('/admin/asics/{id}/aceptar', [DiplomadosController::class, 'accepted'])->name('asics.accepted');
    Route::post('/admin/asics/{id}/rechazar', [DiplomadosController::class, 'rejected'])->name('asics.rejected');
});

