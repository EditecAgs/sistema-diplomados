<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemiconductoresController;

Route::get("/", [SemiconductoresController::class, 'index'])->name('index');
