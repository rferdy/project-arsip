<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\doxController;
use App\Http\Controllers\towerController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [authController::class, 'index'])->name('login');
Route::post('/login', [authController::class, 'submitLogin'])->name('login.post');
Route::get('/logout', [authController::class, 'logout'])->name('logout');
Route::get('/register', [authController::class, 'viewReg'])->name('register');
Route::post('/register', [authController::class, 'store'])->name('register.post');

Route::middleware('auth')->group(function(){
    
    Route::get('/datatower', [towerController::class, 'index'])->name('datatower');
    Route::delete('/datatower/{id}', [towerController::class, 'destroy'])->name('datatower.delete');
    
    Route::post('/importtower', [towerController::class, 'import'])->name('importtower');
    
    Route::delete('/importdox/{id}', [doxController::class, 'destroy'])->name('doxdelete');
    Route::post('/importdox/{id}', [doxController::class, 'Upload'])->name('doxupload');

    Route::get('/addtower', [towerController::class, 'viewAdd'])->name('addtower');
    Route::post('/addtower', [towerController::class, 'store'])->name('addtower.post');
    
    Route::put('/edittower/{id}', [towerController::class, 'update'])->name('edittower.update');
});
