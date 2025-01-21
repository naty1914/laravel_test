<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   

use App\Http\Controllers\UserController;
 
Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ninjas', [NinjaController::class, 'index'] )->name('ninjas.index');
Route::get('/ninjas/create', [NinjaController::class,'create'] )->name('ninjas.create');
Route::get('/ninjas/{ninja}', [NinjaController::class, 'show'] )->name('ninjas.show');
Route::post('/ninjas', [NinjaController::class,'store'] )->name('ninjas.store');
Route::delete('/ninjas/{ninja}', [NinjaController::class,'destroy'] )->name('ninjas.destroy')->middleware('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});                                                                                     

require __DIR__.'/auth.php';

