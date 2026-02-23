<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Users resource routes
    Route::resource('users', \App\Http\Controllers\UserController::class);
    // Banks resource routes
    Route::resource('banks', \App\Http\Controllers\BankController::class);
    // Savings and saving types
    Route::resource('savings', \App\Http\Controllers\SavingController::class);
    Route::resource('saving-types', \App\Http\Controllers\SavingTypeController::class);
});

require __DIR__.'/auth.php';
