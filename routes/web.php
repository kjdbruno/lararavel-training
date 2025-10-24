<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

use App\Models\Patient;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalPatients = Patient::count();
    return view('dashboard', compact('totalPatients'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('category', BookCategoryController::class)
    ->middleware(['auth', 'verified']);

Route::resource('patient', PatientController::class)
    ->middleware(['auth', 'verified']);

Route::resource('doctor', DoctorController::class)
    ->middleware(['auth', 'verified']);
    

require __DIR__.'/auth.php';

Route::get('/test-email', function () {
    Mail::to('chestergfrancisco@gmail.com')->send(new TestMail());
    return 'Test email sent'; 
});
