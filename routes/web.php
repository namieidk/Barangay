<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewResidenceController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\ResidenceController;
use App\Http\Controllers\SuspectDataController;
use App\Http\Controllers\VictimDataController;
use App\Http\Controllers\ChildLawController;
use App\Http\Controllers\NarrativeController;
use App\Http\Controllers\IncidentReportController;
use App\Http\Controllers\BlotterRecordsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResPersonDataController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArchiveController;

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

Route::get('/Officials', function() {
    return view('Officials.Officials');
});

Route::get('/List', function() {
    return view('List.List');
});

Route::get('/Archive', function() {
    return view('Archive.Archive');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/new-residence', [NewResidenceController::class, 'create'])->name('new-residence.create');
Route::post('/new-residence', [NewResidenceController::class, 'store'])->name('new-residence.store');
Route::get('/new-residence/{newResidence}', [NewResidenceController::class, 'show'])->name('new-residence.show');
Route::get('/new-residence/{newResidence}/edit', [NewResidenceController::class, 'edit'])->name('new-residence.edit');
Route::put('/new-residence/{newResidence}', [NewResidenceController::class, 'update'])->name('new-residence.update');

Route::get('/ResRec', [ResidenceController::class, 'index'])->name('ResRec.ResRec');
Route::get('/residents/{resident}/edit', [ResidenceController::class, 'edit'])->name('ResRec.edit');
Route::put('/residents/{resident}', [ResidenceController::class, 'update'])->name('ResRec.update');
Route::delete('/residents/{resident}/archive', [ResidenceController::class, 'archive'])->name('residents.archive');

Route::get('/archive', [ArchiveController::class, 'index'])->name('archive.archive');
Route::get('/archive/{resident}', [ArchiveController::class, 'show'])->name('archive.show');
Route::post('/archive/{resident}/restore', [ArchiveController::class, 'restore'])->name('archive.restore');


Route::get('/family-members', [FamilyMemberController::class, 'index'])->name('family-members.index');
Route::get('/family-members/create', [FamilyMemberController::class, 'create'])->name('family-members.create');
Route::post('/family-members', [FamilyMemberController::class, 'store'])->name('family-members.store');
Route::get('/family-members/{id}/edit', [FamilyMemberController::class, 'edit'])->name('family-members.edit');
Route::put('/family-members/{id}', [FamilyMemberController::class, 'update'])->name('family-members.update');   

Route::get('/RepPersonData', [ResPersonDataController::class, 'create'])
    ->name('BloterRec.ResPersonData');
Route::post('/RepPersonData/store', [ResPersonDataController::class, 'store'])
    ->name('BloterRec.ResPersonData.store');
Route::get('/reporting-person/{id}/edit', [ResPersonDataController::class, 'edit'])->name('reporting-person.edit');

    Route::get('/suspect-data', [SuspectDataController::class, 'index'])->name('blotter.suspect.index');
    Route::get('/suspect-data-create', [SuspectDataController::class, 'create'])->name('blotter.suspect.create');
    Route::post('/suspect-data-store', [SuspectDataController::class, 'store'])->name('blotter.suspect.store');
    Route::post('/suspect-data-search', [SuspectDataController::class, 'search'])->name('blotter.suspect.search');

    Route::get('/victim-data', [VictimDataController::class, 'index'])->name('blotter.victim.index');
Route::get('/victim-data-create', [VictimDataController::class, 'create'])->name('blotter.victim.create');
Route::post('/victim-data-store', [VictimDataController::class, 'store'])->name('blotter.victim.store');
Route::post('/victim-data-search', [VictimDataController::class, 'search'])->name('blotter.victim.search');

Route::get('/childlaw', [ChildLawController::class, 'index'])->name('blotter.childlaw.index');
Route::get('/childlaw-create', [ChildLawController::class, 'create'])->name('blotter.childlaw.create');
Route::post('/childlaw', [ChildLawController::class, 'store'])->name('blotter.childlaw.store');
Route::post('/childlaw-search', [ChildLawController::class, 'search'])->name('blotter.childlaw.search');

Route::get('/Narrative', [NarrativeController::class, 'index'])->name('blotter.narrative.index');
Route::post('/Narrative/store', [NarrativeController::class, 'store'])->name('blotter.narrative.store');
Route::post('/Narrative-search', [NarrativeController::class, 'search'])->name('blotter.narrative.search');

Route::get('/IncidentReport', [IncidentReportController::class, 'create'])->name('blotter.incident.create');
Route::post('/IncidentReport/store', [IncidentReportController::class, 'store'])->name('blotter.incident.store');
Route::post('/IncidentReport-search', [IncidentReportController::class, 'search'])->name('blotter.incident.search');

Route::get('/BloterRecView', [BlotterRecordsController::class, 'index'])->name('blotter.records.index');

Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/documents/search-residents', [DocumentController::class, 'searchResidents'])->name('documents.search-residents');
Route::post('/documents/certificate', [DocumentController::class, 'requestCertificate'])->name('documents.request-certificate');
Route::post('/documents/clearance', [DocumentController::class, 'requestClearance'])->name('documents.request-clearance');
Route::get('/documents/{id}', [DocumentController::class, 'show']);

Route::get('/officials', [OfficialController::class, 'index'])->name('officials.index');
Route::get('/officials-create', [OfficialController::class, 'create'])->name('officials.create');
Route::post('/officials', [OfficialController::class, 'store'])->name('officials.store');
Route::get('/officials/{official}/edit', [OfficialController::class, 'edit'])->name('officials.edit');
Route::put('/officials/{official}', [OfficialController::class, 'update'])->name('officials.update');
Route::delete('/officials/{official}', [OfficialController::class, 'destroy'])->name('officials.destroy');
Route::get('/officials/{official}', [OfficialController::class, 'show'])->name('officials.show');

Route::get('/list', [ListController::class, 'index'])->name('list.index');
Route::get('/list/{id}/{type}/edit', [ListController::class, 'edit']);
Route::put('/list/{id}/{type}', [ListController::class, 'update']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

require __DIR__.'/auth.php';
