<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPagesController;



Route::get('/', function () { return redirect()->route('dashboard'); })->name('home');
Route::get('/dashboard', [MainPagesController::class, 'dashboard'])->name('dashboard');
