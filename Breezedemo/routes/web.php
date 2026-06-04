<?php

use App\Http\Controllers\AssistentController;
use App\Http\Controllers\MondhygienistController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PraktijkmanagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TandartsController;
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
});

Route::get('/praktijkmanagement', [PraktijkmanagementController::class, 'index'])
    ->name('praktijkmanagement.index')
    ->middleware(['auth', 'role:praktijkmanagement']);

Route::get('/praktijkmanagement/userroles', [PraktijkmanagementController::class, 'manageUserroles'])
    ->name('praktijkmanagement.userroles')
    ->middleware(['auth', 'role:praktijkmanagement']);

Route::get('/praktijkmanagement/{id}/edit', [PraktijkmanagementController::class, 'edit'])
    ->name('praktijkmanagement.edit')
    ->middleware(['auth', 'role:praktijkmanagement']);

Route::put('/praktijkmanagement/{id}', [PraktijkmanagementController::class, 'update'])
    ->name('praktijkmanagement.update')
    ->middleware(['auth', 'role:praktijkmanagement']);

Route::delete('/praktijkmanagement/{id}', [PraktijkmanagementController::class, 'destroy'])
    ->name('praktijkmanagement.destroy')
    ->middleware(['auth', 'role:praktijkmanagement']);

Route::get('/praktijkmanagement/{id}', [PraktijkmanagementController::class, 'show'])
    ->name('praktijkmanagement.show')
    ->middleware(['auth', 'role:praktijkmanagement']);

require __DIR__.'/auth.php';
