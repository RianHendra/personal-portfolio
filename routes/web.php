<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PersonalController;




Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');


