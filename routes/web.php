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

Route::get('/family-members', [FamilyMemberController::class, 'index'])->name('family-members.index');
    
    // Get family member data for edit form (AJAX)
    Route::get('/family-members/{famMember}/edit', [FamilyMemberController::class, 'edit'])->name('family-members.edit');
    
    // Update family member data
    Route::put('/family-members/{famMember}', [FamilyMemberController::class, 'update'])->name('family-members.update');
    
    // Existing store route (kept as is)
    Route::post('/family/store', [FamilyMemberController::class, 'store'])->name('family.store');
Route::get('/RepPersonData', [App\Http\Controllers\ResPersonDataController::class, 'create'])
    ->name('BloterRec.ResPersonData');

Route::post('/RepPersonData/store', [App\Http\Controllers\ResPersonDataController::class, 'store'])
    ->name('BloterRec.ResPersonData.store');

// Add these routes after your existing blotter-related routes
Route::get('/reporting-person/{id}/edit', [App\Http\Controllers\ResPersonDataController::class, 'edit'])->name('reporting-person.edit');

    Route::get('/blotter/suspect-data', [SuspectDataController::class, 'index'])->name('blotter.suspect.index');
    Route::get('/blotter/suspect-data/create', [SuspectDataController::class, 'create'])->name('blotter.suspect.create');
    Route::post('/blotter/suspect-data', [SuspectDataController::class, 'store'])->name('blotter.suspect.store');
    Route::post('/blotter/suspect-data/search', [SuspectDataController::class, 'search'])->name('blotter.suspect.search');

    Route::get('/blotter/victim-data', [VictimDataController::class, 'index'])->name('blotter.victim.index');
Route::get('/blotter/victim-data/create', [VictimDataController::class, 'create'])->name('blotter.victim.create');
Route::post('/blotter/victim-data', [VictimDataController::class, 'store'])->name('blotter.victim.store');
Route::post('/blotter/victim-data/search', [VictimDataController::class, 'search'])->name('blotter.victim.search');

Route::get('/blotter/childlaw', [ChildLawController::class, 'index'])->name('blotter.childlaw.index');
Route::get('/blotter/childlaw/create', [ChildLawController::class, 'create'])->name('blotter.childlaw.create');
Route::post('/blotter/childlaw', [ChildLawController::class, 'store'])->name('blotter.childlaw.store');
Route::post('/blotter/childlaw/search', [ChildLawController::class, 'search'])->name('blotter.childlaw.search');

Route::get('/Narrative', [NarrativeController::class, 'index'])->name('blotter.narrative.index');
Route::post('/Narrative/store', [NarrativeController::class, 'store'])->name('blotter.narrative.store');
Route::post('/Narrative/search', [NarrativeController::class, 'search'])->name('blotter.narrative.search');

Route::get('/IncidentReport', [IncidentReportController::class, 'create'])->name('blotter.incident.create');
Route::post('/IncidentReport/store', [IncidentReportController::class, 'store'])->name('blotter.incident.store');
Route::post('/IncidentReport/search', [IncidentReportController::class, 'search'])->name('blotter.incident.search');

Route::get('/BloterRecView', [BlotterRecordsController::class, 'index'])->name('blotter.records.index');

Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::post('/documents/search-residents', [DocumentController::class, 'searchResidents'])->name('documents.search-residents');
Route::post('/documents/request-certificate', [DocumentController::class, 'requestCertificate'])->name('documents.request-certificate');
Route::post('/documents/request-clearance', [DocumentController::class, 'requestClearance'])->name('documents.request-clearance');

Route::get('/officials', [OfficialController::class, 'index'])->name('officials.index');
Route::get('/officials/create', [OfficialController::class, 'create'])->name('officials.create');
Route::post('/officials', [OfficialController::class, 'store'])->name('officials.store');
Route::get('/officials/{official}/edit', [OfficialController::class, 'edit'])->name('officials.edit');
Route::put('/officials/{official}', [OfficialController::class, 'update'])->name('officials.update');
Route::delete('/officials/{official}', [OfficialController::class, 'destroy'])->name('officials.destroy');
Route::get('/officials/{official}', [OfficialController::class, 'show'])->name('officials.show');

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::post('/reports/generate', [ReportController::class, 'generate'])->name('reports.generate');
Route::get('/reports/{report}/preview', [ReportController::class, 'preview'])->name('reports.preview');
Route::get('/reports/{report}/download', [ReportController::class, 'download'])->name('reports.download');
Route::post('/reports/{report}/status', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');


require __DIR__.'/auth.php';
