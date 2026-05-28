<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TandartsController;
use App\Http\Controllers\AssistentController;
use App\Http\Controllers\MondhygienistController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PraktijkmanagementController;
use Illuminate\Support\Facades\Route;

// Welkomstpagina (als je niet bent ingelogd)
Route::get('/', function () {
    return view('welcome');
});

// Standaard Breeze Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Alle routes die beveiligd zijn met 'auth' (ingelogd zijn)
Route::middleware('auth')->group(function () {
    
    // Profiel routes (Breeze standaard)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- GEBRUIKERSROLLEN ROUTES ---

    // Tandarts Homepage (Toegankelijk voor tandarts en praktijkmanagement)
    Route::get('/tandarts', [TandartsController::class, 'index'])
        ->name('tandarts.index')
        ->middleware('role:tandarts,praktijkmanagement');

    // Assistent Homepage (Toegankelijk voor assistent en praktijkmanagement)
    Route::get('/assistent', [AssistentController::class, 'index'])
        ->name('assistent.index')
        ->middleware('role:assistent,praktijkmanagement');

    // Mondhygiënist Homepage (Toegankelijk voor mondhygienist en praktijkmanagement)
    Route::get('/mondhygienist', [MondhygienistController::class, 'index'])
        ->name('mondhygienist.index')
        ->middleware('role:mondhygienist,praktijkmanagement');

    // Patiënt Homepage (Toegankelijk voor patient en praktijkmanagement)
    Route::get('/patient', [PatientController::class, 'index'])
        ->name('patient.index')
        ->middleware('role:patient,praktijkmanagement');

    // Praktijkmanagement Homepage (Alleen toegankelijk voor praktijkmanagement)
    Route::get('/praktijkmanagement', [PraktijkmanagementController::class, 'index'])
        ->name('praktijkmanagement.index')
        ->middleware('role:praktijkmanagement');
});

require __DIR__.'/auth.php';