<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewResidenceController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\ResidenceController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/NewRes', function() {
    return view('NewRes.NewRes');
});

Route::get('/ResRec', function() {
    return view('ResRec.ResRec');
});

Route::get('/PersonalInfo', function() {
    return view('NewRes.PersonalInfo');
});

Route::get('/OtherInfo', function() {
    return view('NewRes.OtherInfo');
});

Route::get('/Contacts', function() {
    return view('NewRes.Contacts');
});

Route::get('/ResRecPerInfo', function() {
    return view('ResRec.ResRecPerInfo');
});

Route::get('/BrgyClear', function() {
    return view('ResRec.BrgyClear');
});

Route::get('/ResRecOtherInfo', function() {
    return view('ResRec.ResRecOtherInfo');
});

Route::get('/ResRecContacts', function() {
    return view('ResRec.ResRecOtherInfo');
});

Route::get('/BloterRecView', function() {
    return view('BloterRec.BloterRecView');
});

Route::get('/RepPersonData', function() {
    return view('BloterRec.RepPersonData');
});

Route::get('/SuspectData', function() {
    return view('BloterRec.SuspectData');
});

Route::get('/ChildLaw', function() {
    return view('BloterRec.ChildLaw');
});

Route::get('/VictimData', function() {
    return view('BloterRec.VictimData');
});

Route::get('/Narative', function() {
    return view('BloterRec.Narative');
});

Route::get('/IncidentReport', function() {
    return view('BloterRec.IncidentReport');
});

Route::get('/Reslist', function() {
    return view('Reslist.Reslist');
});

Route::get('/Reports', function() {
    return view('Reports.Reports');
});

Route::get('/FamMember', function() {
    return view('NewRes.FamMem');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/new-residence/create', [NewResidenceController::class, 'create'])->name('new-residence.create');
Route::post('/new-residence', [NewResidenceController::class, 'store'])->name('new-residence.store');
Route::get('/new-residence/{newResidence}', [NewResidenceController::class, 'show'])->name('new-residence.show');
Route::get('/new-residence/{newResidence}/edit', [NewResidenceController::class, 'edit'])->name('new-residence.edit');
Route::put('/new-residence/{newResidence}', [NewResidenceController::class, 'update'])->name('new-residence.update');

Route::get('/ResRec', [ResidenceController::class, 'index'])->name('ResRec.ResRec');
Route::get('/residents/{resident}/edit', [ResidenceController::class, 'edit'])->name('ResRec.edit');
Route::put('/residents/{resident}', [ResidenceController::class, 'update'])->name('ResRec.update');
Route::delete('/residents/{resident}/archive', [ResidenceController::class, 'archive'])->name('ResRec.archive');

Route::post('/family/store', [FamilyMemberController::class, 'store'])->name('family.store');

//Route::get('/residence-records', [ResidenceController::class, 'index'])->name('residence.index');

require __DIR__.'/auth.php';
