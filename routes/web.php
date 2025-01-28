<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
 
Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-test-email', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('recipient@example.com')
                ->subject('Test Email');
    });

    return 'Test email sent!';
});


Route::controller(NinjaController::class)->group(function () {
      Route::get('/ninjas', 'index')->name('ninjas.index');
      Route::get('/ninjas/create', 'create')->name('ninjas.create');
      Route::get('/ninjas/{ninja}',  'show')->name('ninjas.show');
      Route::post('/ninjas', 'store')->name('ninjas.store');
      Route::delete('/ninjas/{ninja}', 'destroy')->name('ninjas.destroy');
      Route::get('/ninjas/{ninja}/edit', 'edit')->name('ninjas.edit');
      Route::put('/ninjas/{ninja}', 'update')->name('ninjas.update');

      
});
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});                                                                                     
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__.'/auth.php';

