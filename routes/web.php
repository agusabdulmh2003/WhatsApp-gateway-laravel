<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViolationController;

Route::get('/violations', [ViolationController::class, 'index'])->name('violations.index');
Route::get('/violations/create', [ViolationController::class, 'create'])->name('violations.create');
Route::post('/violations', [ViolationController::class, 'store'])->name('violations.store');

