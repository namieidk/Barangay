<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/LoginFinal', function() {
    return view('LoginFinal');
});

Route::get('/', function() {
    return view('Home');
});

Route::get('/NewRes', function() {
    return view('NewRes');
});

Route::get('/ResRec', function() {
    return view('ResRec');
});

Route::get('/PersonalInfo', function() {
    return view('PersonalInfo');
});

Route::get('/OtherInfo', function() {
    return view('OtherInfo');
});

Route::get('/Contacts', function() {
    return view('Contacts');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
